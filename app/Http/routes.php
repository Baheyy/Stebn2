<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('welcome', 'WelcomeController@index');

Route::get('authentication/register', 'AuthenticationController@register');

Route::post('register', 'AuthenticationController@store');

Route::get('authentication/login', 'AuthenticationController@login');

Route::post('login', 'AuthenticationController@authenticate');

Route::get('logout', 'AuthenticationController@Deauthenticate');

Route::get('admin/welcome', 'AdminController@index');

Route::get('admin/cards', 'AdminController@cards');

Route::post('CreateCards', 'AdminController@CreateCards');

Route::get('hotelreceptionist/welcome', 'HotelReceptionistController@index');

Route::get('hotelreceptionist/viewCards', 'HotelReceptionistController@viewCards');

Route::get('admin/bikes', 'AdminController@bikes');

Route::post('CreateBikes', 'AdminController@CreateBikes');

Route::get('admin/bikestations', 'AdminController@bikeStations');

Route::post('CreateBikeStations', 'AdminController@CreateBikeStations');

Route::get('admin/viewBikeStations', 'AdminController@viewBikeStations');

Route::get('bikestations', 'UserController@bikeStations');

Route::post('viewBikeStations', 'AdminController@viewBikes');