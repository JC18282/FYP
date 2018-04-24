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

		if ($signedInUser->user_type == 'parent'){
			$children = $signedInUser->children;
			Mapper::map($signedInUser->latitude, $signedInUser->longitude);
			foreach ($children as $child) {
				Mapper::informationWindow($child->latitude, $child->longitude, $child->name . '<br>' . $child->updated_at->diffForHumans(), ['maxWidth'=> 300, 'open' => 'true', 'title' => 'Title', 'icon' => 'images/pin.png']);
			}	
		}elseif ($signedInUser->user_type == 'child') {
			$parent = $signedInUser->parent;
			Mapper::map($signedInUser->latitude, $signedInUser->longitude);
			Mapper::informationWindow($parent->latitude, $parent->longitude, $parent->name . '<br>' . $parent->updated_at->diffForHumans(), ['maxWidth'=> 300, 'open' => 'true', 'title' => 'Title', 'icon' => 'images/pin.png']);
		}


   		return view('map.index');
		
	}
}
