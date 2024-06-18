<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AddsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(GeneralController::class)->group(function(){
    Route::get('about','about');
    Route::get('regions','regions');
    Route::get('banners','banners');
    Route::get('home','home');
    Route::get('inquiries','inquiries');
    Route::post('inquiries','addInquery');
});

Route::controller(UsersController::class)->group(function(){
    Route::post('users/login','login');
    Route::post('users/register','register');
    Route::post('users/update','update');
    Route::get('users/{id}','show');
});

Route::controller(AddsController::class)->group(function(){
    Route::get('adds/{user_id?}','adds');
    Route::post('adds','createContact');
    Route::post('create_add','createNewAdd');
    Route::get('my_adds/{user_id}','myAdds');
});