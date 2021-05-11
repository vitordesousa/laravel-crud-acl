@extends('layouts.app')

@section('content')
	<div class="container">
		@forelse ($items as $item)
			<h1>{{$item->title}}</h1>
			<p>{{$item->description}}</p>
		@empty
			<p class="alert alert-info">Nothing to show</p>
		@endforelse		
	</div>
@endsection