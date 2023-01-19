@extends('dashboard')

@section('content')

<h2 class="mt-3">Designation Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Designation Management</li>	
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
				<div class="col col-md-6">Designation Management</div>
				<div class="col col-md-6">
					<a href="/designation/add" class="btn btn-success btn-sm float-end">Add</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="designation_table">
					<thead>
						<tr>
							<th>Designation Name</th>
							<th>Department</th>
							<th>Status</th>
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

	var table = $('#designation_table').DataTable({
		processing:true,
		serverSide:true,
		ajax:'{{ route("designation.fetch_all") }}',
		columns:[
			{
				data:'designation_name',
				name:'designation_name'
			},
			{
				data:'department_name',
				name:'department_name'
			},
			{
				data:'status',
				name:'status'
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
			window.location.href = '/designation/delete/'+id;
		}

	});

</script>

@endsection