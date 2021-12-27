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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Routes Pemesanan API
Route::prefix('v1')->group(function () {
    Route::post('/', 'ApiController@api'); //GENERAL API METHOD
    // Route::post('/profile', 'ApiController@profile'); //PROFILE USER
    // Route::post('/services', 'ApiController@services'); //DAFTAR LAYANAN
    // Route::post('/order', 'ApiController@create'); //CREATE NEW ORDER
    // Route::post('/status', 'ApiController@status'); //CHECK ORDER
});
