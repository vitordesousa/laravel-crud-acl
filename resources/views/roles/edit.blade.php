@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Edit role: {{$role->name}}</h1>
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
				<form action="{{route('roles.update', $role->id)}}" method="POST">
					@method('PUT')
					@csrf

					<div class="col-lg-12">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$role->name}}" required>
							<div class="invalid-tooltip">
								Please provide a valid name.
							</div>
						</div>
					</div>
					
					<div class="col-lg-12">
						<div class="form-group">
							<label for="label">Label</label>
							<input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label" value="{{$role->label}}" required>
							<div class="invalid-tooltip">
								Please provide a valid label.
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
@endsection
