@extends('layouts.frontend')
@section('title', 'Testimonials')
@section('content')
    <section class="testimonial-outer padding-lg mt-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mt-1">
                        <h2 class="fw-bold">Trusted by Patients</h2>
                        <p class="text-muted">
                            Electro Homoeopathy is helping people improve their health naturally.
                            Here’s what our patients have to say about their experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- ==============================================
                                                        **Testimonial**
                                                        =================================================== -->
        <section class="testimonial-outer padding-lg mb-5">
            <div class="container">
                <ul class="row testimonials g-4">
                    @forelse ($testimonials as $testimonial)
                        <li class="col-md-4 grid-item">
                            <div class="quotblock text-center p-4 shadow-sm h-100">

                                <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets-frontend/images/default-testimonial.png') }}"
                                    class="rounded-circle mx-auto d-block mb-3"
                                    style="width: 140px; height: 140px; object-fit: cover;">
                                <h5 class="fw-bold">{{ $testimonial->name }}</h5>
                                <span class="mt-3 d-inline-block" style="color: #FFC107; font-size:3rem;">
                                    ❝
                                </span>
                                <p class="text-muted">
                                    {{Str::words($testimonial?->content ?? '') }}
                                </p>

                            </div>
                        </li>
                    @empty
                    @endforelse

                </ul>
                <div class="d-flex justify-content-center mt-5">
                    {{ $testimonials->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    @endsection
