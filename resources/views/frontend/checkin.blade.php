@extends('frontend\frontbar')

@section('content')

    <!-- HERO SECTION -->
 
    <section class="hero">
    <form method="POST" action="{{ route('checkin_validation') }}">
    @csrf
      <div class="container">
        <div class="row">
          <div class="col md-6">
            <div class="copy">
              <div class="text-label-h4">
                <h4>Visitor Details</h4>
              </div>
            </div>
            <input type="hidden" name="visitor_code" class="form-control" placeholder="" value="EVPASS0001" />
						<input type="hidden" name="visitor_status" class="form-control" placeholder="" value="Pending" />
            <input type="hidden" name="visitor_enter_by" class="form-control" placeholder="" value="0" />

              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label">First Name<span class="text-danger">*</span></label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    aria-label="First name"
                    name="visitor_firstname"
                  />
                  @if($errors->has('visitor_firstname'))
		        			<span class="text-danger">{{ $errors->first('visitor_firstname') }}</span>
		        		@endif
                </div>
             
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Last Name<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    aria-label="Last name"
                    name="visitor_lastname"
                  />
                  @if($errors->has('visitor_lastname'))
		        			<span class="text-danger">{{ $errors->first('visitor_lastname') }}</span>
		        		@endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Select Employee<span class="text-danger">*</span></label>

                  <select
                    class="form-select"
                    id='visitor_meet_person_name' name='visitor_meet_person_name'
                    aria-label="Default select example"
                  >
                    <option selected>Select Employee</option>
                    @foreach($user['data'] as $user)
                 <option value='{{ $user->id }}'>{{ $user->name }}</option>
                      @endforeach
                  </select>
                  @if($errors->has('visitor_meet_person_name'))
		        			<span class="text-danger">{{ $errors->first('visitor_meet_person_name') }}</span>
		        		@endif
                </div>
                <div class="col">
                  <label class="label-css" for=""
                    >Phone <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    name="visitor_mobile_no"
                    id="visitor_mobile_no"
                    class="form-control input-css"
                
                  />
                  @if($errors->has('visitor_mobile_no'))
		        			<span class="text-danger">{{ $errors->first('visitor_mobile_no') }}</span>
		        		@endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Email</label
                  >
                  <input type="email" class="form-control" id="inputEmail4"  name="visitor_email"      placeholder="Email Address"/>
                  @if($errors->has('visitor_email'))
		        			<span class="text-danger">{{ $errors->first('visitor_email') }}</span>
		        		@endif
                </div>
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Gender<span class="text-danger">*</span></label
                  >
                  <select
                    class="form-select"
                    name="visitor_gender"
                    aria-label="Default select example"
                  >
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                  </select>
                  @if($errors->has('visitor_gender'))
		        			<span class="text-danger">{{ $errors->first('visitor_gender') }}</span>
		        		@endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                <label for="inputEmail4" class="form-label" >Visit Date & Time.<span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control"  id="visit_time" name="visit_time">
                @if($errors->has('visit_time'))
		        			<span class="text-danger">{{ $errors->first('visit_time') }}</span>
		        		@endif
                </div>
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Presented ID No.<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Presented ID No."
                    aria-label="Last name"
                    name="visitor_id" 
                  />
                  @if($errors->has('visitor_id'))
		        			<span class="text-danger">{{ $errors->first('visitor_id') }}</span>
		        		@endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Address</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                      name="visitor_address"
                    ></textarea>
                    @if($errors->has('visitor_address'))
		        			<span class="text-danger">{{ $errors->first('visitor_address') }}</span>
		        		@endif
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      > Purpose<span class="text-danger">*</span></label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                  
                      name="visitor_purpose"
                    ></textarea>
                    @if($errors->has('visitor_purpose'))
		        			<span class="text-danger">{{ $errors->first('visitor_purpose') }}</span>
		        		@endif
                  </div>
                </div>
              </div>
              <div class="cta">
                <a href="\home" class="btn btn-cancel-red shadow-none">Cancel</a>
               <input class="btn btn-primary shadow-none float-lg-end"  type="submit"  value="Continue" />
		        	
		        
              </div>
           
          </div>
          <div class="col-md-6">
            <img src="{{ asset('/Images/chekin.png') }}"  class="w-100" alt="" />
          </div>
        </div>
      </div>

      </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @endsection