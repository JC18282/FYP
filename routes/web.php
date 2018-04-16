<?php

use App\User;


//User
Route::get('/user', function () {

	$users = User::all();

    return view('user', compact('users'));
});


//Topic
Route::get('/topic', 'TopicsController@index');

Route::get('/topic/create', 'TopicsController@create');

Route::post('/topic', 'TopicsController@store')->name('topics');

Route::get('/topic/{topic}', 'TopicsController@show');


//Quiz 
Route::post('/topic/{topic}/quiz', 'QuizzesController@store');

Route::get('/topic/{topic}/quiz', 'QuizzesController@view');

Route::get('/topic/{topic}/quiz/create', 'QuizzesController@create');


//AUTH
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');


//Map
Route::post('/map', 'LocationController@store');

Route::get('/map', 'LocationController@index');