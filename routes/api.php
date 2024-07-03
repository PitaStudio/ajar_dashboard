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
    Route::post('sms_otp','sendSMS');
    Route::post('users/update','update');
    Route::post('users/delete','delete');
    Route::get('users/{id}','show');
    Route::get('users/{id}/black_list', 'blackList');
    Route::post('users/{id}/black_list', 'AddToBlackList');
    Route::post('users/{id}/remove_black_list', 'removeFromBlackList');
    Route::get('users/black_list/{number}', 'findInBlackList');
});

Route::controller(AddsController::class)->group(function(){
    Route::get('adds/{user_id?}','adds');
    Route::post('adds','createContact');
    Route::post('create_add','createNewAdd');
    Route::get('my_adds/{user_id}','myAdds');
    Route::get('my_adds/{id}/delete','delete');
    Route::post('my_adds/update','update');
    Route::post('review_add','reviewAdd');
});