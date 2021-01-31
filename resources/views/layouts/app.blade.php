<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="/css/animate.css">
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="/css/LineIcons.2.0.css">
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="/css/bootstrap-5.0.5-alpha.min.css">
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    @include('layouts.header')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')


    <!--====== BACK TOP TOP PART START ======-->
    <a href="#" class="back-to-top btn-hover"><i class="lni lni-chevron-up"></i></a>
    <!--====== BACK TOP TOP PART ENDS ======-->


    <!--====== Bootstrap js ======-->
    <script src="/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>

    <!--====== wow js ======-->
    <script src="/js/wow.min.js"></script>

    <!--====== Main js ======-->
    <script src="/js/main.js"></script>

    <script>
        // Get the navbar

        // for menu scroll 
        var pageLink = document.querySelectorAll('.page-scroll');

        pageLink.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                document.querySelector(elem.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth',
                    offsetTop: 1 - 60,
                });
            });
        });

        // section menu active
        function onScroll(event) {
            var sections = document.querySelectorAll('.page-scroll');
            var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

            for (var i = 0; i < sections.length; i++) {
                var currLink = sections[i];
                var val = currLink.getAttribute('href');
                var refElement = document.querySelector(val);
                var scrollTopMinus = scrollPos + 73;
                if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight >
                        scrollTopMinus)) {
                    document.querySelector('.page-scroll').classList.remove('active');
                    currLink.classList.add('active');
                } else {
                    currLink.classList.remove('active');
                }
            }
        };

        window.document.addEventListener('scroll', onScroll);


        //===== close navbar-collapse when a  clicked
        let navbarToggler = document.querySelector(".navbar-toggler");
        var navbarCollapse = document.querySelector(".navbar-collapse");

        document.querySelectorAll(".page-scroll").forEach(e =>
            e.addEventListener("click", () => {
                navbarToggler.classList.remove("active");
                navbarCollapse.classList.remove('show')
            })
        );
        navbarToggler.addEventListener('click', function() {
            navbarToggler.classList.toggle("active");
        });

    </script>

</body>

</html>
