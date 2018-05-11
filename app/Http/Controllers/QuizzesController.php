<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Topic;
use App\Quiz;
use App\Question;
use App\Awnser;

class QuizzesController extends Controller
{
	public function __construct() {

		$this->middleware('auth');

	}

    public function edit(Quiz $quiz) {

        if (Auth::user()->hasRole('admin')) {

            return view('home.admin.quiz', compact('quiz'));

        }
        else {

            return redirect('/home');

        }   

    }

    public function create(Topic $topic) {

        if (Auth::user()->hasRole('admin')) {

            return view('quiz.create', compact('topic'));

        }
        else {

            return redirect('/home');

        }

    }

    public function view(Topic $topic) {

    	$quiz = Quiz::where('topic_id', $topic->id)->get()->first();
    	$questions = Question::where('quiz_id', $quiz->id)->get();

    	return view('quiz.view', compact(['topic', 'quiz', 'questions']));

    }


    public function store(Topic $topic, Request $request) {

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
    	return redirect()->route('topics');
}
}
