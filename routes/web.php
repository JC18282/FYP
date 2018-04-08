<?php

use App\User;

Route::get('/user', function () {

	$users = User::all();

    return view('user', compact('users'));
});

Route::get('/topic', 'TopicsController@index');

//Route::get('/topic/{topic}', 'TopicsController@show');

Route::get('/topic/create', 'TopicsController@create');

Route::post('/topic', 'TopicsController@store');