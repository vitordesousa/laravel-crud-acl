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

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-selected="true">Roles</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">Permissions</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="roles" role="tabpanel" aria-labelledby="roles-tab">
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
						</div>
						<div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
							<div class="row">
								@forelse ($permissions->sortBy('name') as $roles)
									<div class="col-lg-6 col-sm-12">
										<h5 class="pt-4">{{$roles->first()->route}}</h5>
										@forelse ($roles as $permission)
											<div class="form-check">
												<input type="checkbox" class="form-check-input @error('permission') is-invalid @enderror" {{$role->rolepermission->contains('permission_id', $permission->id) ? 'checked="checked"' : ''}} name="permission[]" id="permission-{{$permission->id}}" value="{{$permission->id}}">
												<label class="form-check-label" for="permission-{{$permission->id}}">{{$permission->label}}</label>
												<div class="invalid-tooltip">
													Please insert permission to role
												</div>
											</div>
										@empty
											<p class="alert alert-danger">This role don't have permissions</p>
										@endforelse
									</div>
								@empty
									<p class="alert alert-danger">Don't have roles to show here/p>
								@endforelse
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
