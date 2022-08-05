<?php

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

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', 'LoginController@login')->name('login');
Route::get('/', 'PostController@homePage');
Route::post('/do-login', 'LoginController@doLogin')->name('do-login');
Route::get('/chart', 'PostController@chartData')->name('nam.db');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::post('/upload','PostController@uploadImage')->name('upload.image');

Route::resource('/posts', PostController::class)->middleware('checklogin');
