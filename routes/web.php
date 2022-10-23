<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
Route::get('/user-create-page', [App\Http\Controllers\Admin\UserController::class, 'createPage'])->name('admin.user-create-page');
Route::post('/user-create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user-create');
Route::get('/user-update-page/{id}', [App\Http\Controllers\Admin\UserController::class, 'updatePage'])->name('admin.user-update-page');
Route::post('/user-update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user-update');
Route::post('/user-delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user-delete');
