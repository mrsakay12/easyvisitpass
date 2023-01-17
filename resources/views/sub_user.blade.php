@extends('dashboard')

@section('content')
<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Employee</li>	
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
				<div class="col col-md-6">Employee Management</div>
				@if(Auth::user()->type == 'Admin')
				<div class="col col-md-6">
					<a href="{{ route('sub_user.add') }}" class="btn btn-success btn-sm float-end">Add</a>
				</div>
				@endif
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="user_table">
					<thead>
						<tr>
							<th>Full Name</th>
							<th> Email Address</th>
							<th>Role</th>
							<th>Status</th>
							@if(Auth::user()->type == 'Admin')
							<th>Action</th>
					
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
$(function(){

	var table = $('#user_table').DataTable({
		processing:true,
		serverSide:true,
		ajax:"{{ route('sub_user.fetchall') }}",
		columns:[
			{
				data:'name',
				name:'name'
			},
			{
				data:'email',
				name:'email'
			},
			{
				data:'type',
				name:'type'
			},
			{
				data:'status',
				name:'status'
			},
			
			@if(Auth::user()->type == 'Admin')
			{
				data:'action',
				name:'action',
				orderable:false
			}
			@endif
		]
	});

	$(document).on('click', '.delete', function(){

		var id = $(this).data('id');

		if(confirm("Are you sure you want to remove it?"))
		{
			window.location.href = "/sub_user/delete/" + id;
		}

	});

})
</script>
@endsection