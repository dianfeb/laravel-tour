<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Car::latest()->get();
        return view('admin.car.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'duration' => 'required',
            'capacity' => 'required',
            'price'  => 'required',
            'img' => 'required|mimes:png,jpg,jpeg|max:2024'
        ]);

        $file = $request->file('img');
        $fileName = uniqid().'.'. $file->getClientOriginalExtension();
        $file->StoreAs('public/images/car/', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['name']);

        Car::create($data);
        return redirect(url('car'))->with('success', 'data has been created');

        


    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $data = Car::find($id);
        return view('admin.car.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'duration' => 'required',
            'capacity' => 'required',
            'price'  => 'required',
            'img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2024'
        ]);


        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid() . '.' . $file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/images/car/', $fileName); //folder simpan

            // unlink storage// Delete old image
            Storage::delete('public/images/car/' . $request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['name']);

        Car::find($id)->update($data);

        return redirect(url('car'))->with('success', 'Data Has Been Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $data = Car::find($id);
        Storage::delete('public/images/car/'.$data->img);
        $data->delete();
        return response()->json([
            'message' => 'Data has been deleted'
        ]);
    }
}
