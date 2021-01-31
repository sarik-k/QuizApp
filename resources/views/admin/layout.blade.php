<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Admin Main CSS -->
    <link href="/admin/css/app.css" rel="stylesheet">

    <!--Livewire Styles--->
    @livewireStyles

    <!--Vue JS V2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
    <script src="/admin/js/vue.js"></script>


</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('dashboard') }}">
                    <span class="align-middle">{{ config('app.name') }}</span>
                </a>

                <ul class="sidebar-nav">

                    <li class="sidebar-item {{ (request()->is('dashboard')) ? 'active' : '' }}" >
                        <a class="sidebar-link" href="{{  route('dashboard')  }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>


                    <li class="sidebar-header">
                        Quiz
                    </li>



                    <li class="sidebar-item {{ (request()->is('dashboard/quiz*')) ? 'active' : '' }}">
                        <a href="#quiz" data-toggle="collapse" class="sidebar-link" >
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Quiz</span>
                        </a>
                        <ul id="quiz" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                            <li class="sidebar-item {{ (request()->is('dashboard/quiz')) ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('list-quiz') }}">All Quizzes</a>
                            </li>
                            <li class="sidebar-item {{ (request()->is('dashboard/quiz/create')) ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('create-quiz') }}">Create a Quiz</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="sidebar-item {{ (request()->is('dashboard/results*')) ? 'active' : '' }}">
                        <a href="{{ route('list-results') }}" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Results</span>
                        </a>
                        
                    </li>


                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-settings.html">
                            <i class="align-middle" data-feather="settings"></i> <span
                                class="align-middle">Settings</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-invoice.html">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Invoice</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-blank.html">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#auth" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
                        </ul>
                    </li> --}}


                </ul>


            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>



                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">


                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/">
                                    {{-- <i class="align-middle mr-1"
                                        data-feather="user"></i> --}}
                                    Frontend</a>
                                <a class="dropdown-item" href="pages-profile.html">
                                    {{-- <i class="align-middle mr-1"
                                        data-feather="user"></i> --}}
                                    Profile</a>
                                

                                <div class="dropdown-divider"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button class="dropdown-item" type="submit" >
                                        {{ __('Log Out') }}
                                </button>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>QuizApp</strong></a>
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://github.com/sarik-k"
                                        target="_blank">github.com/sarik-k</a>
                                </li>
                                {{-- <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--Main App JS -->
    <script src="/admin/js/app.js"></script>
    <script src="/admin/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!--Livewire Scripts -->
    @livewireScripts

    <!--Inline Scripts -->
    @yield('scripts')

</body>

</html>
