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

Route::get("/settings", "SettingsController@index");

Route::get("/hotel/search", "HotelController@search");
Route::post("/hotel/searchResult", "HotelController@searchResult");
Route::get("/hotel/list", "HotelController@list");
Route::get("/hotel/displayHotel", "HotelController@displayHotel");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
