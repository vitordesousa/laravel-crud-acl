@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Role(s)</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		@forelse ($users as $user)
			@can('view_post', $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>
						@forelse ($user->role as $role)
							{{$role->name}}, 
						@empty
							<strong>This user don't have role</strong>
						@endforelse
					</td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>
					<td>
						<a href="{{route('posts.show', $user->id)}}" class="btn btn-info btn-sm">Show</a> 
						<a href="{{route('posts.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a> 
						<a href="{{route('posts.destroy', $user->id)}}" class="btn btn-danger btn-sm">Delete</a> 
					</td>
				</tr>
			@endcan
		@empty
			<tr>
				<td colspan="5"><strong>Nothing to show</strong></td>
			</tr>
		@endforelse		
		</table>

		{{$users->links()}}
	</div>
@endsection
