<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'desc' => 'required',
            'city' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg,webp|max:2024',
        ]);

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/testimonial/', $fileName);

        $data['img'] = $fileName;

        Testimonial::create($data);
        return redirect(url('testimonial'))->with('success', 'data has been created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'desc' => 'required',
            'city' => 'required',
            'img'   => 'nullable|mimes:png,jpg,jpeg,webp|max:2024'
        ]);

        if ($request->file('img')) {
           $file = $request->file('img');
           $fileName = uniqid().'.'.$file->getClientOriginalExtension();
           $file->storeAs('public/images/testimonial', $fileName);

           Storage::delete('public/images/testimonial'. $request->oldImg);

           $data['img'] = $fileName;
        } else {
           $data['img'] = $request->oldImg;
        }

        
        Testimonial::find($id)->update($data);
        return redirect(url('testimonial'))->with('success', 'data has been created');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Testimonial::find($id);
        Storage::delete('public/images/testimonial'. $data->img);
        $data->delete();
        return response()->json([
            'message' => 'data has been deleted'
        ]);
    }
}
