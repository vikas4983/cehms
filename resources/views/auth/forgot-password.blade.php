@extends('layouts.frontend')
@section('title', 'Forgot Password')
@section('content')
    <style>
        body {
            height: 100vh;
            background: #f5f7fa;
        }

        .center-wrapper {

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .star {
            color: red;
        }

        .btn {
            width: 100%;
            margin-top: 10px;
        }

        .remember {
            margin-top: 10px;
        }

        .forgot {
            text-decoration: none;
            font-size: 14px;
        }
    </style>
    <div class="container">
        <div class="text-center" style="margin-top: 3rem">
            <h3>Login Now</h3>
        </div>
        <div class="center-wrapper">
            <div class="login-box" style="margin-top: 3rem;margin-bottom: 3rem;">
                <x-validation-errors class="mb-4" />
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600" style="color: green">
                        {{ $value }}
                    </div>
                @endsession
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="">
                        <h2>Email <span class="star">*</span></h2>
                        <input name="email" class="form-control" style="margin-top: 2rem" type="text"
                            placeholder="Enter Email">
                    </div>



                    <div class="text-center">
                        <button class="btn btn-primary" style="margin-top: 3rem">Password Rest Link</button>

                        <div class="my-2" style="margin-top: 2rem">or</div>

                        <a href="{{ route('login') }}" type="submit" style="margin-top: 2rem" formaction="register.html"
                            class="btn btn-outline-primary">
                            Login
                        </a>
                    </div>

                    <div class="remember text-center">
                        <a href="{{ route('student.register') }}" class="forgot">Create Account</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
