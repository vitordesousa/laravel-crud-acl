<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$posts = Post::all();
		$users = User::paginate(10);
		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$roles = Role::all();
		return view('users.edit', compact('user', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserUpdateRequest $request, User $user)
	{
		// remove old roles and add new
		self::updateUserRoles($request, $user);

		$user->update($request->only('name', 'email'));

		return redirect()->route('users.index')->with('success', 'User updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}



	/**
	 * Add Roles to user
	 *
	 * @param mixin $request
	 * @param mixin $user
	 * @return void
	 */
	public static function updateUserRoles($request, $user){
		try {
			$user->userrole()->delete(); // first delete old values
			try {
				foreach ($request->role as $value) {
					RoleUser::create(['role_id' => (int)$value, 'user_id' => $user->id]);
				}
			} catch (\Throwable $th) {
				abort(400, $th);
			}
		} catch (\Throwable $th) {
			abort(400, $th);
		}
		
		
		return;
	}
}
