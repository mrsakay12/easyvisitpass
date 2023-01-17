@extends('dashboard')
@section('content')
<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/sub_user">Employee</a></li>
    	<li class="breadcrumb-item active">Add New Employee</li>
		
  	</ol>
</nav>
<div class="row mt-4">

	<div class="col-md-4">
		<div class="card">
			<div class="card-header"> User Detail</div>
			<div class="card-body">
				
					@csrf
					<div class="form-group mb-3">
		        		<label><b>Full Name</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" disabled/>
		  
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b> Email Address</b></label>
		        		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled/>
		        	
		        	</div>
		        	
		        	<div class="form-group mb-3">
                    <div class="form-group mb-3">
		        		<label><b>Role</b></label>
                        <input type="text" name="email" class="form-control" placeholder="type" value="{{ $user->type }}" disabled/>
					
					
		        	</div>
					<input type="hidden" name="status" class="form-control" placeholder="status" value="Active" >
					
					<input type="hidden" name="profile" class="form-control" placeholder="profile" value="New">

		        	<div class="form-group mb-3">
		        		<label><b>Password</b></label>
		        		<input type="password" name="password" class="form-control" placeholder="Password">
		        	
		        	</div>
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Add" disabled/>
		        	</div>
		        	</div>
				</form>
			</div>
		</div>
	</div>


	



	<div class="col-md-8">
    <div class="card">
        <div class="card-header">Additional Details</div>
        <div class="card-body">
		<form method="POST" action="{{ route('employee.add_validation') }}">
                @csrf
                <div class="form-group mb-3 row">
                    <div class="col-md-6">
                        <label><b>First Name</b></label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name"  />
                    </div>
                    <div class="col-md-6">
                        <label><b>Last Name</b></label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                
                    <div class="col-md-6">
					<label><b>Gender</b></label>
		        		
						<select class="form-control"  name="gender" aria-label="Default select example"  >
							
								<option value="Male">Male</option>
								<option value="Female">Female</option>
						</select>
                    </div>
                </div>


				

                <div class="form-group mb-3 row">
				<div class="form-group mb-3">
		        		<label><b>Department</b></label>
					<select id='department_id' name='department_id' class="form-control" >
								<option value='0'>-- Select department --</option>
								<!-- Read Departments -->
								@foreach($departments['data'] as $department)
									<option value='{{ $department->id }}'>{{ $department->department_name }}</option>
								@endforeach
							</select>
					</div>
					<div class="form-group mb-3">
		        		<label><b>Designation</b></label>
						<select id='designation_id' name='designation_id' class="form-control" >
                    <option value='0'>-- Select designation --</option>
								<!-- Read Departments -->
								@foreach($designations['data'] as $designations)
									<option  value='{{ $designations->id }}' >{{ $designations->designation_name }}</option>
								@endforeach

							</div>
                </div>


				<div class="form-group mb-3">
		        	
		        	</div>
		        	<div class="form-group mb-3">
		        		
		        	</div>

                <div class="form-group mb-3">
				<input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div
				</div>
				

				

 
@endsection