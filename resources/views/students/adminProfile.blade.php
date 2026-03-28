@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit {{ucfirst(auth()->user()->name) ?? ''}}</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light"> / Edit Admin</span>
                </div>
            </div>
        </div>
        @include('alerts.alert')
        <form
            action="{{route('students.update', $admin->id) }}"
            method="POST" class="mt-24" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
           
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Personal Info</h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="name"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Full Name
                                            <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="name" value="{{ $admin?->name ?? '' }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Enter your Full Name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="gender"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8"> Gender <span
                                                class="text-danger-600">*</span></label>
                                        <select id="gender" name="gender"
                                            class="form-control form-select @error('gender') is-invalid @enderror "
                                            min-length="10" max-length="12">
                                            <option value="" disabled>Select Gender</option>
                                            <option value="Male"
                                                {{ old('gender', $admin->gender ?? '') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ old('gender', $admin->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="dob"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Date Of
                                            Birth </label> <span class="text-danger-600">*</span>
                                        <input type="date" name="dob"
                                            value="{{ old('dob', \Carbon\Carbon::parse($admin->getRawOriginal('dob'))->format('Y-m-d')) }}"
                                            class="form-control @error('dob') is-invalid @enderror" id="dateOfBirth">
                                        @error('dob')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="phoneNumber"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone
                                            Number <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="mobile" value="{{ $admin?->mobile ?? '' }}"
                                            class="form-control @error('mobile') is-invalid @enderror"
                                            placeholder="Enter your Phone Number" maxlength="12"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        @error('mobile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="address"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Address
                                        </label>
                                        <input type="text" name="address" value="{{ $admin?->address ?? '' }}"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            placeholder="Enter your address">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-sm-4">
                                    <div class="">
                                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Admin
                                            Photo
                                        </label>
                                        <div>
                                            <input type="file" name="image"
                                                class="@error('image') is-invalid @enderror ">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-xl-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Login Details</h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">
                                <div class="col-sm-4">
                                    <div class="">
                                        <label for="myEmail"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Email
                                            <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="email" name="email" value="{{ $admin?->email ?? '' }}"
                                            class="form-control @error('email') is-invalid @enderror " id="myEmail"
                                            placeholder="Enter Email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <label for="your-password"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Password
                                            <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" name="password" id="your-password"
                                                value="{{ $admin?->password ?? '' }}"
                                                class="form-control @error('password') is-invalid @enderror "
                                                placeholder="Enter your password">
                                            <span
                                                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                                data-toggle="#your-password"></span>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <label for="confirm-password"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Confirm
                                            Password
                                            <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" name="password_confirmation" id="confirm-password"
                                                value="{{ $admin?->password ?? '' }}"
                                                class="form-control @error('password_confirmation') is-invalid @enderror  "
                                                placeholder="Enter confirm password">
                                            <span
                                                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                                data-toggle="#confirm-password"></span>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                       <button type="submit"
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
