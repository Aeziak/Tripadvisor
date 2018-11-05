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
Route::get("/hotel/login","LoginHotelController@login");
Route::post("/hotel/loginconfirm", "LoginHotelController@checklogin");
Route::get("/hotel/loginHotelier","LoginHotelController@loginHotelier");
Route::post("/hotel/loginconfirmHotelier", "LoginHotelController@checkloginHotelier");
Route::get("/hotel/logout","LoginHotelController@logout");
Route::get("/hotel/displaypersonne","AbonneController@index");
Route::get("/hotel/register","RegisterController@index");
Route::post("/hotel/confirmRegister", "RegisterController@confirmRegister");
Route::get("/hotel/registerHotelier","RegisterController@indexHotelier");
Route::post("/hotel/confirmRegisterHotelier", "RegisterController@confirmRegisterHotelier");
Route::post("/hotel/addAvis", "HotelController@addAvis");
Route::post("/hotel/confirmCreateHotel", "HotelController@confirmCreateHotel");
Route::get("/hotel/addFavoris", "HotelController@addFavoris");
Route::post("/hotel/editProfile", "RegisterController@editProfile");
Route::post("/hotel/updateProfile", "RegisterController@updateProfile");
Route::post("/hotel/createHotel", "HotelController@createHotel");
Route::post("/hotel/editHotel", "HotelController@editHotel");
Route::post("/hotel/confirmEditHotel", "HotelController@confirmEditHotel");





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
