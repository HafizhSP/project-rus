<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
| Routes for Client Dashboard
|
| Here is where you can register Dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|
*/


Route::middleware('auth', 'client')->group(function () {
    /** Dashboard Page  **/
    Route::get('/dashboard', 'DashboardController@index')->name('client.dashboard');

    /** Service Page  **/
    Route::prefix('service')->group(function () {
        Route::resource('/order', 'Order_NewController');
        Route::post('/order/dropdown-category', 'Order_NewController@dropdown_category'); //Dropdown Category
        Route::post('/order/dropdown-product', 'Order_NewController@dropdown_product'); //Dropdown Product
        Route::post('/order/show-product', 'Order_NewController@show_product'); //Dropdown Product
        Route::get('/history', 'Order_HistoryController@index');
        Route::post('/history/detail/{id}', 'Order_HistoryController@show'); //Show Detail
        Route::resource('/pricelist', 'Order_PricelistController');
    });

    /** Deposit Page  **/
    Route::get('/deposit/history', 'Deposit_HistoryController@index')->name('deposit-history');
    Route::get('/deposit/history/{id}', 'Deposit_HistoryController@show')->name('deposit-detail');
    Route::post('/deposit/history/check/{id}', 'Deposit_HistoryController@check')->name('deposit-check');
    Route::post('/deposit/history/cancel/{id}', 'Deposit_HistoryController@cancel')->name('deposit-cancel');
    Route::post('/deposit/history/confirmation/{id}', 'Deposit_HistoryController@confirmation')->name('deposit-confirmation');
    Route::resource('/deposit', 'Deposit_NewController');


    /** Support Page  **/
    Route::prefix('support')->group(function () {
        // Tickets
        Route::get('/tickets', 'Support_TicketController@index');
        Route::get('/tickets/create', 'Support_TicketController@create');

        // Statistics
        Route::get('/statistics', 'Support_StatisticsController@index');

        // Informations
        Route::get('/informations', 'Support_InformationsController@index');

        // Tips
        Route::get('/tips', 'Support_TipsController@index');

        // API Doc
        Route::get('/apidoc', 'Support_ApiController@index');
    });

    /** Account Page  **/
    Route::prefix('account')->group(function () {
        Route::get('/profile', function () {
            return view('client.pages.account.profile');
        });
        Route::get('/history', function () {
            return view('client.pages.account.history-login');
        });
    });
});
