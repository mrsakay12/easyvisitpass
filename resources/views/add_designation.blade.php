@extends('dashboard')

@section('content')

<h2 class="mt-3">Designation Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/designation">Designation Management</a></li>
    	<li class="breadcrumb-item active">Add New Designation</li>
  	</ol>
</nav>
<div class="row mt-4">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Add New Designation</div>
			<div class="card-body">
				<form method="POST" action="{{ route('designation.add_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>Designation Name</b></label>
		        		<input type="text" name="designation_name" class="form-control" />
		        		@if($errors->has('designation_name'))
		        			<span class="text-danger">{{ $errors->first('designation_name') }}</span>
		        		@endif
		        	</div>
					
					<div class="form-group mb-3">
		        		<label><b>Department</b></label>
						
				<select id='department_id' name='department_id' class="form-control" >
                 <option >-- Select department --</option>
                      @foreach($departments['data'] as $department)
                 <option value='{{ $department->id }}'>{{ $department->department_name }}</option>
                      @endforeach
					</select>
					@if($errors->has('department_id'))
		        		<span class="text-danger">{{ $errors->has('department_id') }}</span>
		        		@endif

		        	</div>

		        	<div class="form-group mb-3">
		        	
		        		<div class="row">
		        			<div class="col col-md-10">
						<select class="form-control"  name="status" aria-label="Default select example" hidden>
								<option value="Active">Active</option>
								<option value="De-Active">De-Active</option>
						</select></div>
					</div>
						<div id="append_person"></div>
		        	</div>
		        		
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Add" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>

$(document).ready(function(){
	var count_person = 0;

	$(document).on('click', '#add_person', function(){

		count_person++;

		var html = `
		<div class="row mt-2" id="person_`+count_person+`">
			<div class="col-md-10">
				<input type="text" name="contact_person[]" class="form-control department_contact_person" />
			</div>
			<div class="col-md-2">
				<button type="button" name="remove_person" class="btn btn-danger btn-sm remove_person" data-id="`+count_person+`">-</button>
			</div>
		</div>
		`;

		$('#append_person').append(html);

	});

	$(document).on('click', '.remove_person', function(){

		var button_id = $(this).data('id');

		$('#person_'+button_id).remove();

	});
});

</script>
@endsection