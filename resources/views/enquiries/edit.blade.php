@extends('layouts.app')
@section('title', 'Enquiry - Edit')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Enquiry</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="{{ route('enquiries.index') }}" class="text-secondary-light hover-text-primary hover-underline ">
                        /
                        Enquiries</a>
                    <span class="text-secondary-light">/ Edit Enquiry</span>
                </div>
            </div>
            <a href="add-new-enquiry.html" class="btn btn-primary-600 d-flex align-items-center gap-6 d-none">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Edit Enquiry
            </a>
        </div>
        @include('alerts.alert')
        <form action="{{ route('enquiries.update', $enquiry->id) }}" method="POST" class="d-flex flex-column p-20">
            @csrf
            @method('PATCH')
            <div class="row g-3 shadow-1 radius-12 bg-base h-100 overflow-hidden">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="editEnquiryName" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Name
                            </label>
                            <input type="text" id="editEnquiryName" value="{{ old('name', $enquiry->name) }}"
                                name="name" class="form-control" placeholder="Enter enquiry Name">
                            <div class="invalid-feedback">
                                Enquiry name is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="editEnquiryEmail"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Email
                            </label>
                            <input type="text" id="editEnquiryEmail" value="{{ old('email', $enquiry->email) }}"
                                name="email" class="form-control" placeholder="Enter email">
                            <div class="invalid-feedback">
                                Email is required
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="">
                            <label for="editEnquirMobile"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Number
                            </label>
                            <input type="text" id="editEnquiryMobile" name="mobile" class="form-control"
                                placeholder="Enter mobile number" value="{{ old('mobile', $enquiry->mobile) }}"
                                maxlength="10" inputmode="numeric"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)">
                            <div class="invalid-feedback">
                                Mobile number is required
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
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
