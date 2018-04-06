<?php

use App\Topic;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {

	$users = User::all();

    return view('user', compact('users'));
});

Route::get('/topic', function () {

	$topics = Topic::all();

    return view('topic.index', compact('topics'));
});

Route::get('/topic/{topic}', function ($id) {

	$topic = Topic::find($id);

    return view('topic.show', compact('topic'));
});