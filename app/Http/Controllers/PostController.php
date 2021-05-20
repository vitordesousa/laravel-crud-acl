<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
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
	 * detetermine if user can pass or no
	 *
	 * @param string $gate
	 * @param mixins $model
	 * @return void
	 */
	public static function deny($gate, $model = null){
		if( !Gate::allows($gate, $model)){
			abort(401);
		}
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		self::deny('posts_index');

		$posts = Post::paginate(10);
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		self::deny('posts_create');

		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\PostStoreRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostStoreRequest $request)
	{
		self::deny('posts_create');

		Post::create(['title' => $request->title, 'description' => $request->description, 'user_id' => auth()->user()->id ]);
		return redirect()->route('posts.index')->with('success', 'Post created successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  mixin  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		self::deny('posts_show');

		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::findOrfail($id);
		
		self::deny('posts_edit', $post);
		
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Http\Requests\PostStoreRequest $request
	 * @param  mixin  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post)
	{
		$post->update($request->only('title', 'description'));
		
		self::deny('posts_edit', $post);

		return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  mixin  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		self::deny('posts_delete');

		try {
			$post->delete();
			return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
		} catch (\Throwable $th) {
			abort(400, $th);
		}
	}
}
