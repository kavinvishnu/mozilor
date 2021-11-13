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
	return redirect()->route("home");	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('import_product_view','ProductController@product_import_view')->name('import_product_view');
Route::post('import_product','ProductController@product_import')->name('import_product');
Route::get('importformat','ProductController@product_import_format')->name('importformat');
Route::get('product_view','ProductController@view_product')->name('product_view');
Route::get('product_edit','ProductController@edit_product')->name('product_edit');
Route::get('editproduct','ProductController@edit_product_data')->name('editproduct');
