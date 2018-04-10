<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Quiz;
use App\Question;

class QuizzesController extends Controller
{
    public function create(Topic $topic) {

    	return view('quiz.create', compact('topic'));

    }

    public function store(Topic $topic) {

    	$newQuiz = Quiz::create([

    		'topic_id' => $topic->id,
			'title' => $topic->title . ' Quiz',
			'description' => 'A quiz about ' . $topic->title . '.'

		]);

		$newQuestion1 = Question::create([

			'quiz_id' => $newQuiz->id,
			'question' => request('question1')

		]);

		$newQuestion2 = Question::create([

			'quiz_id' => $newQuiz->id,
			'question' => request('question2')

		]);

		$newQuestion3 = Question::create([

			'quiz_id' => $newQuiz->id,
			'question' => request('question3')

		]);

		//dd($newQuestion1);

    }
}
