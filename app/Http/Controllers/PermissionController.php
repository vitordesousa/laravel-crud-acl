<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
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
		try {
			$permission->delete();
			return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
		} catch (\Throwable $th) {
			abort(400, $th);
		}
	}
}
