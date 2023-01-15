@extends('dashboard')

@section('content')

<h2 class="mt-3">Pre - Register Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Pre - Register Management</li>	
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
			

				<div class="col col-md-4">
					<a href="{{ route('register.add') }}" class="btn btn-success btn-sm float-end">Add</a>
				</div>
				
			
			
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="register_table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Address </th>
							<th>Visited To </th>
							<th>Visit Date & Time</th>
							<th>Action</th>
							
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

	var table = $('#register_table').DataTable({

		processing:true,
		serverSide:true,
		ajax:"{{ route('register.fetchall') }}",
		columns:[
			{
				data:'register_firstname',
				name: 'register_firstname'
			},
			{
				data:'register_lastname',
				name: 'register_lastname'
			},
			{
				data:'register_email',
				name: 'register_email'
			},
		
			{
				data:'register_mobile_no',
				name: 'register_mobile_no'
			},
			{
				data: 'register_gender',
				name: 'register_gender'
			},
			{
				data:'register_address',
				name:'register_address'
			},
			{
				data:'name',
				name:'name'
			},
			{
				data:'register_visitdate',
				name:'register_visitdate'
			},
			{
				data:'action',
				name:'action',
				orderable:false
			}
			
		]
	});

	$(document).on('click', '.delete', function(){

var id = $(this).data('id');

if(confirm("Are you sure you want to remove it?"))
{
	window.location.href = "/register/delete/" + id;
}

});

});
</script>

@endsection