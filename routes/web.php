<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\admin\ConfigController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ChooseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    });
    Route::resource('/location', LocationController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/tour', TourController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/article', ArticleController::class);
    Route::resource('/car', CarController::class);
    Route::resource('/config', ConfigController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/gallery', GalleryController::class);
    Route::resource('/choose', ChooseController::class);

    Route::get('/page/{id}/edit', [PageController::class, 'edit'])->name('editPage');
    Route::put('/page/{id}', [PageController::class, 'update'])->name('updatePage');
    
    });

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/wisata/{slug}', [HomeController::class, 'category']);
    Route::get('/blog', [HomeController::class, 'blog']);
    Route::get('/blog-detail/{slug}', [HomeController::class, 'blog']);
    Route::get('/about', [HomeController::class, 'about']);

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
