<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RoleStoreRequest;

class RoleController extends Controller
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
		self::deny('roles_index');

		$roles = Role::paginate(10);
		return view('roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		self::deny('roles_create');

		$collection  = collect(Permission::all());
		$permissions = $collection->groupBy('route');
		return view('roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\RoleStoreRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(RoleStoreRequest $request)
	{
		self::deny('roles_create');

		$role = Role::create($request->only('name', 'label'));
		self::setPermissionsToRole($role, $request->permission, 'store');
		return redirect()->route('roles.index')->with('success', 'Role created successfully!');
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
	 * @param  mixin  $role
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Role $role)
	{
		self::deny('roles_edit');

		$collection  = collect(Permission::all());
		$permissions = $collection->groupBy('route');
		return view('roles.edit', compact('role', 'permissions'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Http\Requests\RoleStoreRequest  $request
	 * @param  mixin  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(RoleStoreRequest $request, Role $role)
	{
		self::deny('roles_edit');

		$role->update($request->only('name', 'label'));
		self::setPermissionsToRole($role, $request->permission, 'update');
		return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  mixin  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role)
	{
		self::deny('roles_delete');

		try {
			$role->delete();
			return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
		} catch (\Throwable $th) {
			abort(400, $th);
		}
	}





	/**
	 * Add Roles to user
	 *
	 * @param mixin $role
	 * @param array $permissions
	 * @param string $method
	 * @return void
	 */
	public static function setPermissionsToRole($role, $permissions, $method = null){
		try {
			if($method === 'update'){
				$role->rolepermission()->delete(); // first delete old values
			}
		} catch (\Throwable $th) {
			abort(400, 'Error while change old values');
		}

		foreach ($permissions as $value) {
			RolePermission::create(['role_id' => $role->id, 'permission_id' => (int)$value]);
		}

		return;
	}
}
