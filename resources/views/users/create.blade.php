@extends('layouts.app')

@section('content')
	@can('users_create')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Create user</h1>
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
					<form action="{{route('users.store')}}" method="POST">
						@method('POST')
						@csrf

						<div class="col-lg-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="" required>
								<div class="invalid-tooltip">
									Please provide a valid name.
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="" required>
								<div class="invalid-tooltip">
									Please provide a valid email.
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
								<div class="invalid-tooltip">
									Please provide a valid password.
								</div>
							</div>
						</div>
						<hr>
						<div class="col-lg-12">
							<h4>Role(s):</h4>
							@forelse ($roles as $role)
								<div class="form-check">
									<input type="checkbox" class="form-check-input @error('role') is-invalid @enderror" name="role[]" id="role-{{$role->id}}" value="{{$role->id}}">
									<label class="form-check-label" for="role-{{$role->id}}">{{$role->name}} <small class="text-black-50 ml-4">({{$role->label}})</small></label>
									
									<div class="invalid-tooltip">
										Please insert role to user
									</div>
								</div>
							@empty
								<p class="alert alert-danger">Please create roles to show here</p>
							@endforelse
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
