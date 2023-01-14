@extends('dashboard')
@section('content')
<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/sub_user">Employee</a></li>
    	<li class="breadcrumb-item active">Add New Employee</li>
		<li class="breadcrumb-item active">Add Employee Details</li>
  	</ol>
</nav>
<div class="row mt-4">

	<div class="col-md-4">
		<div class="card">
			<div class="card-header"> User Detail</div>
			<div class="card-body">
				
					@csrf
					<div class="form-group mb-3">
		        		<label><b>User Name</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" disabled/>
		        		@if($errors->has('name'))
		        		<span class="text-danger">{{ $errors->first('name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>User Email</b></label>
		        		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled/>
		        		@if($errors->has('email'))
		        		<span class="text-danger">{{ $errors->has('email') }}</span>
		        		@endif
		        	</div>
		        	
		        	<div class="form-group mb-3">
		        		
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
								<option >-- Select Gender --</option>
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
							</select>
							</div>
                </div>

				


                <div class="form-group mb-3">
				<input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div
				</div>
				
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type='text/javascript'>
   $(document).ready(function(){

      // Department Change
      $('#department_id').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#designation_id').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: 'getDept/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
                len = response['data'].length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){

                   var id = response['data'][i].id;
                   var name = response['data'][i].name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#designation_id").append(option); 
                }
             }

           }
         });
      });
   });
   </script>
</body>
</html>

 
@endsection