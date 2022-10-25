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

//Agenda
Route::get('/agenda', 'Admin\AgendaController@index')->name('admin.agenda');
Route::get('/agenda-create-page', 'Admin\AgendaController@createPage')->name('admin.agenda-create-page');
Route::get('/agenda-detail/{id}', 'Admin\AgendaController@detail')->name('admin.agenda-detail');
Route::get('/agenda-update-page/{id}', 'Admin\AgendaController@updatePage')->name('admin.agenda-update-page');

//CRUD Agenda
Route::post('/agenda-create', 'Admin\AgendaController@create')->name('admin.agenda-create');
Route::post('/agenda-update/{id}', 'Admin\AgendaController@update')->name('admin.agenda-update');
Route::post('/agenda-delete/{id}', 'Admin\AgendaController@delete')->name('admin.agenda-delete');

//Pembayaran
Route::get('/pembayaran', 'Admin\PembayaranController@index')->name('admin.pembayaran');
Route::get('/pembayaran-create-page', 'Admin\PembayaranController@createPage')->name('admin.pembayaran-create-page');
Route::get('/pembayaran-detail/{id}', 'Admin\PembayaranController@detail')->name('admin.pembayaran-detail');
