<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = Auth::user();
        if ($user->hasRole('child')) {
            $parent = $user->parent;
            return view('home.index', compact('parent'));
        } 
        elseif ($user->hasRole('parent')) {
            $children = $user->children;
            return view('home.index', compact('children'));
        }
        elseif ($user->hasRole('admin')) {

            $topics = Topic::all();

            return view('home.admin.index', compact('topics'));
        }

    }
}
