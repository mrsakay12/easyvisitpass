@extends('dashboard')
@section('content')

	<main class="login-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">

					@if (session()->has('error'))

					<div class="alert alert-danger">
						{{ session()->get('error') }}
					</div>

					@endif

					
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
					<div class="card">
					<img src="{{ asset('/Images/logo2.png') }}"  >
						<h3 class="card-header text-center">Login</h3>

						<div class="card-body">
							<form method="post" action="{{ route('login.custom') }}">

								@csrf

								<div class="form-group mb-3">
									<input type="text" name="email" class="form-control" placeholder="Email" />

									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>

								<div class="form-group mb-3">
									<input type="password" name="password" class="form-control" placeholder="Password" />

									@if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
								</div>

								<div class="d-grid mx-auto">
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

@endsection
