<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Quiz;
use App\Question;
use App\Awnser;

class QuizzesController extends Controller
{
    public function create(Topic $topic) {

    	return view('quiz.create', compact('topic'));

    }

    public function view(Topic $topic) {

    	$quiz = Quiz::where('topic_id', $topic->id)->get()->first();
    	$questions = Question::where('quiz_id', $quiz->id)->get();
    	$awnsers = array();
    	foreach ($questions as $question) {
    		$awnser = 0;
    	}
    	dd();

    	//Awnser::where

    	//$data = [$topic, $quiz, $questions];

    	dd($questions);

    	return view('/topic/' . $topic->id . '/quiz')->with($data);

    }


    public function store(Topic $topic, Request $request) {


    	//dd(gettype($request->{'q' . '1' . 'correctawnser' }));

    	$newQuiz = Quiz::create([

    		'topic_id' => $topic->id,
			'title' => $topic->title . ' Quiz',
			'description' => 'A quiz about ' . $topic->title . '.'

		]);

		$newQuestions = $request->question;
    	
    	$i = 1;
    	foreach ($newQuestions as $key => $value) {
    		$newQuestion = Question::create([
    			'quiz_id' => $newQuiz->id,
    			'question' => $value

    		]);

    		
    		$newAwnsers = $request->{'q' . $i . 'a' };
    		$y = 1;
    		foreach ($newAwnsers as $key2 => $value2) {

    			if ($y == (int)$request->{'q' . $i . 'correctawnser' }) {
    				$correct = 1;
    			}
    			else {
    				$correct = 0;
    			}

    			Awnser::create([
    				'question_id' => $newQuestion->id,
    				'body' => $value2,
    				'correct' => $correct

    			]);


    		$y++;
			}
			$i++;
		
    	}
    	return('/topic');
}
}
