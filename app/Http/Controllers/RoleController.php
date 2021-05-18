<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;

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
		return view('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\RoleStoreRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(RoleStoreRequest $request)
	{
		Role::create($request->only('name', 'label'));
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
		return view('roles.edit', compact('role'));
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
}
