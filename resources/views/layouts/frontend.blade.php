<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1">
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
                    <ul class="top-nav hidden-xs">
                        @if ($headers->isNotEmpty())
                            @forelse ($headers->where('name','Register') as $header)
                                <li><a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? 'REGISTER' }}</a>
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
                    <form class="navbar-form navbar-right">
                        <input type="text" placeholder="Search Now" class="form-control">
                        <button class="search-btn"><i class="fa fa-search"></i></span></button>
                    </form>
                    <ul class="nav navbar-nav">
                        @forelse ($headers as $header)
                            @if ($header->name == 'Home')
                                <li> <a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'About us')
                                <li> <a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'Academics')
                                @if ($header->children->count())
                                    <li class="dropdown"> <a data-toggle="dropdown"
                                            href="{{ $header->url ?? '#' }}">{{ $header?->name ?? '' }} <i
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            @forelse ($header->children as $subMenu)
                                                <li><a
                                                        href="{{ route($subMenu->url ?? '#') }}">{{ $subMenu->name ?? '' }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                @endif
                            @elseif($header->name == 'Update')
                                <li> <a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'Practitioners')
                                <li> <a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
                            @elseif($header->name == 'Contact')
                                <li> <a href="{{ route($header->url ?? '#') }}">{{ $header?->name ?? '' }}</a></li>
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
            <div class="row row1">
                <div class="col-sm-12 clearfix">
                    <div class="foot-nav">
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
                    <div class="foot-nav">
                        <h3>Address</h3>
                        <ul>
                            @if (!empty($setting->address))
                                <li><a href="#">{{ $setting->address }}</a></li>
                            @endif

                            @if (!empty($setting->landline))
                                <li><a href="tel:{{ $setting->landline }}">{{ $setting->landline }}</a></li>
                            @endif

                            @if (!empty($setting->primary_number))
                                <li><a href="tel:{{ $setting->primary_number }}">{{ $setting->primary_number }}</a>
                                </li>
                            @endif

                            @if (!empty($setting->secondary_number))
                                <li><a
                                        href="tel:{{ $setting->secondary_number }}">{{ $setting->secondary_number }}</a>
                                </li>
                            @endif


                        </ul>
                    </div>
                    <div class="foot-nav">
                        <h3>Departments</h3>
                        <ul>
                            @forelse ($footers as $footer)
                                @if (!empty($footer) && $footer->name == 'Books')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @elseif(!empty($footer) && $footer->name == 'Medicine')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @elseif(!empty($footer) && $footer->name == 'Practitioners')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @endif
                            @empty
                            @endforelse


                        </ul>
                    </div>
                    <div class="foot-nav">
                        <h3>Useful Links</h3>
                        <ul>
                            @forelse ($footers as $footer)
                                @if (!empty($footer) && $footer->name == 'Contact')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @elseif(!empty($footer) && $footer->name == 'Update')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @elseif(!empty($footer) && $footer->name == 'Apply For')
                                    <li><a href="{{ route($footer->url ?? '') }}">{{ $footer?->name ?? '' }}</a></li>
                                @endif
                            @empty
                            @endforelse
                        </ul>
                    </div>


                </div>
                <div class="col-sm-3">
                    <div class="footer-logo hidden-xs"><a href="index.html"><img
                                src="{{ asset('assets-frontend/') }}images/footer-logo.png" class="img-responsive"
                                alt=""></a></div>
                    <p>© 2026 <span>CEHSM</span>. All rights reserved</p>
                    <ul class="terms clearfix">
                        <li><a href="#">TERMS OF USE</a></li>
                        <li><a href="#">PRIVACY POLICY</a></li>
                        <li><a href="#">SITEMAP</a></li>
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
</body>

</html>
