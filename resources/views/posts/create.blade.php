@extends('layouts.app')

@section('content')
	@can('posts_create')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Create post</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@if ($errors->any())
					<div class="alert alert-danger mb-3">
						<ul class="m-0">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form action="{{route('posts.store')}}" method="POST">
					@method('POST')
					@csrf

					<div class="col-lg-12">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="" required>
							<div class="invalid-tooltip">
								Please provide a valid title.
							</div>
						</div>
					</div>
					
					<div class="col-lg-12">
						<div class="form-group">
							<label for="label">Description</label>
							<textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" required></textarea>
							<div class="invalid-tooltip">
								Please provide a valid description.
							</div>
						</div>
					</div>
					
					<hr>
					<div class="col-lg-12">
						<button class="btn btn-primary btn-block" type="submit">Submit form</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@else
		@include('_components.permission_denied')
	@endcan
@endsection
