@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Label</th>
				<th>Role(s)</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		@forelse ($permissions as $permission)
			@can('view_post', $permission)
				<tr>
					<td>{{$permission->id}}</td>
					<td>{{$permission->name}}</td>
					<td>{{$permission->label}}</td>
					<td>
						@forelse ($permission->role as $role)
							{{$role->name}}, 
						@empty
							
						@endforelse
					</td>
					<td>{{$permission->created_at}}</td>
					<td>
						<a href="{{route('posts.show', $permission->id)}}" class="btn btn-info btn-sm">Show</a> 
						<a href="{{route('posts.edit', $permission->id)}}" class="btn btn-warning btn-sm">Edit</a> 
						<a href="{{route('posts.destroy', $permission->id)}}" class="btn btn-danger btn-sm">Delete</a> 
					</td>
				</tr>
			@endcan
		@empty
			<tr>
				<td colspan="5"><strong>Nothing to show</strong></td>
			</tr>
		@endforelse		
		</table>

		{{$permissions->links()}}
	</div>
@endsection
