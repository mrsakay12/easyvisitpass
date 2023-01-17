@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/image.css') }}" !important />
    <!-- HERO SECTION -->
    <h2 class="mt-3">Visitor Management</h2>

<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/visitor">Visitor Management</a></li>
    	<li class="breadcrumb-item active"> Visitor's Validation </li>
  	</ol>
</nav>


   <div class="main" data-mobile-height="">
        <!-- Default Page -->
<section id="pm-banner-1" class="custom-css-step">
    <div class="container1 camera-container">
        <div class="card border-0 bg-body" style="margin-top:20px;">
            <div class="card-header border-0 bg-body" id="Details" align="center">
                            </div>
            <form action="" method="POST" enctype="">
                    <div class="card-body custom-camera">
                <div class="row">
                                        <div class="col-md-6 left-div">
                        <div class="card border-0 ">
                            <h4 style="color: #111570;font-weight: bold" class="text-center">Take Visitor Photo</h4>

                            <div class="card-body">
                                <div class="video-options mb-4">
                                    <select name="" id="" class="custom-select">
                                        <option value="">Select camera</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <video width="100%" height="200px" id="videos" autoplay></video>
                                        <canvas class="d-none" style="border:5px solid #d3d3d3; display: none"></canvas>
                                        <input type="hidden" id="image" name="photo" value="">
                                    </div>
                                    <div class="col-3">
                                        <button type="button" id="screenshot" title="ScreenShot" class='retakephoto'>
                                            <img class="img" src="{{ asset('Images/capture.jpg')}}" style="height: 80px">
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <span class="text-center"></span>
                    </div>

                    <div class="col-md-6">
                        <div class="img-cards" id="printidcard">
                            <div class="id-card-holder">
                                <div class="id-card custom-id-card">
                                    <div class="id-card-photo">
                                        <img id="card-img" style="width: 300px;height: 200px;" class="screenshot-image" alt="" name="visitor_image">
                                    </div>
                                    <hr class="bar">
                                    <h2 class="name mt-4"> Visitor Pass ID : {{ $data->visitor_code }}</h2>
                                    <h2 class="name mt-4"> Full Name : {{ $data->visitor_lastname }}, {{ $data->visitor_firstname }}</h2>
                                    <h2 class="info"> Phone : {{ $data->visitor_mobile_no }}</h2>
                                     <h2 class="info">Email : {{ $data->visitor_email }}</h2>
                                     <h2 class="info"> Presented ID No : {{ $data->visitor_id }}</h2>
                                     <h2 class="info"> Gender: {{ $data->visitor_gender }}</h2>
                                     <h2 class="info"> Address: {{ $data->visitor_address }}</h2>
                           
                                    
                                    <h2 class="visit mt-4">VISITED TO :</h2>
                                    <h2 class="email">Host: {{ $data->meetperson->name }}</h2>
                                    <h2 class="email">Purpose: {{ $data->visitor_purpose }}</h2>

                                    <input type="hidden" name="hidden_id" value="{{ $data->id }}" />
                            
                                    <a  href="/visitor/arrive/{{ $data->id }}" class="btn btn-primary float-left text-white cancel px-5 py-2">
                        Approved
                        </a>
                        <a href="/visitor/rejected/{{ $data->id }}" class="btn btn-danger float-left text-white cancel px-5 py-2">
                        Reject
                        </a>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
            </div>
            
                 


                </div>
            </div>
            </form>
        </div>
      
   
</section>


     <!-- Scripts -->
<!-- JS library -->
<script src="{{ asset('js/pic.js') }}"></script>





<!-- Scripts -->
<script src="{{ asset('js/photo.js') }}"></script>
    <!-- Main Content -->
    @endsection