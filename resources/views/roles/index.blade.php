@extends('layouts.app')

@section('content')
	@can('roles_index')
		<div class="container">
			@include('_components.alerts')

			<div class="row">
				<div class="col-lg-7 p-3">Roles</div>
				<div class="col-lg-5 p-3"><a href="{{route('roles.create')}}" class="btn btn-success btn-sm float-right">Add</a> </div>
			</div>
			<table class="table table-bordered table-hover">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Label</th>
					<th>Permissions</th>
					<th>Users</th>
					<th>Created At</th>
					<th>Actions</th>
				</tr>
			@forelse ($roles as $role)
				<tr>
					<td>{{$role->id}}</td>
					<td>{{$role->name}}</td>
					<td>{{$role->label}}</td>
					<td>{{$role->permission->count()}}</td>
					<td>{{$role->user->count()}}</td>
					<td>{{$role->created_at}}</td>
					<td>
						<a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning btn-sm">Edit</a> 
						<a href="{{route('roles.destroy', $role->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{$role->id}}').submit();">Delete</a>
						<form id="delete-form-{{$role->id}}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-none">
							@csrf
							@method('DELETE')
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5"><strong>Nothing to show</strong></td>
				</tr>
			@endforelse		
			</table>

			{{$roles->links()}}
		</div>
	@else
		@include('_components.permission_denied')
	@endcan
@endsection
