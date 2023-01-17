@extends('frontend\frontbar')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col md-6">
            <div class="copy">
              <div class="text-label-h4">
                <h4>Pre Registered Visitor Details</h4>
              </div>
            </div>
            <form class="form-control" type="get" action="{{ url('/search') }}">
            <div class="form-group">
              <label for="email" class="control-label heading mb-1"
                >Visitor's Email Address<span class="text-danger"
                  >*</span
                ></label>
                @if($errors->has('query'))
		        			<span class="text-danger">{{ $errors->first('query') }}</span>
		        		@endif
              <input class="form-control input mb-4" id="email" placeholder="Search email address.." name="query" type="search" />
            </div>
            <div class="cta">
            <a href="\evpass-cdo" class="btn btn-cancel-red shadow-none">Cancel</a>
            <input class="btn btn-primary shadow-none float-lg-end"  type="submit"  value="Continue" />
            </div>
          </div>
          <div class="col-md-6">
            <img src="img/hero-section.png" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </section>
    @endsection