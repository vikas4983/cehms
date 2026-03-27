@extends('layouts.app')
@section('title', 'Student - Edit')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Student</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="{{ route('enquiries.index') }}" class="text-secondary-light hover-text-primary hover-underline ">
                        /
                        Students</a>
                    <span class="text-secondary-light">/ Edit Student</span>
                </div>
            </div>
            <a href="add-new-oldStudent.html" class="btn btn-primary-600 d-flex align-items-center gap-6 d-none">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Edit Student
            </a>
        </div>
        @include('alerts.alert')
        <form action="{{ route('oldStudents.update', $oldStudent->id) }}" method="POST" class="d-flex flex-column p-20">
            @csrf
            @method('PATCH')
            <div class="row g-3 shadow-1 radius-12 bg-base h-100 overflow-hidden">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">First Name</label>
                        <input type="text" id="editOldStudentFName" name="first_name"
                            value="{{ old('first_name', $oldStudent->first_name) }}"
                            class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="Enter student first name">

                        <div class="invalid-feedback">
                            First name is required
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Last Name</label>
                        <input type="text" id="editOldStudentLName" name="last_name"
                            value="{{ old('last_name', $oldStudent->last_name) }}"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="Enter student last name">

                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Registration Date -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Registration Date</label>
                        <input type="date" id="editOldStudentRDate" name="registration_date"
                            value="{{ old('registration_date', \Carbon\Carbon::parse($oldStudent->registration_date)->format('Y-m-d')) }}"
                            class="form-control @error('registration_date') is-invalid @enderror">
                    </div>

                    <!-- Valid From -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Valid From</label>
                        <input type="date" id="editOldStudentVFrom" name="valid_from"
                            value="{{ old('registration_date', \Carbon\Carbon::parse($oldStudent->valid_from)->format('Y-m-d')) }}"
                            class="form-control @error('valid_from') is-invalid @enderror">
                    </div>

                    <!-- Father Name -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Father Name</label>
                        <input type="text" id="editOldStudentFatherName" name="father_name"
                            value="{{ old('father_name', $oldStudent->father_name) }}"
                            class="form-control @error('father_name') is-invalid @enderror" placeholder="Enter father name">


                    </div>

                    <!-- Address -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Address</label>
                        <input type="text" id="editOldStudentAddress" name="address"
                            value="{{ old('address', $oldStudent->address) }}"
                            class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Course -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Course</label>
                        <input type="text" id="editOldStudentCourse" name="course"
                            value="{{ old('course', $oldStudent->course) }}"
                            class="form-control @error('course') is-invalid @enderror" placeholder="Enter Course">


                    </div>

                    <!-- City -->
                    <div class="col-sm-6 mt-3">
                        <label class="text-sm fw-semibold text-primary-light mb-2">City</label>
                        <input type="text" id="editOldStudentCity" name="city"
                            value="{{ old('city', $oldStudent->city) }}"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Enter City name">

                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="submit"
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8 max-w-156-px w-100">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
