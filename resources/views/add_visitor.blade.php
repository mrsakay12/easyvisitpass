@extends('dashboard')

@section('content')

<h2 class="mt-3">Visitor Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/visitor">Visitor Management</a></li>
    	<li class="breadcrumb-item active">Add New Visitor </li>
  	</ol>
</nav>




<div class="row mt-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Add New Visitor</div>
			<div class="card-body">
				<form method="POST" action="{{ route('visitor.add_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        
						<input type="hidden" name="visitor_code" class="form-control" placeholder="" value="0000" />
						<input type="hidden" name="visitor_status" class="form-control" placeholder="" value="Pending" />
		        	
		        	</div>
					<!-- <div class="form-group mb-3">
		        		<label><b>First Name</b></label>
						<input type="text" name="visitor_firstname" class="form-control" placeholder="First Name" />
		        		@if($errors->has('visitor_firstname'))
		        			<span class="text-danger">{{ $errors->first('visitor_firstname') }}</span>
		        		@endif
						</div>
		        	<div class="form-group mb-3">
		        		<label><b>Last Name</b></label>
						<input type="text" name="visitor_lastname" class="form-control" placeholder="Last Name" />
		        		@if($errors->has('visitor_lastname'))
		        			<span class="text-danger">{{ $errors->first('visitor_lastname') }}</span>
		        		@endif
		        	</div> -->




					<!-- first name and last name start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>First Name</b></label>
							<input type="text" name="visitor_firstname" class="form-control" placeholder="First Name" />
							@if($errors->has('visitor_firstname'))
								<span class="text-danger">{{ $errors->first('visitor_firstname') }}</span>
							@endif
						</div>
						<div class="col-md-6">
							<label><b>Last Name</b></label>
							<input type="text" name="visitor_lastname" class="form-control" placeholder="Last Name" />
							@if($errors->has('visitor_lastname'))
								<span class="text-danger">{{ $errors->first('visitor_lastname') }}</span>
							@endif
						</div>
					</div>

					<!-- first name and last name end -->
		  



					<!-- <div class="form-group mb-3">
		        		<label><b>Email Address</b></label>
						<input type="text" name="visitor_email" class="form-control" placeholder="Email Address" />
		        		@if($errors->has('visitor_email'))
		        			<span class="text-danger">{{ $errors->first('visitor_email') }}</span>
		        		@endif
		        	</div>
			
					<div class="form-group mb-3">
		        		<label><b>Phone</b></label>
						<input type="text" name="visitor_mobile_no" class="form-control" placeholder="Phone Number" />
		        		@if($errors->has('visitor_mobile_no'))
		        			<span class="text-danger">{{ $errors->first('visitor_mobile_no') }}</span>
		        		@endif
		        	</div> -->


<!-- Email address and Phone start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Email Address</b></label>
							<input type="text" name="visitor_email" class="form-control" placeholder="Email Address" />
							@if($errors->has('visitor_email'))
								<span class="text-danger">{{ $errors->first('visitor_email') }}</span>
							@endif
						</div>
						<div class="col-md-6">
							<label><b>Phone</b></label>
							<input type="text" name="visitor_mobile_no" class="form-control" placeholder="Phone Number" />
							@if($errors->has('visitor_mobile_no'))
								<span class="text-danger">{{ $errors->first('visitor_mobile_no') }}</span>
							@endif
						</div>
					</div>
<!-- Email address and Phone start -->

<!-- Gender and Select Employee Start -->

					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Gender</b></label>
								<select class="form-control" name="visitor_gender">
									<option>---> choose</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								@if($errors->has('visitor_gender'))
								<span class="text-danger">{{ $errors->first('visitor_gender') }}</span>
								@endif
						</div>
						<div class="col-md-6">
							<label><b>Select Employee</b></label>
							<select id='visitor_meet_person_name' name='visitor_meet_person_name' class="form-control" >
                 <option >-- Select employee --</option>
                      @foreach($user['data'] as $user)
                 <option value='{{ $user->id }}'>{{ $user->name }}</option>
                      @endforeach
					</select>
							@if($errors->has('visitor_employee'))
							<span class="text-danger">{{ $errors->first('visitor_employee') }}</span>
							@endif
						</div>
					</div>

					<!-- Gender and Select Employee End -->


<!-- Company Name and Presented Id No. Start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Company Name</b></label>
							<input type="text" name="company_name" class="form-control" placeholder="Company Name" />
							@if($errors->has('company_name'))
								<span class="text-danger">{{ $errors->first('company_name') }}</span>
							@endif
						</div>
						<div class="col-md-6">
						<label><b>Presented ID No.</b></label>
						<input type="text" name="visitor_id" class="form-control" placeholder="Presented ID No." />
		        		@if($errors->has('visitor_id'))
		        			<span class="text-danger">{{ $errors->first('visitor_id') }}</span>
		        		@endif
						</div>
					</div>
					<!-- Company Name and Presented Id No. End -->




				<!-- Complete Addresss and Purpose Start	 -->
					<div class="form-group mb-3 row">
	<div class="col-md-6">
		<label><b>Complete Address</b></label>
		<textarea  name="visitor_address" class="form-control" placeholder="Complete Address"></textarea>
		@if($errors->has('visitor_address'))
			<span class="text-danger">{{ $errors->first('visitor_address') }}</span>
		@endif
	</div>
	<div class="col-md-6">
		<label><b>Purpose</b></label>
		<textarea  name="visitor_purpose" class="form-control" placeholder="Purpose of visit"></textarea>
		@if($errors->has('visitor_purpose'))
			<span class="text-danger">{{ $errors->first('visitor_purpose') }}</span>
		@endif
	</div>
</div>
<!-- Complete Addresss and Purpose End -->

		        	
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Add" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection