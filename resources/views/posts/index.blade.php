@extends('layouts.app')

@section('content')
	@can('posts_index')
		<div class="container">

			@include('_components.alerts')

			<div class="row">
				<div class="col-lg-7 p-3">Posts</div>
				<div class="col-lg-5 p-3"><a href="{{route('posts.create')}}" class="btn btn-success btn-sm float-right">Add</a> </div>
			</div>
			<table class="table table-bordered table-hover">
				<tr>
					<th>ID</th>
					<th>Títle</th>
					<th>Author</th>
					<th>Created At</th>
					<th>Actions</th>
				</tr>
			@forelse ($posts as $post)
				@can('view_post', $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->user->name}}</td>
						<td>{{$post->created_at}}</td>
						<td>
							<a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm">Show</a> 
							<a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm">Edit</a> 
							<a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{$post->id}}').submit();">Delete</a>
							<form id="delete-form-{{$post->id}}" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-none">
								@csrf
								@method('DELETE')
							</form>
						</td>
					</tr>
				@endcan
			@empty
				<tr>
					<td colspan="5"><strong>Nothing to show</strong></td>
				</tr>
			@endforelse		
			</table>

			{{$posts->links()}}
		</div>
	
	@else
		@include('_components.permission_denied')
	@endcan
@endsection
