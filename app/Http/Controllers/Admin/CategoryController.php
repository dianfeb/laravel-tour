<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $category = Category::latest()->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       




    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate(        
            ['name' => 'required']
        );

        $data['slug'] = Str::slug($data['name']);
        Category::create($data);

        return back()->with('success', 'data has been created');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate(        
            ['name' => 'required']
        );

        $data['slug'] = Str::slug($data['name']);
        Category::find($id)->update($data);

        return back()->with('success', 'data has been updated');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Category::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Data Category has been deleted'
        ]);
    }
}
