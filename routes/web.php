<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;

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
});

Route::get('/', [HomeController::class, 'index']);
Route::get('wisata/{slug}', [HomeController::class, 'category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
