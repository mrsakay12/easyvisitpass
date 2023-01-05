@extends('dashboard')
@section('content')
<h2 class="mt-3">Profile</h2>
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
			<div class="card-header">Edit User</div>
			<div class="card-body">
				<form method="post" action="{{ route('profile.edit_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>User Name</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="name" value="{{ $data->name }}" />
		        		@if($errors->has('name'))
		        		<span class="text-danger">{{ $errors->first('name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>User Email</b></label>
		        		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}" />
		        		@if($errors->has('email'))
		        		<span class="text-danger">{{ $errors->has('email') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>Change Password</b></label>
		        		<input type="password" name="password" class="form-control" placeholder="Change Password" />
		        	</div>
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Submit" />
		        	</div>
				</form>
			</div>
		</div>
	</div>


	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Edit Profile</div>
			<div class="card-body">
				<form method="post" action="{{ route('employee.add_validation') }}">
					@csrf
					<div class="col-md-8" >
					<div class="form-group mb-3 ">
		        		<label><b>First Name</b></label>
		        		<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $data->first_name }}" />
		        	</div>
					<div class="form-group mb-3">
		        		<label><b>Last Name</b></label>
		        		<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $data->last_name }}" />
		        	</div>

					<div class="form-group mb-3">
		        		<label><b>Nickname</b></label>
		        		<input type="text" name="nickname" class="form-control" placeholder="nickname" value="{{ $data->nickname }}" />
		        	</div>

					<div class="form-group mb-3">
		        		<label><b>Gender</b></label>
		        		
						<select class="form-control"  name="gender" aria-label="Default select example" value="{{ $data->gender}}" >
								<option >-- Select Gender --</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
						</select>
		        	</div>
					<div class="form-group mb-3">
		        		<label><b>Phone</b></label>
		        		<input type="text" name="phone" class="form-control" placeholder="Contact Number" value="{{ $data->phone }}" />
		        	</div>

					<div class="form-group mb-3">
		        		<label><b>About</b></label>
		        		<input type="text" name="about" class="form-control" placeholder="About Me" value="{{ $data->about }}" />
		        	</div>
					
					<div class="form-group mb-3">
		        		<label><b>Department</b></label>
		        		<input type="text" name="department_id" class="form-control" placeholder="department_id" value="{{ $data->department_id }}" />
						
		        	</div>
					<div class="form-group mb-3">
		        		<label><b>Designation</b></label>
		        		<input type="text" name="designation_id" class="form-control" placeholder="designation_id" value="{{ $data->designation_id }}" />
						
		        	</div>
				    
					</div>
		        	
		        	
		        	<div class="form-group mb-3">
			
		        		<input type="submit" class="btn btn-primary" value="Submit" />
		        	</div>
				</form>
			</div>
		</div>
	</div>

</div>
@endsection