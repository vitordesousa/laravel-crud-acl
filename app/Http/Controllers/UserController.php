<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
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
		self::deny('users_index');

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
		self::deny('users_create');

		$roles = Role::all();
		return view('users.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\UserStoreRequest $request
	 * @return App\Http\Requests\UserStoreRequest
	 */
	public function store(UserStoreRequest $request)
	{
		self::deny('users_create');

		$user = User::create($request->only('name', 'email', 'password'));
		self::setUserRoles($request, $user, 'store');
		return redirect()->route('users.index')->with('success', 'User created successfully!');
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
	 * @param  mixin  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		self::deny('users_edit');

		$roles = Role::all();
		return view('users.edit', compact('user', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Http\Requests\UserUpdateRequest  $request
	 * @param  mixin  $user
	 * @return App\Http\Requests\UserUpdateRequest
	 */
	public function update(UserUpdateRequest $request, User $user)
	{
		self::deny('users_edit');

		// remove old roles and add new
		self::setUserRoles($request, $user, 'update');

		$user->update($request->only('name', 'email'));
		return redirect()->route('users.index')->with('success', 'User updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  mixin  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		self::deny('users_delete');

		try {
			$user->delete();
			return redirect()->route('users.index')->with('success', 'User deleted successfully!');
		} catch (\Throwable $th) {
			abort(400, $th);
		}
	}



	/**
	 * Add Roles to user
	 *
	 * @param mixin $request
	 * @param mixin $user
	 * @return void
	 */
	public static function setUserRoles($request, $user, $method = null){
		try {
			
			if($method === 'update'){
				$user->roleuser()->delete(); // first delete old values
			}

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
