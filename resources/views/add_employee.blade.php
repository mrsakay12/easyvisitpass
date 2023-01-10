@extends('dashboard')

@section('content')

<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/sub_user">Employee</a></li>
    	<li class="breadcrumb-item active">Add Employee Profile</li>
  	</ol>
</nav>

<div class="row mt-4">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Add  Employee Profile</div>
			<div class="card-body">
				<form method="POST" action="{{ route('employee.add_validation') }}">
					@csrf
					
					<div class="form-group mb-3 ">
		        		<label><b>First Name</b></label>
						
		        		<input type="text" name="first_name" class="form-control" placeholder="First Name"  />
				
		        	</div>
					<div class="form-group mb-3">
		        		<label><b>Last Name</b></label>
		        		<input type="text" name="last_name" class="form-control" placeholder="Last Name" />
		        	</div>

					

					<div class="form-group mb-3">
		        		<label><b>Gender</b></label>
		        		
						<select class="form-control"  name="gender" aria-label="Default select example" >
								<option >-- Select Gender --</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
						</select>
		        	</div>
					
					
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
					
		        	<div class="form-group mb-3">
		        		<input type="hidden" name="user_id" value="{{ $user->id }}" />
		        		<input type="submit" class="btn btn-primary" value="Save" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
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
                   var name = response['data'][i].designation_name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#designation_id").append(option); 
                }
             }

           }
         });
      });
   });
   </script>
@endsection