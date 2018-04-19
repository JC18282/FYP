<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicsController extends Controller
{
	public function __construct() {

		$this->middleware('auth');

	}

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
	public function store(Request $request) {
	

		$this->validate(request(), [
			'title' => 'required',
			'description' => 'required',
			'content' => 'required'

		]);

		$picName = time().'.'.$request->topicImage->getClientOriginalExtension();
		$request->topicImage->move(base_path('public/images'), $picName);

		$newTopic = Topic::create([

			'title' => request('title'),
			'description' =>request('description'),
			'content' => request('content'),
			'image' => $picName

		]);


		$url = '/topic/' . $newTopic->id . '/quiz/create';


		return redirect($url);
    	
	}
}
