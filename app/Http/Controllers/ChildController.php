<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ChildController extends Controller
{
    public function store() {

    	$this->validate(request(), [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'gender' => 'required'

		]);

    	$parent = Auth::user();

		$newChild = User::create([
			'name' => request('name'),
			'user_type' => 'child',
			'email' => request('email'),
			'gender' => request('gender'),
			'password' => Hash::make(request('password')),
			'parent_id' => $parent->id
		]);

		return redirect('/home');

    }

    public function index() {


    }

    public function create() {

    	return view('children.create');
    }
}
