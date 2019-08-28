<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/loginFacebook','AuthController@loginWithFacebook');
Route::post('/login', 'AuthController@login');
Route::post('/signup', 'UserController@create');
Route::group(['middleware' => 'jwt.verify'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::post('/changePassword', 'AuthController@changePassword')->name('User.changePassword');
    Route::get('/users/{id}', 'UserController@findById')->name('User.findById');
    Route::post('/me/update', 'UserController@update')->name('User.update');
    Route::get('/me', 'AuthController@getUser')->name('User.update');
});
Route::group(['prefix'=>'houses'],function(){
    Route::get('/', 'HouseController@getAll')->name('House.getAll');
    Route::get('/{id}', 'HouseController@findById')->name('House.findById');
    Route::post('/create', 'HouseController@create')->name('House.create');
});

Route::post('/users/create', 'UserController@create')->name('User.create');
Route::group(['prefix'=>'location'],function (){
    Route::get('cities','Location@getCity');
    Route::get('cities/{matp}','Location@getDistrict');
    Route::get('districts/{maqh}','Location@getSubDistrict');
});

