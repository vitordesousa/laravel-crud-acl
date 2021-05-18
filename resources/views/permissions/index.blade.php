@extends('layouts.app')

@section('content')
	<div class="container">

		@include('_components.alerts')

		<div class="row">
			<div class="col-lg-7 p-3">Permissions</div>
			<div class="col-lg-5 p-3"><a href="{{route('permissions.create')}}" class="btn btn-success btn-sm float-right">Add</a> </div>
		</div>
		
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
								-
							@endforelse
						</td>
						<td>{{$permission->created_at}}</td>
						<td>
							<a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-warning btn-sm">Edit</a> 
							<a href="{{route('permissions.destroy', $permission->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{$permission->id}}').submit();">Delete</a>
							<form id="delete-form-{{$permission->id}}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-none">
								@csrf
								@method('DELETE')
							</form>
						</td>
					</tr>
				@endcan
			@empty
				<tr>
					<td colspan="6"><strong>Nothing to show</strong></td>
				</tr>
			@endforelse
		</table>

		{{$permissions->links()}}
	</div>
@endsection
