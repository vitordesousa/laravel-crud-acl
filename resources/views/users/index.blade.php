@extends('layouts.app')

@section('content')
	@can('users_index')
		<div class="container">			
			@include('_components.alerts')

			<div class="row">
				<div class="col-lg-7 p-3">Posts</div>
				<div class="col-lg-5 p-3"><a href="{{route('users.create')}}" class="btn btn-success btn-sm float-right">Add</a> </div>
			</div>
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
						<a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a> 
						<a href="{{route('users.destroy', $user->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">Delete</a>
						<form id="delete-form-{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
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

			{{$users->links()}}
		</div>
	@else
		@include('_components.permission_denied')
	@endcan
@endsection
