    <!DOCTYPE html>
<html>
<head>
    <title>Easy Visit Pass</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="icon" href="{{ asset('Images/logo4.png') }}" />

</head>
<body>

    @guest

    <h1 class="mt-4 mb-5 text-center">Easy Visit Pass</h1>

    @yield('content')

    @else

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
        rel="stylesheet">

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">  
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Easy Visit Pass</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="navbar-nav">
       
            <div class="nav-item text-nowrap">
            
                <div class="nav-link px-3" href="#">Welcome, {{ Auth::user()->name }}
                    <span class="material-symbols-outlined">person</span>
                    <a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}" aria-current="page" href="/profile">Profile</a>
                </div>
            </div>
        </div>      
    </header>

    <aside>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="sidebarMenu col-md-3 col-lg-2 d-md-block sidebar collapse ">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="material-symbols-outlined"> grid_view</span>
                            <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}" aria-current="page" href="/dashboard">Dashboard</a>
                        </li>
                        
                        @if(Auth::user()->type != 'User')

                        <li class="nav-item">
                            <span class="material-symbols-outlined">room_preferences</span>
                            <a class="nav-link {{ Request::segment(1) == 'department' ? 'active' : '' }}" aria-current="page" href="/department">Departments</a>
                        </li>
                            
                        @endif
                        @if(Auth::user()->type == 'Admin')
                        <li class="nav-item">
                            <span class="material-symbols-outlined">subtitles</span>
                            <a class="nav-link {{ Request::segment(1) == 'designation' ? 'active' : '' }}" aria-current="page" href="/designation">Designations</a>
                        </li>
                            
                        @endif
                        @if(Auth::user()->type != 'User')
                        <li class="nav-item">
                            <span class="material-symbols-outlined">badge</span>
                            <a class="nav-link {{ Request::segment(1) == 'sub_user' ? 'active' : '' }}" aria-current="page" href="/sub_user">Employees</a>    
                        </li>
                        
                        @endif           
                        <li class="nav-item">
                            <span class="material-symbols-outlined">nest_doorbell_visitor</span>
                            <a class="nav-link {{ Request::segment(1) == 'visitor' ? 'active' : '' }}" href="/visitor">Visitors</a>
                        </li>    
                        <li class="nav-item">
                            <span class="material-symbols-outlined">how_to_reg</span>
                            <a class="nav-link {{ Request::segment(1) == 'register' ? 'active' : '' }}" href="/register">Pre-Registers</a>
                        </li>
                        <li class="nav-item">
                            <span class="material-symbols-outlined">logout</span>
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>

                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">!-->

                @yield('content')

                <!--</div>!-->
            </main>
        </div>
    </div> 
    </aside>   

    @endguest

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>