@extends('layouts.frontend')
@section('title', 'CEHSM')
@section('content')

    <!-- ==============================================
                                                            ** Banner Carousel **
                                                            =================================================== -->
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
    <!-- ==============================================
                                                            ** About **
                                                            =================================================== -->
    <section class="about">
        <div class="container">
            <ul class="row our-links">
                <li class="col-sm-4 apply-online clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/apply-online-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3>Apply Online</h3>
                        <p>Join certified electro homeopathy network for trusted holistic healthcare.</p>
                        <a href="{{ route('student.register') }}" class="more"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </li>
                <li class="col-sm-4 prospects clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/prospects-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3><span>Search</span>Practitioners</h3>
                        <p>Find certified electro homeopathy practitioners for safe natural treatment.</p>
                        <a href="{{ url('practitioner') }}" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </li>
                <li class="col-sm-4 certification clearfix equal-hight">
                    <div class="icon"><img src="{{ asset('assets-frontend/images/certification-ico.png') }}"
                            class="img-responsive" alt=""></div>
                    <div class="detail">
                        <h3>Cources</h3>
                        <p>Learn electro homeopathy through structured courses for practical professional growth.</p>
                        <a href="{{ url('book') }}" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-sm-push-5 left-block"> <span class="sm-head">Our Healthcare Vision</span>
                    <h2>CEHSM Online</h2>
                    <p>"Our vision is to revolutionize healthcare by integrating the principles of Electro Homeopathy with
                        modern medical awareness, creating a Faster, Smoother, Stable, Scalable, Efficient, and Reliable
                        healthcare ecosystem. We aim to empower individuals with natural treatment options, promote
                        preventive care, and build a trusted medical network that serves humanity with compassion,
                        innovation, and excellence."</p>
                    {{-- <div class="know-more-wrapper"> <a href="about.html" class="know-more">Know More <span
                                class="icon-more-icon"></span></a> </div> --}}
                </div>
                <div class="col-sm-5 col-sm-pull-7">
                    <div class="video-block">
                        <div id="thumbnail_container"> <img src="{{ asset('assets-frontend/images/about-video.jpeg') }}"
                                id="thumbnail" class="img-responsive" alt=""> </div>
                        {{-- <a href="https://www.youtube.com/watch?v=i11RXCJVEnw" class="start-video video"><img
                                src="{{ asset('assets-frontend/images/play-btn.png') }}" alt=""></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                            ** Our Cources **
                                                            =================================================== -->
    <section class="our-cources padding-lg">
        <div class="container">
            <h2><span>Our Books Collection</span> What do you want to read?</h2>
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
                                    <h4>{{ $book->pages ?? '2 YEAR' }}</h4>
                                    <span> COURSES</span>
                                </div>

                                <a href="{{ route('books.show', $book->id) }}" style="color: white">
                                    View
                                </a>
                            </div>

                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>


    {{-- <section class="how-study padding-lg">
        <div class="container">
            <h2> <span>There are many ways to learn</span> How do you want to study?</h2>
            <ul class="row">
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3>Self-paced distance
                                learning</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="{{ asset('assets-frontend/images/how-study-img1.jpg') }}" class="img-responsive"
                            alt=""></figure>
                </li>
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3>Study on
                                campus</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="{{ asset('assets-frontend/images/how-study-img2.jpg') }}" class="img-responsive"
                            alt=""></figure>
                </li>
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3> Our Learning
                                Partners </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="{{ asset('assets-frontend/images/how-study-img3.jpg') }}" class="img-responsive"
                            alt=""></figure>
                </li>
            </ul>
        </div>
    </section> --}}

    <!-- ==============================================
                                                            ** Why Choose **
                                                            =================================================== -->
    <section class="why-choose padding-lg">
        <div class="container">
            <h2><span>The Numbers Say it All</span>Why Choose Us</h2>
            <ul class="our-strength">
                <li>
                    {{-- <div class="icon"><i class="fa fa-graduation-cap"></i></div> --}}
                    <span class="counter">{{ $counts['books'] ?? '' }}</span>
                    <div class="title">Certified Courses</div>
                </li>
                <li>
                    {{-- <div class="icon"><span class="fa fa-graduation-cap"></span></div> --}}
                    <span class="counter">{{ $counts['AllStudents'] ?? '' }}</span>
                    <div class="title">Students Enrolled </div>
                </li>
                <li>
                    {{-- <div class="icon"><span class="fa fa-graduation-cap">456</span></div> --}}
                    <span class="counter">{{ $counts['medicines'] ?? '' }}</span>
                    <div class="title">Tested Medicines</div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ==============================================
                                                            ** Testimonials **
                                                            =================================================== -->
    <section class="testimonial padding-lg">
        <div class="container">
            <div class="wrapper">
                <h2>Alumini Testimonials</h2>

                <ul class="testimonial-slide">
                    @foreach ($testimonials as $testimonial)
                        <li>
                            <p>
                                {{ \Illuminate\Support\Str::words($testimonial->content, 20, '...') }}
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
                            <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-circle"
                                style="width:70px; height:70px; object-fit:cover;" alt="{{ $testimonial->name }}" />
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
