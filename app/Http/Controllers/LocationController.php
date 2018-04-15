<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

		
		
	}
}
