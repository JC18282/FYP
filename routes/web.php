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

Route::post('/topic', 'TopicsController@store');

Route::get('/topic/{topic}', 'TopicsController@show');


//Quiz 
Route::post('/topic/{topic}/quiz', 'QuizzesController@store');

Route::get('/topic/{topic}/quiz/create', 'QuizzesController@create');