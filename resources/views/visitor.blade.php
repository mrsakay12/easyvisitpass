@extends('dashboard')

@section('content')

<h2 class="mt-3">Visitor Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Visitor Management</li>	
  	</ol>
</nav>
<div class="mt-4 mb-4">
@if(session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
	@endif
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-8">Visitor Management</div>
				@if(Auth::user()->type == 'Admin')

				<div class="col col-md-4">
					<a href="{{ route('visitor.add') }}" class="btn btn-success btn-sm float-end">Add</a>
				</div>
				
				@endif
			
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="visitor_table">
					<thead>
						<tr>
						    <th>Visitor Pass ID </th>
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
</div>
<script>

	
$(document).ready(function(){

	var table = $('#visitor_table').DataTable({

		processing:true,
		serverSide:true,
		ajax:"{{ route('visitor.fetchall') }}",
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