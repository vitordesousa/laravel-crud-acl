<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;
use App\Models\Permission;
use App\Models\RolePermission;

class RoleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
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
