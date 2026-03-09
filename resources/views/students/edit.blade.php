@extends('layouts.app')
@section('title', 'Student - Add')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Student</h1>
                <div class="">
                    <a href="index.html" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="student-list.html" class="text-secondary-light hover-text-primary hover-underline "> /
                        Student</a>
                    <span class="text-secondary-light">/ Edit Student</span>
                </div>
            </div>
            <a href="add-new-student.html" class="btn btn-primary-600 d-flex align-items-center gap-6 d-none">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Edit Student
            </a>
        </div>
        @include('alerts.alert')
        <form action="{{ auth()->user()->hasRole('admin') ? route('students.update', $student->id) : route('profile.update') }}" method="POST" class="mt-24"
            enctype="multipart/form-data">
            @csrf
           @if(auth()->user()->hasRole('admin'))
                @method('PATCH')
           @endif
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
                                        <input type="text" name="name" value="{{ $student?->name ?? '' }}"
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
                                                {{ old('gender', $student->gender ?? '') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ old('gender', $student->gender ?? '') == 'Female' ? 'selected' : '' }}>
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
                                            Birth </label> <span
                                                class="text-danger-600">*</span>
                                        <input type="date" name="dob"
                                            value="{{ old('dob', \Carbon\Carbon::parse($student->getRawOriginal('dob'))->format('Y-m-d')) }}"
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
                                        <input type="text" name="mobile" value="{{ $student?->mobile ?? '' }}"
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
                                        <input type="text" name="address" value="{{ $student?->address ?? '' }}"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            placeholder="Enter your address">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                @role('admin')
                                 <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="practitioner_registration"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Practitioner
                                            Registration No.
                                        </label>
                                        <input type="text" name="practitioner_registration"
                                            value="{{ $student?->practitioner_registration ?? '' }}"
                                            class="form-control @error('practitioner_registration') is-invalid @enderror"
                                            id="practitioner_registration"
                                            placeholder="Enter your practitioner registration no.">
                                        @error('practitioner_registration')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="">
                                        <label for="others"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Other
                                            Information
                                        </label>
                                        <input type="text" name="others" value="{{ $student?->others ?? '' }}"
                                            class="form-control @error('others') is-invalid @enderror" id="other"
                                            placeholder="Enter your others informations">
                                        @error('others')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="qualification"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Qualification
                                        </label>
                                        <input type="text" name="qualification"
                                            value="{{ $student?->qualification ?? '' }}"
                                            class="form-control @error('qualification') is-invalid @enderror"
                                            id="qualification" placeholder="Enter your qualification">
                                        @error('qualification')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                               @endrole
                                <div class="col-xxl-3 col-xl-4 col-sm-4">
                                    <div class="">
                                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Student
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
                                <div class="col-xxl-3 col-xl-4 col-sm-4">
                                    <div class="">
                                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">10th Marksheet
                                            
                                        </label>
                                        <div>
                                            <input type="file" name="10th_marksheet"
                                                class="@error('10th_marksheet') is-invalid @enderror ">
                                            @error('10th_marksheet')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-4">
                                    <div class="">
                                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">12th Marksheet
                                        </label>
                                        <div>
                                            <input type="file" name="12th_marksheet"
                                                class="@error('12th_marksheet') is-invalid @enderror ">
                                            @error('12th_marksheet')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                              @can('change student status')
                                <div class="col-sm-3">
                                    <div class="">
                                        <label for="status"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status <span
                                                class="text-danger-600">*</span></label>
                                        <select id="status" name="status"
                                            class="form-control form-select @error('status') is-invalid @enderror">
                                            <option value="Select section" disabled>Select Status</option>
                                            <option value="1"
                                                {{ old('status', $student->status ?? '') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', $student->status ?? '') == '0' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                              @endcan
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Parent & Guardian Info </h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="">
                                        <label for="fathersName"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Fathers
                                            Name </label>
                                        <input type="text" name="father_name"
                                            value="{{ $student?->father_name ?? '' }}" class="form-control"
                                            id="fathersName" placeholder="Enter Fathers Name">
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
                                        <input type="email" name="email" value="{{ $student?->email ?? '' }}"
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
                                                value="{{ $student?->password ?? '' }}"
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
                                                value="{{ $student?->password ?? '' }}"
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
                        {{-- <button type="reset"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                            Cancel
                        </button> --}}
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
