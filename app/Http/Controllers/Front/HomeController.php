<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Page;
use App\Models\Tour;
use App\Models\Config;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Location;
use App\Models\Testimonial;
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
        $imgTestimonial = Page::find(1);
        $gallery = Gallery::orderBy('id', 'desc')->take(7)->get();
        $testimonial = Testimonial::latest()->get();
        $article = Article::orderBy('view', 'desc')->take(10)->get();
        return view('front.home', compact('slider', 'location', 'tour', 'article', 'car', 'testimonial', 'imgTestimonial', 'gallery'));
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

    public function Blog() {
        $carbonNow = Carbon::now();
        $data = Article::latest()->get() ->map(function ($data) use ($carbonNow) {
            // Memformat created_at menggunakan $carbonNow
            $data->formatted_created_at = $carbonNow->parse($data->created_at)->format('d, M Y');
            return $data;
        });
        return view('front.blog', compact('data'));
    }

    public function About() {
        $data = Config::find(5);
        return view('front.about', compact('data'));
    }


}
