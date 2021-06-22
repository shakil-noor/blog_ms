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
    return view('FrontSite/index');
});
//Route::get('/','Frontend\HomeController@index')->name('vromon.home');


Route::get('/admin', function () {
    return view('BackSite/index');
})->name('admin.home');

Route::group(['prefix'=>'admin','namespace'=>'BackSite'],function (){
    Route::resource('category','CategoryController');
    Route::resource('subCategory','SubCategoryController');
});