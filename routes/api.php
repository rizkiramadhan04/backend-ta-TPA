<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user
Route::post('/login', 'Api\AuthController@login')->name('api.login');
Route::post('/get-data', 'Api\AuthController@getData')->name('api.get-data');
Route::post('/update', 'Api\AuthController@update')->name('api.update');
Route::post('/logout', 'Api\AuthController@logout')->name('api.logout');