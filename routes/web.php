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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', ], function() {
    Route::resource('admin/admin', 'AdminController');
    // 商品
    Route::resource('admin/products', 'ProductsController');

});

// 微信路由
Route::any('/wechat/serve', 'WeChatController@serve');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
