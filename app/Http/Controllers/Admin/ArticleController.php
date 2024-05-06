<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $data = Article::latest()->get();
        return view('admin.article.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'title' => 'required',
            'desc'  => 'required',
            'img'   => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',

        ]);

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/article/', $fileName);

        $data['img'] = $fileName;

        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article'))->with('success', 'data has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $data = Article::find($id);
        return view('admin.article.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Article::find($id);
        return view('admin.article.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'title' => 'required',
            'desc'  => 'required',
            'img'   => 'nullable|mimes:jpeg,png,jpg|max:2048',


        ]);

       if($file = $request->file('img')) {
        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/article/', $fileName);

        Storage::delete('public/images/article/'.$request->oldImg);

        $data['img'] = $fileName;
       } else{
        $data['img'] = $request->oldImg;
       }

       $data['slug'] = Str::slug($data['title']);

       Article::find($id)->update($data);

       return redirect(url('article'))->with('success', 'data has been update');

    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $data = Article::find($id);
         Storage::delete('public/admin/article/'.$data->img);
        $data->delete();
        return redirect(url('article'));
    }
}
