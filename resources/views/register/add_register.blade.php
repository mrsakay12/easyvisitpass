@extends('dashboard')

@section('content')

<h2 class="mt-3">Pre - Register Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/register">Pre - Register Management</a></li>
    	<li class="breadcrumb-item active">Add Pre - Register Visitor </li>
  	</ol>
</nav>




<div class="row mt-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Add Pre - Register Visitor</div>
			<div class="card-body">
				<form method="POST" action="{{ route('register.add_validation') }}">
					@csrf



					<!-- first name and last name start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>First Name</b></label>
							<input type="text" name="register_firstname" class="form-control" placeholder="First Name" />
							@if($errors->has('register_firstname'))
								<span class="text-danger">{{ $errors->first('register_firstname') }}</span>
							@endif
						</div>
						<div class="col-md-6">
							<label><b>Last Name</b></label>
							<input type="text" name="register_lastname" class="form-control" placeholder="Last Name" />
							@if($errors->has('register_lastname'))
								<span class="text-danger">{{ $errors->first('register_lastname') }}</span>
							@endif
						</div>
					</div>

					<!-- first name and last name end -->
		  





<!-- Email address and Phone start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Email Address</b></label>
							<input type="email" name="register_email" class="form-control" placeholder="Email Address" />
							@if($errors->has('register_email'))
								<span class="text-danger">{{ $errors->first('register_email') }}</span>
							@endif
						</div>
						<div class="col-md-6">
							<label><b>Phone</b></label>
							<input type="text" name="register_mobile_no" class="form-control" placeholder="Phone Number" />
							@if($errors->has('register_mobile_no'))
								<span class="text-danger">{{ $errors->first('register_mobile_no') }}</span>
							@endif
						</div>
					</div>
<!-- Email address and Phone start -->

<!-- Gender and Select Employee Start -->

					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Gender</b></label>
								<select class="form-control" name="register_gender">
								
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								@if($errors->has('register_gender'))
								<span class="text-danger">{{ $errors->first('register_gender') }}</span>
								@endif
						</div>
						@if(Auth::user()->type != 'User')
						<div class="col-md-6">
					


					<label><b>Select Employee</b></label>
							<select id='register_meet_person_name' name='register_meet_person_name' class="form-control" >
                 <option >-- Select employee --</option>
                      @foreach($user['data'] as $user)
                 <option value='{{ $user->id }}'>{{ $user->name }}</option>
                      @endforeach
					</select>


					@endif
					
					@if(Auth::user()->type == 'User')
						<div class="col-md-6">
							<input type="hidden" class="form-control"  id="register_meet_person_name" name="register_meet_person_name" value="{{Auth::user()->id}}">
							@endif
							@if($errors->has('register_meet_person_name'))
							<span class="text-danger">{{ $errors->first('register_meet_person_name') }}</span>
							@endif
						</div>
					</div>
					
					<!-- Gender and Select Employee End -->


<!-- Company Name and Presented Id No. Start -->
					<div class="form-group mb-3 row">
						<div class="col-md-6">
							<label><b>Visit Date & Time.</b></label>
							<input type="datetime-local" class="form-control"  id="register_visitdate" name="register_visitdate">

							@if($errors->has('register_visitdate'))
								<span class="text-danger">{{ $errors->first('register_visitdate') }}</span>
							@endif
						</div>
						<div class="col-md-6">
		<label><b>Complete Address</b></label>
		<textarea  name="register_address" class="form-control" placeholder="Complete Address"></textarea>
		@if($errors->has('register_address'))
			<span class="text-danger">{{ $errors->first('register_address') }}</span>
		@endif
					</div>
					<!-- Company Name and Presented Id No. End -->




				<!-- Complete Addresss and Purpose Start	 -->
					
</div>
<!-- Complete Addresss and Purpose End -->

		        	
		        	<div class="form-group mb-3">
					<input type="hidden" name="register_enter_by" class="form-control" placeholder=""  />
		        		<input type="submit" class="btn btn-primary" value="Add" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection