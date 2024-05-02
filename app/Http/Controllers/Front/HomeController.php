<?php

namespace App\Http\Controllers\Front;

use App\Models\Tour;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index() {
        $slider = Slider::Orderby('id', 'asc')->get();
        $location  = DB::table('tours')
        ->join('locations', 'tours.location_id', '=', 'locations.id')
        ->select('locations.name', DB::raw('COUNT(*) as total_tours'))
        ->groupBy('locations.name')
        ->get();
        $tour      = Tour::latest()->get();
        return view('front.home', compact('slider', 'location', 'tour'));
    }
}
