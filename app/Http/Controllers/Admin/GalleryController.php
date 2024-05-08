<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Gallery::latest()->get();
        return view('admin.gallery.index', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'img'  => 'nullable|image|file|mimes:jpg,jpeg,png,webp|max:2048',
            
        ]);

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/gallery/', $fileName);

        $data['img'] = $fileName;
        Gallery::create($data);

        return back()->with('success', 'data has been created');
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'img'  => 'required|image|file|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($file = $request->file('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/images/gallery/', $fileName);

            Storage::delete('public/images/gallery'. $request->oldImg);
            # code...

            $data['img'] = $fileName;
        } else {
            # code...
            $data['img'] = $request->oldImg;
        }

        Gallery::find($id)->update($data);
        return back()->with('success', 'data has been created');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Gallery::find($id);
        Storage::delete('public/images/gallery/'.$data->img);
        $data->delete();
        return response()->json([
            'message' => 'data has been delete'
        ]);
    }
}
