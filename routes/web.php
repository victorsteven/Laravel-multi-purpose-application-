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

Route::get('invoice', function () {
    return view('invoice');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//this is important because, we are using Vue-router to change from "dashboard" to "profile", etc,
//whithout this, when we refresh the page, it will display error, without taking us to where we were before,
//if someone goes to a route that is not definedm take them to the index
Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');