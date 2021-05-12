@extends('layouts.app')

@section('content')
	<div class="container">
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
						<a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger btn-sm">Delete</a> 
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
@endsection
