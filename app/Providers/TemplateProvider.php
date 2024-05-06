<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('front.layouts.header', function ($view) {
            // ..
            $data = DB::table('tours')
            ->join('locations', 'tours.location_id', '=', 'locations.id')
            ->leftJoin('categories', 'tours.category_id', '=', 'categories.id')
            ->select('locations.name as location_name', 'categories.id as category_id', 'categories.name as category_name', 'categories.slug as category_slug', DB::raw('COUNT(*) as total_tours'))
            ->groupBy('locations.name', 'categories.id', 'categories.name','categories.slug')
            ->get();
            $view->with('categories', $data);
        });
    }
}
