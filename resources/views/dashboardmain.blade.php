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

    <div class="date-time">
    <p class="ridge">
        <span class="material-symbols-outlined">calendar_month</span>
        <span id='date'></span>
    </p>
    </div>
    
    <script>
        var dt = new Date();
        document.getElementById('date').innerHTML= new Date().toString();
    </script>

    <div class="container">
	<div class="row">
        <div class="employees">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <span class="material-symbols-outlined">badge</span>
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Employees</h4>
                        </div>
                        <div class="card-body">
                            {{$user}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="visitors">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <span class="material-symbols-outlined">nest_doorbell_visitor</span>
                        <i class="fas fa-users"></i>
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
		<div class="registered">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-secondary">
                        <span class="material-symbols-outlined">groups</span>
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Registered Visitors</h4>
                        </div>
                        <div class="card-body">
                            12
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="pre-register">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <span class="material-symbols-outlined">how_to_reg</span>
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pre Registers</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    </div>

</div>
 <!-- General JS Scripts -->
<script src="https://demo.quickpass.xyz/assets/modules/jquery/dist/jquery.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/popper.js/dist/popper.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/moment/min/moment.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/js/dropzone.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="https://demo.quickpass.xyz/assets/modules/izitoast/dist/js/iziToast.min.js"></script>

<!-- Template JS File -->
<script src="https://demo.quickpass.xyz/assets/js/scripts.js"></script>
<script src="https://demo.quickpass.xyz/js/custom.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

<script type="text/javascript">
    var beep = document.getElementById("myAudio1");

    function sound() {
        beep.play();
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // web_token
        var firebaseConfig = {
            apiKey: "AIzaSyCwsKNDXae_U6PVp28rUsyeUVLZJGd2JsQ",
            authDomain: "visitor-app-f4cf8.firebaseapp.com",
            projectId: "visitor-app-f4cf8",
            storageBucket: "visitor-app-f4cf8.appspot.com",
            messagingSenderId: "916840265010",
            appId: "1:916840265010:web:0a79ffc97842d18924932b",
            measurementId: "G-B6CDGMQ910"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        startFCM();

        function startFCM() {
            messaging.requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajax({
                        url: 'https://demo.quickpass.xyz/admin/store-token',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {

                        },
                        error: function(error) {

                        },
                    });
                }).catch(function(error) {

                });
        }
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };

            sound();
            window.location.reload();
            new Notification(title, options);
        });

        
            });
</script>
    </body>

</html>

@endsection