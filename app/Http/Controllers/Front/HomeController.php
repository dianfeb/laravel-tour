<?php

namespace App\Http\Controllers\Front;

use App\Models\Car;
use App\Models\Tour;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index()
    {
        $slider = Slider::Orderby('id', 'asc')->get();
        $location = DB::table('tours')
            ->join('locations', 'tours.location_id', '=', 'locations.id')
            ->leftJoin('categories', 'tours.category_id', '=', 'categories.id')
            ->select('locations.name as location_name', 'categories.id as category_id', 'categories.name as category_name', DB::raw('COUNT(*) as total_tours'))
            ->groupBy('locations.name', 'categories.id', 'categories.name')
            ->get();
        $tour      = Tour::latest()->get();
        $car       = Car::latest()->get();
        $article = Article::orderBy('view', 'desc')->take(10)->get();
        return view('front.home', compact('slider', 'location', 'tour', 'article', 'car'));
    }

    // menampilkan data paket wisata
    public function Category($slugCategory)  {
        $data = Tour::whereHas('Category', function($q) use ($slugCategory) {
            $q->where('slug', $slugCategory);
        })->latest()->paginate(1);
        $categories = Tour::latest()->get();
            $category = $slugCategory;
        return view('front.wisata', compact('data', 'categories', 'category'));
    }

}
