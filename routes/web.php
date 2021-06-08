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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('albums', App\Http\Controllers\AlbumController::class)->except(['edit']);

Route::get('/users/create',[App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::get('/artists',[App\Http\Controllers\ArtistController::class, 'index'])->name('artists.index');
Route::post('/users',[App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
