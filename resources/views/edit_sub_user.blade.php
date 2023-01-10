@extends('dashboard')

@section('content')

<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/sub_user">Employee</a></li>
    	<li class="breadcrumb-item active">Edit Employee</li>
  	</ol>
</nav>

<div class="row mt-4">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Edit Employee</div>
			<div class="card-body">
				<form method="POST" action="{{ route('sub_user.edit_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>User ID</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $data->name }}" />
		        		@if($errors->has('name'))
		        		<span class="text-danger">{{ $errors->first('name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>User Email</b></label>
		        		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}">
		        		@if($errors->has('email'))
		        			<span class="text-danger">{{ $errors->first('email') }}</span>
		        		@endif
		        	</div>
					<div class="form-group mb-3">
		        	<label><b>Role</b></label>
		        		
						<select class="form-control"  name="type" aria-label="Default select example" >
						           <option value="User">User</option>
								<option value="Receptionist">Receptionist</option>
								<option value="Admin">Admin</option>
						</select>
					</div>
					
					<div class="form-group mb-3">
					<label><b>Status</b></label>
		        	
						<select class="form-control"  name="status" aria-label="Default select example" >
								<option value="Active">Active</option>
								<option value="De-Active">De-Active</option>
						</select>
					</div>

		        	<div class="form-group mb-3">
		        		<label><b>Password</b></label>
		        		<input type="password" name="password" class="form-control" placeholder="Password">
		        		@if($errors->has('password'))
		        			<span class="text-danger">{{ $errors->first('password') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<input type="hidden" name="hidden_id" value="{{ $data->id }}" />
		        		<input type="submit" class="btn btn-primary" value="Save" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection