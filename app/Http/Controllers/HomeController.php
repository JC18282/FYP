<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        if ($user->user_type == 'child') {
            $parent = $user->parent;
            return view('home', compact('parent'));
        } 
        else {
            $children = $user->children;
            return view('home', compact('children'));
        }

    }
}
