@extends('layouts.app')

@section('content')
	<div class="container">
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
			@can('view_post', $role)
				<tr>
					<td>{{$role->id}}</td>
					<td>{{$role->name}}</td>
					<td>{{$role->label}}</td>
					<td>{{$role->permission->count()}}</td>
					<td>{{$role->user->count()}}</td>
					<td>{{$role->created_at}}</td>
					<td>
						<a href="{{route('roles.show', $role->id)}}" class="btn btn-info btn-sm">Show</a> 
						<a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning btn-sm">Edit</a> 
						<a href="{{route('roles.destroy', $role->id)}}" class="btn btn-danger btn-sm">Delete</a> 
					</td>
				</tr>
			@endcan
		@empty
			<tr>
				<td colspan="5"><strong>Nothing to show</strong></td>
			</tr>
		@endforelse		
		</table>

		{{$roles->links()}}
	</div>
@endsection
