<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            $data = Tour::with('Category', 'Location')->latest()->get();
            return DataTables::of($data)
                // memanggil id terbaru
                ->addIndexColumn()
                // custom memanggil nama kategori
                ->addColumn('category_id', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('location_id', function ($data) {
                    return $data->location->name;
                })

                ->addColumn('button', function ($data) {
                    return '
              
                <a class="btn btn-outline-info" href="tour/' . $data->id . '"><i class="fa fa-eye"></i></a>
                <a class="btn btn-outline-warning" href="tour/' . $data->id . '/edit"><i class="fas fa-edit"></i></a>
                <a class="btn btn-outline-danger btn-delete" href="#" onclick="deleteTour(this)" data-id="' . $data->id . '"><i class="fa fa-trash"></i></a>
             
                ';
                })
                ->rawColumns(['category_id', 'location_id', 'button'])
                ->make();
        }
        return view('admin.tour.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::get();
        $location = Location::get();
        return view('admin.tour.create', compact('category', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name'          => 'required',
            'location_id'   => 'required',
            'category_id'   => 'required',
            'duration'      => 'required',
            'img'            => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'price'         => 'required',
            'desc'          => 'required',
            'itinerary'     => 'required',
            'facility'      => 'required',
        ]);

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/tour/', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['name']);

        Tour::create($data);
        return redirect(url('tour'))->with('success', 'data has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $data = Tour::with('Category', 'Location')->find($id);
        return view('admin.tour.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::get();
        $location = Location::get();
        $data = Tour::find($id);
        return view('admin.tour.edit', compact('data', 'category', 'location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $data = $request->validate([
            'name'          => 'required',
            'location_id'   => 'required',
            'category_id'   => 'required',
            'duration'      => 'required',
            'img'           => 'nullable|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'price'         => 'required',
            'desc'          => 'required',
            'itinerary'     => 'required',
            'facility'      => 'required',
        ]);


        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid() . '.' . $file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/images/tour/', $fileName); //folder simpan

            // unlink storage// Delete old image
            Storage::delete('public/images/tour/' . $request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['name']);

        Tour::find($id)->update($data);

        return redirect(url('tour'))->with('success', 'Data Has Been Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $data = Tour::find($id);
        Storage::delete('public/images/tour/'.$data->img);
        $data->delete();
        return response()->json([
            'message' => 'Data has been deleted'
        ]);
    }
}
