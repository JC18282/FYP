<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Auth;

class ChildController extends Controller
{
    public function store() {

    	$this->validate(request(), [
			'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:25',
            'gender' => 'required',

		]);

    	$parent = Auth::user();

		$newChild = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'gender' => request('gender'),
			'password' => Hash::make(request('password')),
			'parent_id' => $parent->id
		]);
        $newChild->roles()->attach(Role::where('name', 'child')->first());

		return redirect('/home');

    }

    public function index() {

    }

    public function create() {

    	return view('children.create');
    }
}
