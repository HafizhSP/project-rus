<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Routes for Admin
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|
*/


Route::prefix('manage')->middleware('auth', 'super-admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');


    // ===== Service ===== 
    Route::get('/order', 'OrderController@index');
    Route::post('/order/detail/{id}', 'OrderController@detail');
    Route::patch('/order/update/{id}', 'OrderController@update');

    // Kelola Layanan
    Route::prefix('product')->group(function () {
        Route::resource('/list', 'Service_ProductController');
        Route::post('/list/create', 'Service_ProductController@create')->name('add_product'); //Add Product from List API Product
        Route::resource('/category', 'Service_CategoryController');
        Route::resource('/socmed', 'Service_SocmedController');
        Route::get('/coupon', function () {
            return view('admin.pages.service.product.coupon');
        });
    });

    // Kelola API layanan
    Route::prefix('api')->group(function () {
        // API Product
        Route::get('/product', 'Api_ProductController@index')->name('api_product');
        Route::get('/product/{id}', 'Api_ProductController@show');

        // API Vendor
        Route::resource('/vendor', 'Api_VendorController');
    });


    // ===== User ===== 
    // Reseller
    Route::get('/reseller/register', function () {
        return view('admin.pages.user.reseller.register');
    });
    Route::resource('/reseller', 'ResellerController');
    Route::patch('/reseller/admin/{id}', 'ResellerController@admin')->name('reseller.new-admin');

    // Admin
    Route::get('/admin/history', function () {
        return view('admin.pages.user.admin.history');
    });
    Route::resource('/admin', 'AdminController');


    // ===== Billing ===== 
    // Invoice
    Route::prefix('invoice')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.billing.invoice.invoice');
        });
    });

    // Konfirmasi Pembayaran
    Route::get('/payment', 'Payment_ConfirmationController@index');
    Route::patch('/payment/confirm/{id}', 'Payment_ConfirmationController@confirm')->name('payment-confirm');
    Route::patch('/payment/denied/{id}', 'Payment_ConfirmationController@denied')->name('payment-denied');

    // Bank
    Route::resource('/bank', 'BankController');

    // Statistik
    Route::get('/statistic', function () {
        return view('admin.pages.billing.statistic.statistic');
    });

    // Mutasi
    Route::get('/mutation', function () {
        return view('admin.pages.billing.statistic.mutation');
    });


    // ===== Support ===== 
    // Tiket
    Route::prefix('ticket')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.support.ticket.ticket');
        });
    });

    // Kelola Informasi
    Route::prefix('information')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.support.information.information');
        });
    });

    // Panduan Reseller
    Route::prefix('tips')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.support.panduan.panduan');
        });
    });
});
