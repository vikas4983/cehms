<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="{{ asset('storage/' . ($setting->favicon ?? '')) }}">
    <title>@yield('title', 'CEHSM')</title>

    <!-- CSS -->

    <link href="{{ asset('assets-frontend/css/datepicker.css') }}">
    <link href="{{ asset('assets-frontend/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/iconmoon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .map-responsive {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%;
            height: 0;
        }

        .map-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
    <style>
        .navbar-nav>li>a {
            position: relative;
            text-decoration: none;
        }

        .navbar-nav>li>a.active {
            color: #0d6efd !important;
        }

        /* underline */
        .navbar-nav>li>a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: #0d6efd;
        }
    </style>
    <style>
        /* 🔥 Force flex layout (override bootstrap) */
        .col-sm-12.footer-flex {
            display: flex !important;
            gap: 30px;
            flex-wrap: nowrap;
            align-items: flex-start;
        }

        /* 🔥 Remove bootstrap float issue */
        .footer-flex .foot-nav {
            float: none !important;
        }

        /* 🔥 Width control */
        .footer-flex .foot-50 {
            width: 50%;
        }

        .footer-flex .foot-25 {
            width: 25%;
        }

        /* 🔥 Prevent overflow */
        .footer-flex>div {
            box-sizing: border-box;
        }

        /* 🔥 Map responsive */
        .map-responsive iframe {
            width: 100%;
            height: 200px;
            border: 0;
        }

        /* 🔥 List clean */
        .foot-nav ul {
            padding: 0;
            list-style: none;
        }

        .foot-nav ul li {
            margin-bottom: 8px;
        }

        /* 🔥 Links */
        .foot-nav a {
            text-decoration: none;
            color: #fff;
        }

        .foot-nav a:hover {
            color: #0d6efd;
        }

        /* 🔥 Heading */
        .foot-nav h3 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        /* 🔥 Mobile responsive */
        @media (max-width: 768px) {
            .col-sm-12.footer-flex {
                flex-direction: column;
            }

            .footer-flex .foot-50,
            .footer-flex .foot-25 {
                width: 100%;
            }
        }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

</head>

<body>
    <!-- ==============================================
    ** Preloader **
    =================================================== -->
    <div id="loading">
        <div class="element">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Header **
    =================================================== -->
    <header>
        <!-- Start Header top Bar -->
        <div class="header-top">
            <div class="container clearfix">
                <ul class="follow-us hidden-xs">
                    @if (!empty($setting->facebook))
                        <li><a href="{{ $setting?->facebook ?? '#' }}"><i class="fa fa-facebook-official"
                                    aria-hidden="true"></i></a></li>
                    @endif
                    @if (!empty($setting->google))
                        <li><a href="{{ $setting?->google ?? '#' }}"><i class="fa fa-google-plus"
                                    aria-hidden="true"></i></a></li>
                    @endif
                    @if (!empty($setting->youtube))
                        <li><a href="{{ $setting?->youtube ?? '#' }}"><i class="fa fa-youtube-play"
                                    aria-hidden="true"></i></a></li>
                    @endif
                    @if (!empty($setting->instagram))
                        <li><a href="{{ $setting?->instagram ?? '#' }}"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a></li>
                    @endif
                    @if (!empty($setting->twitter))
                        <li><a href="{{ $setting->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    @endif
                    @if (!empty($setting->linkedin))
                        <li><a href="{{ $setting->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                    @endif
                </ul>

                <div class="right-block clearfix">
                    <ul class="top-nav">
                        @if ($headers->isNotEmpty())
                            @forelse ($headers->where('name','Register') as $header)
                                <li><a href="{{ route($header->url ?? '#') }}"
                                        style="color: #fff">{{ $header?->name ?? 'REGISTER' }}</a>
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>

                    <div class="lang-wrapper">
                        {{-- <div class="select-lang">
                            <select id="currency_select">
                                <option value="usd">USD</option>
                                <option value="aud">AUD</option>
                                <option value="gbp">GBP</option>
                            </select>
                        </div> --}}
                        <div class="select-lang2">
                            <select class="custom_select">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header top Bar -->
        <!-- Start Header Middle -->
        <div class="container header-middle">
            <div class="row"> <span class="col-xs-6 col-sm-3"><a href="{{ route('/') }}"><img
                            src="{{ asset('storage/' . $setting?->logo ?? '') }}" class="img-responsive" alt=""
                            width="200px" style="width: 7rem"></a></span>
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-9">
                    <div class="contact clearfix">
                        <ul class="hidden-xs">
                            <li> <span>Email</span> <a
                                    href="mailto:{{ $setting?->email }}">{{ $setting?->email ?? '' }}</a> </li>
                            <li> <span>Toll Free</span>
                                <a href="tel:{{ $setting?->primary_numberl ?? '' }}">
                                    {{ substr($setting?->landline, 0, 4) . '-' . substr($setting?->primary_number, 4) }}</a>
                            </li>
                        </ul>
                        @forelse ($headers->where('name', 'Login') as $header)
                            <a href="{{ route($header->url ?? '#') }}" class="login">{{ $header?->name ?? 'Login' }}
                                &nbsp;&nbsp;&nbsp;<i class="fa fa-play-circle"></i></span></a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Navigation -->
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <form action="{{ route('search.practitioner') }}" method="get"
                        class="navbar-form navbar-right">
                        <input type="text" name="input" placeholder="Enter Practitioner ID"
                            class="form-control">
                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></span></button>
                    </form>
                    <ul class="nav navbar-nav">
                        @forelse ($headers as $header)
                            @if ($header->name == 'Home')
                                <li class="{{ request()->is($header->url) ? 'active' : '' }}"> <a
                                        href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'About us')
                                <li class="{{ request()->is($header->url) ? 'active' : '' }}"> <a
                                        href="{{ url($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'Academics')
                                @if ($header->children->count())
                                    <li class="dropdown" class="{{ request()->is($header->url) ? 'active' : '' }}">
                                        <a data-toggle="dropdown"
                                            href="{{ $header->url ?? '#' }}">{{ $header?->name ?? '' }} <i
                                                class="{{ request()->is($header->url) ? 'active' : '' }}"
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            @forelse ($header->children as $subMenu)
                                                <li class="{{ request()->is($header->url) ? 'active' : '' }}">
                                                    <a
                                                        href="{{ url($subMenu->url ?? '#') }}">{{ $subMenu->name ?? '' }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                            @if (!empty($setting->admission_form))
                                                <li class="{{ request()->is($header->url) ? 'active' : '' }}">
                                                    <a href="{{ route('download', ['path' => $setting->admission_form]) }}"
                                                        target="_blank">Student
                                                        Form</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                            @elseif($header->name == 'Update')
                                <li class="{{ request()->is($header->url) ? 'active' : '' }}"> <a
                                        href="{{ url($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a>
                                </li>
                            @elseif($header->name == 'Practitioners')
                                <li class="{{ request()->is($header->url) ? 'active' : '' }}"> <a
                                        href="{{ url($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'Contact')
                                <li class="{{ request()->is($header->url) ? 'active' : '' }}"> <a
                                        href="{{ url($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @endif
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>

    @yield('content')

    <!-- ==============================================
    ** Footer **
    =================================================== -->


    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="container">
            <div class="col-sm-12 footer-flex">

                <div class="foot-nav foot-50">
                    <h3>
                        @if (!empty($setting->name))
                            {{ $setting->name }}
                        @endif
                    </h3>

                    @if (!empty($setting->map))
                        <div class="map-responsive">
                            <iframe src="{{ $setting->map }}" loading="lazy"></iframe>
                        </div>
                    @endif
                </div>

                <div class="foot-nav foot-25">
                    <h3>Address</h3>
                    <ul>
                        @if (!empty($setting->address))
                            <li>{{ $setting->address }}</li>
                        @endif

                        @if (!empty($setting->landline))
                            <li><a href="tel:{{ $setting->landline }}">{{ $setting->landline }}</a></li>
                        @endif

                        @if (!empty($setting->primary_number))
                            <li><a href="tel:{{ $setting->primary_number }}">{{ $setting->primary_number }}</a></li>
                        @endif

                        @if (!empty($setting->secondary_number))
                            <li><a href="tel:{{ $setting->secondary_number }}">{{ $setting->secondary_number }}</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="foot-nav foot-25">
                    <h3>Useful Links</h3>
                    <ul>
                        @foreach ($footers as $footer)
                            <li>
                                <a href="{{ url($footer->url ?? '') }}">
                                    {{ $footer->name ?? '' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        <!-- End Footer Top -->
        <!-- Start Footer Bottom -->
        {{-- <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="connect-us">
                            <h3>Connect with Us</h3>
                            <ul class="follow-us clearfix">
                                @if (!empty($setting->facebook))
                                    <li><a href="{{ $setting->facebook }}"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                @endif
                                @if (!empty($setting->twitter))
                                    <li><a href="{{ $setting->twitter }}"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                @endif
                                @if (!empty($setting->linkedin))
                                    <li><a href="{{ $setting->linkedin }}"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                @endif
                                @if (!empty($setting->google))
                                    <li><a href="{{ $setting->google }}"><i class="fa fa-google-plus"
                                                aria-hidden="true"></i></a></li>
                                @endif
                                @if (!empty($setting->youtube))
                                    <li><a href="{{ $setting->youtube }}"><i class="fa fa-youtube-play"
                                                aria-hidden="true"></i></a></li>
                                @endif
                                @if (!empty($setting->instagram))
                                    <li><a href="{{ $setting->instagram }}"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="subscribe">
                            <h3>Subscribe with Us</h3>
                            <!-- Begin MailChimp Signup Form -->
                            <div id="mc_embed_signup">
                                <form
                                    action="//protechtheme.us16.list-manage.com/subscribe/post?u=cd5f66d2922f9e808f57e7d42&amp;id=ec6767feee"
                                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                    class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <input type="email" value="" name="EMAIL" class="email"
                                            id="mce-EMAIL" placeholder="enter your email address" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                            <input type="text" name="b_cd5f66d2922f9e808f57e7d42_ec6767feee"
                                                tabindex="-1" value="">
                                        </div>
                                        <div class="clear">
                                            <input type="submit" value="Subscribe" name="subscribe"
                                                id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="instagram">
                            <h3>@INSTAGRAM</h3>
                            <ul class="clearfix">
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img1.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img2.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img3.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img4.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img5.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="{{ asset('assets-frontend/images/insta-img6.jpg') }}"
                                                class="img-responsive" alt=""></figure>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Footer Bottom -->
    </footer>

    <!-- Scroll to top -->
    <a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

    <!-- Optional JavaScript
-->
    <script src="{{ asset('assets-frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/matchHeight-min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/bxslider.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/datepicker.js') }}"></script>

     <script>
        document.addEventListener('DOMContentLoaded', function() {

            const logout = document.getElementById('logOut');

            if (!logout) return;

            logout.addEventListener('click', function(e) {
                e.preventDefault();

                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');

                fetch('/logout', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = '/';
                        } else {
                            alert('Logout failed');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

            });

        });
    </script>
</body>

</html>
