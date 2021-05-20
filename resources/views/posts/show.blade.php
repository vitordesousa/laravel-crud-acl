@extends('layouts.app')

@section('content')
	@can('posts_show')
		<div class="container">
			<h1>{{$post->title}}</h1>
			<p>{{$post->description}}</p>
			<p><strong>Autor: </strong> {{$post->user->name}}</p>
		</div>
	@else
		@include('_components.permission_denied')
	@endcan
@endsection