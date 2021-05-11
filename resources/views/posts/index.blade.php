@extends('layouts.app')

@section('content')
	<div class="container">
		@forelse ($posts as $post)
			@can('edit-post', $post)
				<h1>{{$post->title}}</h1>
				<p>{{$post->description}}</p>
				<p><strong>Autor: </strong> {{$post->user->name}}</p>
				<hr>
			@endcan
		@empty
			<p class="alert alert-info">Nothing to show</p>
		@endforelse		
	</div>
@endsection
