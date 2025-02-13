<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="font-size:0.875em">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href={{ asset('site/images/favicon/apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href={{ asset('site/images/favicon/apple-icon-60x60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href={{ asset('site/images/favicon/apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset('site/images/favicon/apple-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href={{ asset('site/images/favicon/apple-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href={{ asset('site/images/favicon/apple-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href={{ asset('site/images/favicon/apple-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href={{ asset('site/images/favicon/apple-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('site/images/favicon/apple-icon-180x180.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192"
        href={{ asset('site/images/favicon/android-icon-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('site/images/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="96x96" href={{ asset('site/images/favicon/favicon-96x96.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('site/images/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('site/images/favicon/manifest.json') }}" />


    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />


    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('site/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('site/js/bootstrap.min.js') }}" />
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- StyleSheet link CSS -->
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('site/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

<!-- Back to top button -->
<a id="button"></a>
<div class="home1_banner_outer position-relative">
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand" href="/">
                    <figure class="logo mb-0">
                        <img src="{{ asset('site/images/logo.png') }}" alt="image" class="img-fluid" />
                    </figure>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#"
                                id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Home
                            </a>
                            <div class="dropdown-menu drop-down-content">
                                <ul class="list-unstyled drop-down-pages">
                                    <li class="nav-item active">
                                        <a class="dropdown-item nav-link" href="/">Home 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Home 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Home 3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#l">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#"
                                id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Pages
                            </a>
                            <div class="dropdown-menu drop-down-content">
                                <ul class="list-unstyled drop-down-pages">
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Review</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Shop 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Shop 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Shop 3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Single Product
                                            1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Single Product
                                            2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Single Product
                                            3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Cart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Checkout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Special Offers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">404</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Coming Soon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Privacy
                                            Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Terms &
                                            Conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Thank You</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#"
                                id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Blog
                            </a>
                            <div class="dropdown-menu drop-down-content">
                                <ul class="list-unstyled drop-down-pages">
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Single Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Load More</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">One Column</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Two Column</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Three Column</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Three Column
                                            Sidebar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Four Column</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item nav-link" href="#">Six
                                            Column</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Faq's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <div class="last_list">
                        <a class="text-decoration-none search-box search icon" href="#search"><img
                                src="{{ asset('site/images/header-magnifyingglass.png') }}" alt="image"
                                class="img-fluid" /></a>
                        <a class="text-decoration-none cart icon position-relative" href="#"><img
                                src="{{ asset('site/images/header-cart.png') }}" alt="image"
                                class="img-fluid" /><span>0</span></a>
                        <a class="text-decoration-none contact_us" href="#">Contact Us<i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Search Form -->
    <div id="search" class="">
        <span class="close">X</span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Type to Search" />
        </form>
    </div>
    @yield('banner')
</div>

@yield('content')
<!-- Footer -->
<section class="footer-con position-relative">
    <figure class="footer-image mb-0">
        <img class="img-fluid" src="{{ asset('site/images/footer-image.png') }}" alt="image" />
    </figure>
    <div class="container">
        <div class="middle_portion">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-6 col-12 order-md-1 order-sm-1 order-1">
                    <a href="/">
                        <figure class="footer-logo mb-0">
                            <img class="img-fluid" src="{{ asset('site/images/footer-logo.png') }}"
                                alt="image" />
                        </figure>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 order-md-2 order-sm-4 order-2">
                    <div class="links">
                        <h5 class="heading">Navigation</h5>
                        <div class="pages">
                            <ul class="list-unstyled mb-0 list1">
                                <li>
                                    <i class="fas fa-circle"></i><a href="/">Home</a>
                                </li>
                                <li>
                                    <i class="fas fa-circle"></i><a href="#l">About</a>
                                </li>
                                <li>
                                    <i class="fas fa-circle"></i><a href="#">Shop</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <i class="fas fa-circle"></i><a href="#">Prodects</a>
                                </li>
                                <li>
                                    <i class="fas fa-circle"></i><a href="#">Blog</a>
                                </li>
                                <li>
                                    <i class="fas fa-circle"></i><a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 order-md-3 order-sm-3 order-3">
                    <div class="info">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <div class="text">
                                    <span>Address:</span>
                                    <a href="https://www.google.com/maps/place/121+King+St,+Melbourne+VIC+3000,+Australia/@-37.8172467,144.9532001,17z/data=!3m1!4b1!4m6!3m5!1s0x6ad65d4dd5a05d97:0x3e64f855a564844d!8m2!3d-37.817251!4d144.955775!16s%2Fg%2F11g0g8c54h?entry=ttu"
                                        class="text-decoration-none address mb-0">121 King Street Melbourne, 3000,
                                        Australia
                                    </a>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open-text"></i>
                                <div class="text">
                                    <span>Email:</span>
                                    <a href="mailto:info@icedelights.com"
                                        class="text-decoration-none">info@icedelights.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 order-md-4 order-sm-2 order-4">
                    <div class="icon">
                        <div class="phone_wrapper">
                            <i class="fa-solid fa-phone phone"></i>
                            <div class="phone_content">
                                <a href="tel:+568925896325" class="text-decoration-none d-block">+5689 2589 6325</a>
                                <span>Got Questions? Call us 24/7</span>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0 social-icons">
                            <li>
                                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/"><i class="fa-brands fa-x-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="mb-0">Copyright &copy; {{ date('Y') }}; <a href="http://manuelluvuvamo.vercel.app/"
                    target="_blank">Manuel Luvuvamo</a></p>
        </div>
    </div>
</section>
<!-- PRE LOADER -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>
<!-- Latest compiled JavaScript -->
<script src="{{ asset('site/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('site/js/popper.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/js/aos.js') }}"></script>
<script src="{{ asset('site/js/owl.carousel.js') }}"></script>
<script src="{{ asset('site/js/carousel.js') }}"></script>
<script src="{{ asset('site/js/animation.js') }}"></script>
<script src="{{ asset('site/js/back-to-top-button.js') }}"></script>
<script src="{{ asset('site/js/preloader.js') }}"></script>
<script src="{{ asset('site/js/counter.js') }}"></script>
<script src="{{ asset('site/js/search.js') }}"></script>

@livewireScripts

@stack('scripts')

</body>

</html>
