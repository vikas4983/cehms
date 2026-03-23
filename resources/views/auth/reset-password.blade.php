@extends('layouts.frontend')
@section('title', 'Password Reset')
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
            <h3>Password Reset</h3>
        </div>
        <div class="center-wrapper">
            <div class="login-box" style="margin-top: 3rem;margin-bottom: 3rem;">
                <x-validation-errors class="mb-4" />
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600" style="color: green">
                        {{ $value }}
                    </div>
                @endsession
                <form action="{{ route('password.update') }}" method="post">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    @csrf
                    <div class="">
                        <h2>Email <span class="star">*</span></h2>
                        <input name="email" value="{{ old('email', $request->email) }}" class="form-control"
                            style="margin-top: 2rem" type="text" placeholder="Enter Email">
                    </div>

                    <div class="">
                        <h2 style="margin-top: 2rem">Password <span class="star">*</span></h2>
                        <input name="password" class="form-control" style="margin-top: 2rem" type="password"
                            placeholder="Enter Password">
                    </div>
                    <div class="">
                        <h2 style="margin-top: 2rem">Confirm Password <span class="star">*</span></h2>
                        <input name="password_confirmation" class="form-control" style="margin-top: 2rem" type="password"
                            placeholder="Enter Confirm Password">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" style="margin-top: 3rem">Upadte Password</button>

                        <div class="my-2" style="margin-top: 2rem">or</div>

                        <a href="{{ route('login') }}" type="submit" style="margin-top: 2rem" formaction="register.html"
                            class="btn btn-outline-primary">
                            Login
                        </a>
                    </div>

                    <div class="remember text-center">
                        <a href="{{ route('student.register') }}" class="forgot">Create Account?</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
