<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $data = Page::find($id);
        return view('admin.page.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name'          => 'required',
            'value'           => 'nullable',
            'img'            => 'nullable|image|file|mimes:png,jpg,jpeg,webp|max:2024',
        ]); //jika menggunakan http/request gunakan validated()

        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid().'.'.$file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/images/page/', $fileName); //folder simpan
    
            // unlink storage// Delete old image
            Storage::delete('public/images/page/'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }
    

        Page::find($id)->update($data);

        return redirect()->route('editPage', ['id' => $id])->with('success', 'Page has been updated');
    }

    
}
