<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mapper;
use App\User;

class LocationController extends Controller
{
    public function __construct() {

		$this->middleware('auth');

	}

	public function store(Request $request) {

		$user = Auth::user();

		$user->latitude = $request->latitude;
		$user->longitude = $request->longitude;

		$user->save();

	}

	public function index() {

		$signedInUser = Auth::user();
		$users = User::all();
		$i = 1;
		Mapper::map($signedInUser->latitude, $signedInUser->longitude);
		foreach ($users as $user) {
			Mapper::informationWindow($user->latitude, $user->longitude, $user->name, ['maxWidth'=> 300, 'open' => 'true', 'title' => 'Title', 'icon' => 'images/pin.png']);
		}



		

   		return view('map.index');
		
	}
}
