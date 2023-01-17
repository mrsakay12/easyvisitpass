@extends('dashboard')
@section('content')
<h2 class="mt-3">Company Profile</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Profile</li>
  	</ol>
</nav>
<div class="row mt-4">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>

	@endif
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Edit Company Profile</div>
			<div class="card-body">
				<form method="post" action="{{ route('profile.company_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>Company Name</b></label>
		        		<input type="text" name="comp_name" class="form-control" placeholder="company name" value="{{ $data->comp_name }}" />
		        		@if($errors->has('comp_name'))
		        		<span class="text-danger">{{ $errors->first('comp_name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>Company Address</b></label>
		        		<input type="text" name="comp_add" class="form-control" placeholder="company address" value="{{ $data->comp_add }}" />
		        		@if($errors->has('comp_add'))
		        		<span class="text-danger">{{ $errors->has('comp_add') }}</span>
		        		@endif
		        	</div>
		        	
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Submit" />
		        	</div>
				</form>
			</div>
		</div>
	</div>


	

@endsection