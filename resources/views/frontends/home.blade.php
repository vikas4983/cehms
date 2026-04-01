@extends('layouts.frontend')
@section('title', 'CEHSM')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .my-toast {
            font-size: 16px !important;
            padding: 16px 20px !important;
            border-radius: 10px !important;
        }

        /* Close button style */
        .my-toast .swal2-close {
            color: #ffffff !important;
            font-size: 27px !important;
            font-weight: bold;
            right: 10px;
            top: 8px;
            margin-bottom: 1rem;
        }

        /* Hover effect (optional) */
        .my-toast .swal2-close:hover {
            color: #ffffff !important;
            transform: scale(1.2);
        }
    </style>

    <x-enquiry-component />
    <div class="banner-outer">
        <div class="banner-slider">
            @forelse ($banners as $banner)
                <div class="slide1"
                    style="background-image: url('{{ asset('storage/' . $banner->banner) }}'); background-size: cover; background-position: center;">
                    <div class="container">
                        <div class="content animated fadeInRight">
                            <div class="fl-right">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="slide1"
                    style="background-image: url('{{ asset('assets-frontend/images/default_banner.png') }}'); background-size: cover; background-position: center;">
                    <div class="container">
                        <div class="content animated fadeInRight">
                            <div class="fl-right">
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <section class="about">
        <div class="container">
            <ul class="row our-links">
                <li class="col-sm-4 apply-online clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/apply-online-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3>{{ __('messages.apply_online') }}</h3>
                        <p>{{ __('messages.join_network') }}</p>
                        <a href="{{ route('student.register') }}" class="more"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </li>
                <li class="col-sm-4 prospects clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/prospects-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3><span>{{ __('messages.search') }}</span>{{ __('messages.practitioners') }}</h3>
                        <p>{{ __('messages.find_practitioners') }}</p>
                        <a href="{{ url('practitioner') }}" class="more"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </li>
                <li class="col-sm-4 certification clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/certification-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3>{{ __('messages.courses') }}</h3>
                        <p>{{ __('messages.learn_courses') }}</p>
                        <a href="{{ url('book') }}" class="more"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-sm-push-5 left-block"> <span
                        class="sm-head">{{ __('messages.healthcare_vision') }}</span>
                    <h2>{{ __('messages.cehsm_online') }}</h2>
                    <p>{{ __('messages.vision_quote') }}</p>

                </div>
                <div class="col-sm-5 col-sm-pull-7">
                    <div class="video-block">
                        <div id="thumbnail_container"> <img src="{{ asset('assets-frontend/images/about-video.jpeg') }}"
                                id="thumbnail" class="img-responsive" alt=""> </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==============================================
                                                                                                                                                                                        =================================================== -->
    <section class="our-cources padding-lg">
        <div class="container">
            <h2><span>{{ __('messages.books_collection') }}</span>{{ __('messages.what_read') }}</h2>
            <ul class="course-list owl-carousel">
                @foreach ($books as $book)
                    <li>
                        <div class="inner">
                            <figure>
                                <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('assets-frontend/images/course-img3.jpg') }}"
                                    alt="">
                            </figure>
                            <h3>
                                {{ $book->name }}
                            </h3>
                            <p>{{ Str::limit($book->publisher, 30) }}</p>
                            <div class="bottom-txt clearfix">
                                <div class="duration">
                                    <h4>{{ $book->pages ?? '' }}</h4>
                                    <span> {{ __('messages.courses') }}</span>
                                </div>

                                <a href="{{ url('book') }}" style="color: white">
                                    {{ __('messages.view') }}
                                </a>
                            </div>

                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <section class="why-choose padding-lg">
        <div class="container">
            <h2><span>{{ __('messages.numbers_say') }}</span>{{ __('messages.why_choose_us') }}</h2>
            <ul class="our-strength">
                <li>
                    {{-- <div class="icon"><i class="fa fa-graduation-cap"></i></div> --}}
                    <span class="counter">{{ $counts['books'] ?? '' }}</span>
                    <div class="title">{{ __('messages.certified_courses') }}</div>
                </li>
                <li>
                    {{-- <div class="icon"><span class="fa fa-graduation-cap"></span></div> --}}
                    <span class="counter">{{ $counts['AllStudents'] ?? '' }}</span>
                    <div class="title">{{ __('messages.students_enrolled') }} </div>
                </li>
                <li>
                    {{-- <div class="icon"><span class="fa fa-graduation-cap">456</span></div> --}}
                    <span class="counter">{{ $counts['medicines'] ?? '' }}</span>
                    <div class="title">{{ __('messages.tested_medicines') }}</div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ==============================================
                                                                                                                                                                                        ** Testimonials **
                                                                                                                                                                                        =================================================== -->
    <section class="testimonial padding-lg">
        <div class="container">

            <span class="mt-3 d-inline-block" style="color: #FFC107; font-size:6rem;">
                ❝
            </span>
            <h2>{{ __('messages.voices') }}
            </h2>
            <ul class="testimonial-slide">
                @foreach ($testimonials as $testimonial)
                    <li>
                        <p>
                            {{ \Illuminate\Support\Str::words(
                                $testimonial?->content ??
                                    'What is Electro Homoeopathy? Electrohomoeopathy (also spelled Electrohomeopathy, Electropathy, or known as the Mattei cancer cure) is a system of alternative herbal medicine developed in the 19th century. It is a derivative of classical homeopathy but incorporates pseudoscientific concepts of "electric bio-energy" extracted from plants. The name breaks down as follows: "electro" refers to the claimed electrical properties of the remedies, "homeo" (from Greek "homoios," meaning "similar")',
                                30,
                                '...',
                            ) }}
                            <span><a href="{{ route('testimonial') }}">Read more</a></span>
                        </p>
                        <span>
                            {{ $testimonial->name }},

                        </span>
                    </li>
                @endforeach
            </ul>

            <div id="bx-pager">
                @foreach ($testimonials as $key => $testimonial)
                    <a data-slide-index="{{ $key }}" href="">
                        <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets-frontend/images/default-testimonial.png') }}"
                            class="img-circle" style="width:70px; height:70px; object-fit:cover;"
                            alt="{{ $testimonial->name }}" />
                    </a>
                @endforeach
            </div>
            <span style="color:#FFC107; font-size:6rem; display:inline-block; margin-top:25px;">
                ❝
            </span>
        </div>
        </div>
    </section>
    @if (session('success'))
        <script>
            window.onload = function() {
                Swal.fire({
                    toast: true,
                    position: 'bottom',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 3000,
                    timerProgressBar: true,

                    background: '#28a745',
                    color: '#ffffff',
                    iconColor: '#ffffff',

                    customClass: {
                        popup: 'my-toast'
                    }
                });
            };
        </script>
    @endif

@endsection
