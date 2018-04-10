<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicsController extends Controller
{
	//Displays all topics in the LMS.
	public function index() {

		$topics = Topic::all();

		//dd($topics);

	    return view('topic.index', compact('topics'));
	}

	//Finds topic specified in GET request.
	public function show(Topic $topic) {

    	return view('topic.show', compact('topic'));
    	
	}

	//Displays topic create form
	public function create() {

    	return view('topic.create');
    	
	}

	//Stores new topic in db.
	public function store() {

		//dd(request('title'));		

		$this->validate(request(), [
			'title' => 'required',
			'content' => 'required'

		]);

		$newTopic = Topic::create([

			'title' => request('title'),
			'content' => request('content')

		]);


		$url = '/topic/' . $newTopic->id . '/quiz/create';


		return redirect($url);
    	
	}
}
