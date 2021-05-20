<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
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
		self::deny('permissions_index');

		$permissions = Permission::paginate(10);
		return view('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		self::deny('permissions_create');

		return view('permissions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\PermissionStoreRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PermissionStoreRequest $request)
	{
		self::deny('permissions_create');

		Permission::create($request->only('name', 'label'));
		return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
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
	 * @param  mixin  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Permission $permission)
	{
		self::deny('permissions_edit');

		return view('permissions.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PermissionStoreRequest $request, Permission $permission)
	{
		self::deny('permissions_edit');

		$permission->update($request->only('name', 'label'));
		return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Permission $permission)
	{
		self::deny('permissions_delete');

		try {
			$permission->delete();
			return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
		} catch (\Throwable $th) {
			abort(400, $th);
		}
	}
}
