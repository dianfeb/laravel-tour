<?php

namespace App\Http\Controllers\Admin;

use App\Models\Choose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Choose::latest()->get();
        return view('admin.choose.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.choose.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg,webp|max:2024'
        ]);
        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/choose', $fileName);

        $data['img'] = $fileName;
        Choose::create($data);

        return redirect(url('choose'))->with('success', 'Data Has Been Created');
    }

 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Choose::find($id);
        return view('admin.choose.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2024'
        ]);

        if ($file = $request->file('img')) {
            # code...
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/images/choose', $fileName);

            Storage::delete('public/images/choose'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }
        
        Choose::find($id)->update($data);
        return redirect(url('choose'))->with('success', 'Data Has Been Created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Choose::find($id);
        Storage::delete('public/images/choose'.$data->img);
        $data->delete();

        return response()->json([
            'message' => 'data has been delete'
        ]);
    }
}
