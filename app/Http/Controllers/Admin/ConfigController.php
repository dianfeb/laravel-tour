<?php

namespace App\Http\Controllers\admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('admin.config.index', [
            'config' => Config::where('status', 'on')->get()
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.config.edit', [
            'config' => Config::find($id)
        ]);
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
            $file->storeAs('public/images/config/', $fileName); //folder simpan
    
            // unlink storage// Delete old image
            Storage::delete('public/images/config/'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }
    

        Config::find($id)->update($data);

        return redirect(url('config'))->with('success', 'Config Has Been Update');
    }

  

}
