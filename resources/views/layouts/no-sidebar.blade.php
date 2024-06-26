<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SKM Kankemenag Kab. Sragen</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.2.0') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <style>
        html,
        body {
            color: #2f3036;
        }

        .sidebar-default .sidebar-list .navbar-nav .nav-item .nav-link:not(.disabled) {
            display: flex;
            white-space: normal;
        }

        @media only screen and (min-width: 1100px) {
            .iq-banner .iq-navbar-header .iq-header-img {
                height: 300px;
            }
        }
    </style>

    @yield('css')
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    {{-- @include('layouts.sidebar') --}}


    <main class="main-content">
        <div class="position-relative iq-banner">
            @include('layouts.navbar')

            <div class="iq-navbar-header" style="height: 215px; padding-bottom: 0px;">
                <div class="container iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1 style="font-size: 30px; font-weight: bold;">Survey Kepuasan Masyarakat</h1>
                                    <h2 style="font-size: 20px;">Kantor Kementerian Agama Kabupaten Sragen</h2>
                                    <p style="font-size: 10px; margin-bottom: 30px;">Partisipasi anda sangat kami
                                        perlukan untuk menjadi lebih baik !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ asset('assets/images/dashboard/top-header7.png') }}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
        </div>

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            @yield('content')
        </div>



    </main>
    <!-- Wrapper End-->


    <!-- Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
    <script src="{{ asset('jquery-3.6.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
			$('a[href="'+window.location.href+'"]').addClass('active');

			if($('a[href="'+window.location.href+'"]').parents('ul.ml-menu').length > 0) {
				$('a[href="'+window.location.href+'"]').parents('.ml-menu').css('display', 'block');
				$('li.active').parent().siblings('.menu-toggle').addClass('toggled');
			}
		});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    @yield('script')
</body>

</html>