<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Auth\Access\Gate;

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
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$items = Post::all();
		return view('home', compact('items'));
	}

	public function edit(Post $post){

		if( !Gate::allows('update-post', $post)){
			abort(403);
		}

		return view('posts.edit', compact('post'));
	}
}
