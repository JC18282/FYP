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
		$children = $signedInUser->children;
		$i = 1;
		Mapper::map($signedInUser->latitude, $signedInUser->longitude);
		foreach ($children as $child) {
			Mapper::informationWindow($child->latitude, $child->longitude, $child->name, ['maxWidth'=> 300, 'open' => 'true', 'title' => 'Title', 'icon' => 'images/pin.png']);
		}

   		return view('map.index');
		
	}
}
