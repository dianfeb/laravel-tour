<?php

namespace App\Providers;

use App\Models\Config;
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

        View::composer('admin.layouts.template', function ($view) {
            // ..
            $configKeys = ['Title', 'logo'];

            // Use pluck with two arguments: the first is the value column, and the second is the key column
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name')->all();
        
            // Include 'img' in the $config array if it exists
            $imgConfig = Config::whereIn('name', $configKeys)->where('img', '!=', null)->pluck('img', 'name')->all();
        
            // Merge the arrays
            $config = array_merge($config, $imgConfig);
        
            $view->with('config', $config);
        });

        View::composer('front.layouts.header', function ($view) {
            // ..
            $configKeys = ['Title', 'logo', 'Logo Footer', 'Telepon', 'adv', 'Whatsapp', 'Email', 'Alamat', 'Footer Deskripsi', 'img'];

            // Use pluck with two arguments: the first is the value column, and the second is the key column
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name')->all();
        
            // Include 'img' in the $config array if it exists
            $imgConfig = Config::whereIn('name', $configKeys)->where('img', '!=', null)->pluck('img', 'name')->all();
        
            // Merge the arrays
            $config = array_merge($config, $imgConfig);
        
            $view->with('config', $config);
        });

        View::composer('front.home', function ($view) {
            // ..
            $configKeys = ['Title', 'logo', 'Logo Footer', 'Telepon', 'adv', 'Whatsapp', 'Email', 'Alamat', 'Footer Deskripsi', 'img'];

            // Use pluck with two arguments: the first is the value column, and the second is the key column
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name')->all();
        
            // Include 'img' in the $config array if it exists
            $imgConfig = Config::whereIn('name', $configKeys)->where('img', '!=', null)->pluck('img', 'name')->all();
        
            // Merge the arrays
            $config = array_merge($config, $imgConfig);
        
            $view->with('config', $config);
        });


        
    }
}
