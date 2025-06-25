<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "T'chukudu")</title>
    <meta name="description" content="@yield('description', 'Plateforme de mise en relation entre transporteurs et expéditeurs avec géolocalisation et suivi en temps réel')">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('image/logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('image/logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('image/logo.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme-vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"/>

    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css') }}">

</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#302158">
    <!-- start header -->
    <header>
        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg navbar-boxed navbar-dark bg-transparent header-light fixed-top header-reverse-scroll">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand flex flex-row jtext-center align-items-center" href="index.html">
                        <img src="{{ asset('images/logo.png') }}" data-at2x="{{ asset('images/logo.png') }}" class="defaultlogo" style="width: 65px; max-height: 65px !important;" alt="T'chukudu Logo">
                        {{-- <img src="{{ asset('images/logo.png') }}" data-at2x="{{ asset('images/logo.png') }}" class="alt-logo mobile-log" style="width: 65px; max-height: 65px !important;" alt="T'chukudu Logo"> --}}
                        <b style="font-size: 18px" class="default-logo">T'chukudu </b>
                        <b style="font-size: 18px" class="alt-logo text-dark">T'chukudu</b>
                    </a>
                </div>
                <div class="col-auto menu-order px-lg-0">
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item dropdown megamenu">
                                <a href="#" class="nav-link">ACCUEIL</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="#" class="nav-link">À PROPOS</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="#" class="nav-link">TRANSPORTEURS</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="#" class="nav-link">AUTRES PAGES</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto text-end pe-0 font-size-0">
                    <div class="header-button d-none d-md-inline-block">
                        <a href="#download" class="btn btn-very-small btn-round-edge-small btn-gradient-light-purple-light-red section-link">TÉLÉCHARGER L'APPLICATION</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header -->

    @yield('content')

    <!-- start footer -->
    <footer class="footer-application footer-dark bg-medium-purple">
        <div class="footer-top padding-five-tb lg-padding-eight-tb sm-padding-50px-tb">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-4 col-sm-6 md-margin-40px-bottom xs-margin-25px-bottom">
                        <a href="index.html" class="footer-logo margin-25px-bottom d-inline-block"><img src="{{ asset('images/logo.png') }}" data-at2x="{{ asset('images/logo.png') }}" style="width: 100px; max-height: 100px;"></a>
                        <p class="w-95 lg-w-100">Lorem ipsum is simply dummy text of the printing and industry lorem ipsum has been the industry.</p>
                        <div class="social-icon-style-12">
                            <ul class="extra-small-icon light">
                                <li><a class="facebook" href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-2 offset-lg-1 col-md-4 col-sm-6 md-margin-40px-bottom xs-margin-25px-bottom">
                        <span class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">Company</span>
                        <ul>
                            <li><a href="about-us.html">About company</a></li>
                            <li><a href="our-services.html">Company services</a></li>
                            <li><a href="our-team.html">Job opportunities</a></li>
                            <li><a href="our-team.html">Creative people</a></li>
                            <li><a href="contact-us-classic.html">Contact us</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-2 col-md-4 col-sm-6 xs-margin-45px-bottom">
                        <span class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">Customer</span>
                        <ul>
                            <li><a href="faq.html">Client support</a></li>
                            <li><a href="latest-news.html">Latest news</a></li>
                            <li><a href="our-story.html">Company story</a></li>
                            <li><a href="pricing-packages.html">Pricing packages</a></li>
                            <li><a href="who-we-are.html">Who we are</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 offset-lg-1 col-md-8 col-sm-6 last-paragraph-no-margin text-center text-lg-start">
                        <span class="alt-font font-weight-500 d-none d-lg-block text-white margin-30px-bottom xs-margin-10px-bottom">Download for free</span>
                        <div class="w-85 md-w-100 d-md-flex flex-md-row d-lg-inline-block">
                            <a href="#" class="margin-20px-bottom d-inline-block md-margin-10px-right sm-no-margin-right">
                                <img class="w-100" src="{{ asset('images/application-img-11.png') }}" alt="">
                            </a>
                            <a href="#" class="margin-20px-bottom d-inline-block md-margin-10px-left sm-no-margin-left">
                                <img class="w-100" src="{{ asset('images/application-img-12.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- end footer column -->
                </div>
            </div>
        </div>
        <div class="footer-bottom padding-35px-tb border-top border-width-1px border-color-white-transparent">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 align-items-center">
                    <div class="col sm-margin-15px-bottom">
                        <ul class="footer-horizontal-link d-flex flex-column flex-sm-row justify-content-center justify-content-md-start text-center">
                            <li><a href="about-us.html">About us</a></li>
                            <li><a href="our-services.html">Our services</a></li>
                            <li><a href="our-team.html">Team</a></li>
                            <li><a href="contact-us-classic.html">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col text-center text-md-end last-paragraph-no-margin">
                        <p>&copy; 2024 Litho is Proudly Powered by <a href="https://www.themezaa.com/" target="_blank" class="text-decoration-line-bottom text-white">ThemeZaa</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
    <!-- end scroll to top -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/theme-vendors.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
