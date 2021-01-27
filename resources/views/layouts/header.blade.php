<header class="header_area">
    <div id="header_navbar" class="header_navbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            {{-- <img id="logo" src="images/logo.svg" alt="Logo"> --}}
                            <h3 class="text-secondary">{{ config('app.name', 'Laravel') }}</h3>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                {{-- <li class="nav-item">
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#courses">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#mentors">Mentors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li> --}}
                                @if (Route::has('login'))

                                    @auth
                                        <li class="nav-item">
                                            <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                                        </li>
                                        <li class="nav-item">

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <button class="btn btn-secondary" type="submit">
                                                    {{ __('Logout') }}
                                                </button>
                                            </form>
                                        </li>

                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="">Login</a>

                                        </li>

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="">Register</a>
                                            </li>
                                        @endif
                                    @endauth

                                @endif
                                {{-- <li class="nav-item">
                                    <a class="header-btn btn-hover" href="#courses">Get Started</a>
                                </li> --}}
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header navbar -->
</header>
