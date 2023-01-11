@extends('frontend\frontbar')

@section('content')

    <!-- HERO SECTION -->

    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col md-6">
          <div class="copy">
              <div class="text-label">Security at best</div>
            </div>
            
            <div class="text-hero-bold">Easy Visit - Pass Monitoring System</div>
            <div class="text-hero-regular">
              Welcome, please tap on button to check in
            </div>
           

            <div class="cta">
              <a href="checkin" class="btn btn-primary shadow-none">Check-in</a>
              
            </div>
          </div>
          <div class="col-md-6">
            <img src="{{ asset('/Images/hero-section.png') }}" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </section>

    @endsection