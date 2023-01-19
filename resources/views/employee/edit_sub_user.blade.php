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
						           <option value="User" {{$data->type == "User" ? "selected" : ""}} >User</option>
								<option value="Receptionist" {{$data->type == "Receptionist" ? "selected" : ""}} >Receptionist</option>
								<option value="Admin" {{$data->type == "Admin" ? "selected" : ""}} >Admin</option>
						</select>
					</div>
					
					<div class="form-group mb-3">
					<label><b>Status</b></label>
		        	
						<select class="form-control"  name="status" aria-label="Default select example" >
								<option value="Active"  {{$data->status == "Active" ? "selected" : ""}} >Active</option>
								<option value="De-Active"  {{$data->status == "De-Active" ? "selected" : ""}} >De-Active</option>
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


<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Additional Details</div>
        <div class="card-body">
		<form method="post" action="{{ route('employee.edit_empvalidation') }}">
                @csrf
                <div class="form-group mb-3 row">
                    <div class="col-md-6">
                        <label><b>First Name</b></label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $data2->first_name }}" />
                    </div>
                    <div class="col-md-6">
                        <label><b>Last Name</b></label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $data2->last_name }}" />
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6">
                        <label><b>Nickname</b></label>
                        <input type="text" name="nickname" class="form-control" placeholder="nickname" value="{{ $data2->nickname }}" />
                    </div>
                    <div class="col-md-6">
					<label><b>Gender</b></label>
		        		
						<select class="form-control"  name="gender" aria-label="Default select example" optionvalue="{{ $data2->gender}}" >
						
								<option value="Male" {{$data2->gender == "Male" ? "selected" : ""}}>Male</option>
								<option value="Female" {{$data2->gender == "Female" ? "selected" : ""}}>Female</option>
						</select>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6">
                        <label><b>About Me</b></label>
                        <input type="text" name="about" class="form-control" placeholder="About Me" value="{{ $data2->about }}" />
                    </div>
                    <div class="col-md-6">
                        <label><b>Phone</b></label>
                        <input type="text" name="phone" class="form-control" placeholder="phone" value="{{ $data2->phone }}" />
                    </div>
                </div>

				<div class="form-group mb-3 row">
				<div class="form-group mb-3">
                        <label><b>Address</b></label>
                  
						<input type="text"
                      class="form-control"
                    
                      rows="2"
                      name="address"
					  value="{{$data2->address}}" />
					</div>
                </div>

                <div class="form-group mb-3 row">
				<div class="form-group mb-3">
		        		<label><b>Department</b></label>
					<select id='department_id' name='department_id' class="form-control"  >
								<option value='0'>-- Select department --</option>
								<!-- Read Departments -->
								@foreach($departments['data'] as $department)
									<option  value='{{ $department->id }}'  {{$data2->department_id ==  $department->id ? "selected" : ""}} >{{ $department->department_name }}</option>
								@endforeach
							</select>
					</div>
					<div class="form-group mb-3">
		        		<label><b>Designation</b></label>
					<select id='designation_id' name='designation_id' class="form-control" >
                    <option value='0'>-- Select designation --</option>
								<!-- Read Departments -->
								@foreach($designations['data'] as $designations)
									<option  value='{{ $designations->id }}'  {{$data2->designation_id ==  $designations->id ? "selected" : ""}} >{{ $designations->designation_name }}</option>
								@endforeach
							</div>
                       <br>

                <div class="form-group mb-3">
				<input type="hidden" name="hidden_id" value="{{ $data2->id }}" />
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div
				</div>

				</div>
</div>

				

@endsection