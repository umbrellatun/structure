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
Route::get('/godsplit', 'GodSplitController@index');
Route::post('/godsplit/get_detail', 'GodSplitController@get_detail')->name('godsplit.get_detail');
Route::post('/godsplit/updateAppvStatus', 'GodSplitController@updateAppvStatus')->name('godsplit.updateAppvStatus');

Route::get('/godsplitApprove', 'GodSplitApproveController@index');
Route::post('/godsplitApprove/get_detail', 'GodSplitApproveController@get_detail')->name('godsplitApprove.get_detail');
Route::post('/godsplitApprove/updateAppvSplitStatus', 'GodSplitApproveController@updateAppvSplitStatus')->name('godsplitApprove.updateAppvSplitStatus');


Route::get('/customer/{customer_id}', 'HomeController@index')->name('customer');
Route::post('/customer/get_cust_code', 'HomeController@get_cust_code')->name('customer.get_cust_code');
Route::post('/customer/get_default_product', 'HomeController@get_default_product')->name('customer.get_default_product');
Route::post('/customer/get_product', 'HomeController@get_product')->name('customer.get_product');
Route::post('/customer', 'HomeController@store')->name('customer.store');


//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear Route cache:
Route::get('/route:list', function() {
    $exitCode = Artisan::call('route:list');
    return $exitCode;
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
