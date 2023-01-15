@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashcard.css') }}" />

<h2 class="mt-3">Dashboard</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item" ><a href="/dashboard">Dashboard</a></li>
    	
  	</ol>
</nav>
<div class="row mt-4">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
    <!-- Dashboard User -->
    @if(Auth::user()->type == 'User')
	<div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                    <span class="material-symbols-outlined"> approval_delegation</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>For Approval</h4>
                        </div>
                        <div class="card-body">
						{{$visitorin}}
                        </div>
                    </div>
                </div>
            </a>
        </div>



        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-light">
                    <span class="material-symbols-outlined"> nest_doorbell_visitor</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Checked-out Visitors</h4>
                        </div>
                        <div class="card-body">
						{{$visitorout}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-body">
                    <span class="material-symbols-outlined">app_registration</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Registered Visitors</h4>
                        </div>
                        <div class="card-body">
                            {{$register}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="table-responsive">
				<table class="table table-bordered" id="visitor_table">
					<thead>
						<tr>
						    <th>Visitor ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Visited To</th>
							<th>Check-in </th>
							<th>Check-out</th>
							<th>Status</th>
							@if(Auth::user()->type != 'Receptionist')
							<th>User Action</th>
							@endif
							@if(Auth::user()->type != 'User')
							<th>Reception Action</th>
							@endif
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
        

</div>

@endif
    <!-- Dashboard User -->
       <!-- Receptionist User -->

    @if(Auth::user()->type == 'Receptionist')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <span class="material-symbols-outlined"> approval_delegation</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Checked-In Visitors</h4>
                        </div>
                        <div class="card-body">
						{{$checkin}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
     


        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
            
           <div class="card-icon bg-light">
                    <span class="material-symbols-outlined"> nest_doorbell_visitor</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Checked-out Visitors</h4>
                        </div>
                        <div class="card-body">
						{{$checkout}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
           
                <div class="card-icon bg-light">
                    <span class="material-symbols-outlined"> nest_doorbell_visitor</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Registered Visitors</h4>
                        </div>
                        <div class="card-body">
                            {{$visitor}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
    
                <div class="card-icon bg-light">
                    <span class="material-symbols-outlined"> pending</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pending Visitors</h4>
                        </div>
                        <div class="card-body">
                        {{$pending}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="table-responsive">
				<table class="table table-bordered" id="visitor_table2">
					<thead>
						<tr>
						    <th>Visitor ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Visited To</th>
							<th>Check-in </th>
							<th>Check-out</th>
							<th>Status</th>
							@if(Auth::user()->type != 'Receptionist')
							<th>User Action</th>
							@endif
							@if(Auth::user()->type != 'User')
							<th>Reception Action</th>
							@endif
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

    </div>
</div>
@endif

 <!-- Admin User -->
 @if(Auth::user()->type == 'Admin')
	<div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                    <span class="material-symbols-outlined"> badge</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Employee</h4>
                        </div>
                        <div class="card-body">
						{{$user}}
                        </div>
                    </div>
                </div>
            </a>
        </div>



        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-light">
                    <span class="material-symbols-outlined"> nest_doorbell_visitor</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Visitors</h4>
                        </div>
                        <div class="card-body">
						{{$visitor}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-body">
                    <span class="material-symbols-outlined">app_registration</span>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pre-Registered Visitors</h4>
                        </div>
                        <div class="card-body">
                          {{$preregister}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        

</div>

@endif

<script>

	
$(document).ready(function(){

	var table = $('#visitor_table').DataTable({

		processing:true,
		serverSide:true,
		ajax:"{{ route('visitor.fetch_allUser') }}",
		columns:[
			{
				data:'visitor_code',
				name: 'visitor_code'
			},
			{
				data: 'visitor_firstname',
				name: 'visitor_firstname'
			},
			{
				data:'visitor_lastname' ,
				name: 'visitor_lastname'
			},
		
			
			{
				data: 'name',
				name: 'name'
			},
			
			{
				data:'visitor_enter_time', 
				name: 'visitor_enter_time',
				
			},
			{
				data:'visitor_out_time',
				name:'visitor_out_time'
			},
			{
                
				data:'visitor_status',
				name:'visitor_status'
			},
			@if(Auth::user()->type != 'Receptionist')
			{
				data:'action',
				name:'action',
				orderable:false
			}
			,
			@endif
			@if(Auth::user()->type != 'User')
			{
				data:'arrival',
				name:'arrival',
				orderable:false
			}
			@endif
		]
	});

    

	$(document).on('click', '.delete', function(){

var id = $(this).data('id');

if(confirm("Are you sure you want to remove it?"))
{
	window.location.href = "/visitor/delete/" + id;
}

});

});

$(document).ready(function(){

var table = $('#visitor_table2').DataTable({

    processing:true,
    serverSide:true,
    ajax:"{{ route('visitor.fetch_allrecep') }}",
    columns:[
        {
            data:'visitor_code',
            name: 'visitor_code'
        },
        {
            data: 'visitor_firstname',
            name: 'visitor_firstname'
        },
        {
            data:'visitor_lastname' ,
            name: 'visitor_lastname'
        },
    
        
        {
            data: 'name',
            name: 'name'
        },
        
        {
            data:'visitor_enter_time', 
            name: 'visitor_enter_time',
            
        },
        {
            data:'visitor_out_time',
            name:'visitor_out_time'
        },
        {
            
            data:'visitor_status',
            name:'visitor_status'
        },
        @if(Auth::user()->type != 'Receptionist')
        {
            data:'action',
            name:'action',
            orderable:false
        }
        ,
        @endif
        @if(Auth::user()->type != 'User')
        {
            data:'arrival',
            name:'arrival',
            orderable:false
        }
        @endif
    ]
});



$(document).on('click', '.delete', function(){

var id = $(this).data('id');

if(confirm("Are you sure you want to remove it?"))
{
window.location.href = "/visitor/delete/" + id;
}

});

});
</script>

@endsection