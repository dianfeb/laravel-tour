<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Slider::latest()->get();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'img'  => 'required|image|file|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'nullable'
        ]);

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/slider/', $fileName);

        $data['img'] = $fileName;

        Slider::create($data);
        return redirect(url('slider'))->with('success', 'data has been created');
    }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $data = Slider::find($id);
        return view('admin.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'img'  => 'nullable|image|file|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'required'
        ]);

        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid() . '.' . $file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/images/slider/', $fileName); //folder simpan

            // unlink storage// Delete old image
            Storage::delete('public/images/slider/' . $request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        Slider::find($id)->update($data);

        return redirect(url('slider'))->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Slider::find($id);
        Storage::delete('public/images/slider/'.$data->img);
        $data->delete();
        return response()->json([
            'message' => 'Data has been deleted'
        ]);
    }
}
