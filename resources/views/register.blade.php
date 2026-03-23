@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <section>
        <style>
            .star {
                color: red;
                font-weight: bold;
                font-size: 20px;
            }
        </style>
        <div class="container">
            <div class="text-center" style="margin-top: 3rem">
                <h3>Register Now</h3>
            </div>
            <div class="cnt-block">
                <div class="row padding-lg" style="margin-top: 0rem">
                    <div class="col-sm-12">
                        <form action="{{ route('student.store') }}" method="post" class="form-outer"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                @error('name')
                                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-sm-6">
                                    <h2>Name<span class="star"> *</span></h2>
                                    <input name="name" class=" form-control @error('name') is-invalid @enderror"
                                        type="text" placeholder="FULL NAME">

                                </div>
                                <div class="col-sm-6">
                                    @error('dob')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="date">
                                        <h2>Dob <span class="star">*</span></h2>
                                        <input type="date" name="dob"
                                            class=" form-control @error('dob') is-invalid @enderror" placeholder="DOB">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 clearfix">
                                    @error('mobile')
                                        <div class="invalid-feedback d-block text-danger ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span>
                                        <h2>Mobile Number <span class="star">*</span></h2><input name="country code"
                                            type="text" placeholder="+91" class="country-code" disabled>
                                    </span>
                                    <input name="mobile" type="text"
                                        class="phone-no form-control @error('mobile') is-invalid @enderror"
                                        placeholder="Enter 10 digit mobile" value="{{ old('mobile') }}" maxlength="10"
                                        inputmode="numeric"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)">

                                </div>
                                <div class="col-sm-6">
                                    @error('address')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                    <h2>Address</h2>
                                    <input name="address" class="form-control @error('address') is-invalid @enderror"
                                        type="text" placeholder="Address">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    @error('gender')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-left">
                                        <h2>Gender <span class="star">*</span></h2>
                                        <ul class="select-opt clearfix">
                                            <li>
                                                <input id="f-option" name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror"
                                                    value="male" type="radio">
                                                <label for="f-option">Male</label>
                                                <div class="check"></div>
                                            </li>
                                            <li>
                                                <input id="s-option" name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror"
                                                    value="male" type="radio">
                                                <label for="s-option">Female</label>
                                                <div class="check"></div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6  ">
                                    @error('qualification')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                    <h2>Qualification</h2>
                                    <input name="qualification"
                                        class="form-control @error('qualification') is-invalid @enderror" type="text"
                                        placeholder="Qualification" class="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    @error('father_name')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                    <h2>Father name</h2>
                                    <input name="father_name"
                                        class=" form-control @error('father_name') is-invalid @enderror" type="text"
                                        placeholder="father name">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    @error('image')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2> Student Photo</h2>
                                    <input name="image" class=" form-control @error('image') is-invalid @enderror"
                                        type="file">
                                    <div class="check"></div>


                                </div>
                                <div class="col-sm-4 clearfix">
                                    @error('10th_marksheet')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2>10th Marksheet</h2>
                                    <input name="10th_marksheet"
                                        class=" form-control @error('10th_marksheet') is-invalid @enderror" type="file">

                                    <div class="check"></div>

                                </div>
                                <div class="col-sm-4 clearfix">
                                    @error('12th_marksheet')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2>12th Marksheet</h2>
                                    <input name="12th_marksheet"
                                        class=" form-control @error('12th_marksheet') is-invalid @enderror"
                                        type="file">

                                    <div class="check"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    @error('email')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2> Email <span class="star">*</span></h2>
                                    <input id="f-option" class="form-control @error('email') is-invalid @enderror"
                                        name="email" type="text" placeholder="Enter Email">

                                    <div class="check"></div>

                                </div>
                                <div class="col-sm-4 clearfix">
                                    @error('password')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2> Password <span class="star">*</span></h2>
                                    <input id="f-option" class=" form-control @error('password') is-invalid @enderror"
                                        name="password" type="password" placeholder="Enter Password">

                                    <div class="check"></div>

                                </div>
                                <div class="col-sm-4 clearfix">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror

                                    <h2>Confirm Password <span class="star">*</span></h2>
                                    <input id="f-option"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" type="password"
                                        placeholder="Enter confirm password">
                                    <div class="check"></div>

                                </div>
                            </div>
                            <div class="button-outer text-center" style="margin-top: 3rem">
                                <button class="btn">Get Started Now &nbsp;&nbsp;&nbsp;<i
                                        class="fa fa-play-circle"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
