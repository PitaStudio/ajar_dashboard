<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BlackListController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[LoginController::class,'showLoginView'])->name('login');
Route::post('check/login',[LoginController::class,'checkLogin'])->name('check.login');

Route::middleware(['auth:web'])->group(function () {

    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    // Route::get('home',[HomeController::class,'index'])->name('home');
    #############################################################################
    Route::get('city',[CityController::class, 'index'])->name('city.index');
    Route::post('city/store',[CityController::class, 'store'])->name('city.store');
    Route::get('city/delete/{id}',[CityController::class, 'delete'])->name('city.delete');
    Route::post('city/update/{id}',[CityController::class, 'update'])->name('city.update');

    #############################################################################
    Route::get('about',[AboutController::class, 'index'])->name('about.index');
    Route::post('about/update/{id}',[AboutController::class, 'update'])->name('about.update');

    #############################################################################
    Route::get('categories',[CategoriesController::class, 'index'])->name('categories.index');
    Route::post('categories/store',[CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
    Route::post('categories/update/{id}',[CategoriesController::class, 'update'])->name('categories.update');

    #############################################################################
    Route::get('adds',[AddsController::class, 'index'])->name('adds.index');
    Route::post('adds/store',[AddsController::class, 'store'])->name('adds.store');
    Route::get('adds/delete/{id}',[AddsController::class, 'delete'])->name('adds.delete');
    Route::post('adds/update/{id}',[AddsController::class, 'update'])->name('adds.update');

    #############################################################################
    Route::get('region',[RegionController::class, 'index'])->name('region.index');
    Route::post('region/store',[RegionController::class, 'store'])->name('region.store');
    Route::get('region/delete/{id}',[RegionController::class, 'delete'])->name('region.delete');
    Route::post('region/update/{id}',[RegionController::class, 'update'])->name('region.update');

    #############################################################################
    Route::get('banners',[BannersController::class, 'index'])->name('banners.index');
    Route::post('banners/store',[BannersController::class, 'store'])->name('banners.store');
    Route::get('banners/delete/{id}',[BannersController::class, 'delete'])->name('banners.delete');
    Route::post('banners/update/{id}',[BannersController::class, 'update'])->name('banners.update');

    #############################################################################
    Route::get('users',[UsersController::class, 'index'])->name('users.index');
    Route::post('users/store',[UsersController::class, 'store'])->name('users.store');
    Route::get('users/delete/{id}',[UsersController::class, 'delete'])->name('users.delete');
    Route::post('users/update/{id}',[UsersController::class, 'update'])->name('users.update');

    #############################################################################
    Route::get('inquiry',[InquiryController::class, 'index'])->name('inquiry.index');
    Route::get('inquiry_list',[InquiryController::class, 'inquiry_list'])->name('inquiry.inquiry_list');
    Route::post('inquiry/store',[InquiryController::class, 'store'])->name('inquiry.store');
    Route::get('inquiry/delete/{id}',[InquiryController::class, 'delete'])->name('inquiry.delete');
    Route::post('inquiry/update/{id}',[InquiryController::class, 'update'])->name('inquiry.update');

    #############################################################################
    Route::get('orders',[OrdersController::class, 'index'])->name('orders.index');
    Route::post('orders/search',[OrdersController::class,'searchAjax'])->name('search_ajax');
    Route::get('orders/delete/{id}',[OrdersController::class, 'delete'])->name('orders.delete');
    Route::post('orders/update/{id}',[OrdersController::class, 'update'])->name('orders.update');

    #############################################################################
    Route::get('black_list',[BlackListController::class, 'index'])->name('black_list.index');
    Route::get('black_list/delete/{id}',[BlackListController::class, 'delete'])->name('black_list.delete');
    Route::post('black_list/update/{id}',[BlackListController::class, 'update'])->name('black_list.update');



});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Routinized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Routinized class loader</h1>';
});

//dump-autoload  class loader:
Route::get('/dump', function() {
    $exitCode = Artisan::call('dump-autoload');
    return '<h1>dump-autoload successfully</h1>';
});



