<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Routes
|--------------------------------------------------------------------------
|Routes for Landing
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Auth
Auth::routes();
// Route::get('/login', 'LoginController@index')->name('login');
// Route::post('/panel/login', 'LoginController@postLogin');
// Route::get('/logout', 'LoginController@logout');;

Route::get('/', function () {
    return view('landing.pages.homepage');
});

Route::get('/register', function () {
    return view('landing.pages.register');
});

Route::get('/status-account', function () {
    return view('landing.pages.status-account');
});

Route::get('/about-us', function () {
    return view('landing.pages.about');
});

Route::get('/contact', function () {
    return view('landing.pages.contact');
});


// Cron Routes
Route::prefix('cron')->group(function () {
    Route::get('/orders', 'CronController@cronCheck');
});
