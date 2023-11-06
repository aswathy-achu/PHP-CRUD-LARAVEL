<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::any('/createproduct', 'ProductController@createproduct')->name('createproduct');
Route::any('/manage_product/{id?}', 'ProductController@manage_product')->name('manage_product');
Route::any('/product_list', 'ProductController@product_list')->name('product_list');
Route::any('/get_product', 'ProductController@get_product')->name('get-product');
Route::any('/del_product/{id?}',[ProductController::class, 'del_product'])->name('del_product');


Route::any('/create_category',[CategoryController::class, 'createcategory'])->name('createcategory');
Route::any('/manage_category/{id?}', 'CategoryController@manage_category')->name('manage_category');
Route::any('/category_list', 'CategoryController@categorylist')->name('category_list');
Route::any('/del_category/{id?}',[CategoryController::class, 'del_category'])->name('del_category');
Route::any('/get_category', 'CategoryController@getCategories')->name('get-category');
