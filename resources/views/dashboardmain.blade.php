@extends('dashboard')
@section('content')
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
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">Total Employee</div>
				<div class="col col-md-6">
				
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="">
					<thead>
						<tr>
							<th>45</th>
						
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection