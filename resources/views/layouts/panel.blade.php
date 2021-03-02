<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{config('app.name')}} | @yield('title')</title>
    <!-- Favicon -->
    <link href="{{asset('img/brand/tarea.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('css/argon.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Sidenav -->
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="{{route('tareas')}}">
                <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                @if (Auth::user()->file==null || Auth::user()->file=="#")
                                <img src="{{asset('img/theme/team-op1.jpg')}}">
                                @else
                                <img src="{{asset(Auth::user()->file)}}">
                                @endif

                            </span>
                            <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                        </div>
                    </a>
                    @include('includes.panel.dropmenu')
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{route('tareas')}}">
                                {{config('app.name')}}
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                @include('includes.panel.menu')


            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('tareas')}}">{{config('app.name')}}</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    @if (Auth::user()->file==null || Auth::user()->file=="#")
                                    <img src="{{asset('img/theme/team-op1.jpg')}}">
                                    @else
                                    <img src="{{asset(Auth::user()->file)}}">
                                    @endif
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                                </div>
                            </div>
                        </a>
                        @include('includes.panel.dropmenu')
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-4 pt-md-6">

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            @yield('content')
            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2021 <a href="/" class="font-weight-bold ml-1">{{config('app.name')}}</a>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
    @yield('js')
    <!-- Argon JS -->
    <script src="{{asset('js/argon.js?v=1.0.0')}}"></script>
</body>

</html>
