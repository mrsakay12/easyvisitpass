@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/image.css') }}" !important />
    <!-- HERO SECTION -->
    <h2 class="mt-3">Visitor Management</h2>

<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/visitor">Visitor Management</a></li>
    	<li class="breadcrumb-item active"> Check Out Information </li>
  	</ol>
</nav>


   

                    <div class="col-md-6">
                        <div class="img-cards" id="printidcard">
                            <div class="id-card-holder">
                                <div class="id-card custom-id-card">
                                    <div class="id-card-photo">
                                        
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
                                    <h2 class="email">Expected Date and Time : {{date('d-m-Y h:i A', strtotime($data->visit_time ))}}</h2>
                                    <h2 class="email">Check In: {{date('d-m-Y h:i A', strtotime($data->visitor_enter_time ))}}</h2>
                                    <h2 class="email">Check Out: {{date('d-m-Y h:i A', strtotime($data->visitor_out_time ))}}</h2>

                                    <input type="hidden" name="hidden_id" value="{{ $data->id }}" />
                            
                                    <a  href="/visitor" class="btn btn-primary float-left text-white cancel px-5 py-2">
                        BACK
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