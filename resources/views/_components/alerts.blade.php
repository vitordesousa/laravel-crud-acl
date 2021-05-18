<div class="row">
	<div class="col-xl-12">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		@if (session('danger'))
			<div class="alert alert-danger">
				{{ session('danger') }}
			</div>
		@endif
	</div>
</div>