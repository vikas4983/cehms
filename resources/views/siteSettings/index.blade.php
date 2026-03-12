@extends('layouts.app')
@section('title', 'Setting - General')
@section('content')
    <style>
        .hover-zoom img {
            transition: transform 0.3s ease;
        }

        .hover-zoom img:hover {
            transform: scale(4);
            /* image becomes 2x bigger */
            z-index: 10;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">General </h1>
                <div class="">
                    <a href="index.html" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="general.html" class="text-secondary-light hover-text-primary hover-underline "> /
                        Settings</a>
                    <span class="text-secondary-light">/ General</span>
                </div>
            </div>
            {{-- <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add General
            </button> --}}
        </div>
        @include('alerts.alert')
        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body">
                <form action="{{ route('siteSettings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full
                                    Name <span class="text-danger-600">*</span></label>
                                <input type="text" name="name" value="{{ $setting->name ?? '' }}"
                                    class="form-control radius-8 @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter full name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                    <span class="text-danger-600">*</span></label>
                                <input type="email" name="email" value="{{ $setting->email ?? '' }}"
                                    class="form-control radius-8 @error('name') is-invalid @enderror" id="email"
                                    placeholder="Enter email address">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Landline
                                    Number</label>
                                <input type="text" name="landline" value="{{ $setting->landline ?? '' }}"
                                    class="form-control radius-8" id="number" placeholder="Enter landline number"
                                    maxlength="12" placeholder="0167-7896541" pattern="\d{4}-\d{7}" inputmode="numeric"
                                    oninput="
        this.value = this.value
        .replace(/[^0-9-]/g, '')
        .replace(/(\d{4})(\d)/, '$1-$2')
        .replace(/(-.*)-/g, '$1');
    "
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Primary
                                    Number<span class="text-danger-600"> *</span></label>
                                <input type="text" name="primary_number" value="{{ $setting->primary_number ?? '' }}"
                                    class="form-control radius-8 @error('name') is-invalid @enderror" id="number"
                                    placeholder="Enter primary number" maxlength="10" pattern="\d{10}" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                @error('primary_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Secondary
                                    Number</label>
                                <input type="text" name="secondary_number" value="{{ $setting->secondary_number ?? '' }}"
                                    class="form-control radius-8" id="number" placeholder="Enter secondary number"
                                    maxlength="10" pattern="\d{10}" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="Website" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Website <span class="text-danger-600"> *</span></label>
                                <input type="text" name="website" value="{{ $setting->website ?? '' }}"
                                    class="form-control radius-8" id="Website" placeholder="Website URL">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="country" class="form-label fw-semibold text-primary-light text-sm mb-8">Country
                                    <span class="text-danger-600">*</span> </label>
                                <input type="text" name="country" value="{{ $setting->country ?? '' }}"
                                    class="form-control radius-8 @error('country') is-invalid @enderror" id="country"
                                    placeholder="Enter country name">
                                @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="state" class="form-label fw-semibold text-primary-light text-sm mb-8">State
                                    <span class="text-danger-600">*</span> </label>
                                <input type="text" name="state" value="{{ $setting->state ?? '' }}"
                                    class="form-control radius-8 @error('state') is-invalid @enderror" id="state"
                                    placeholder="Enter state name">
                                @error('state')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">City
                                    <span class="text-danger-600">*</span> </label>
                                <input type="text" name="city" value="{{ $setting->city ?? '' }}"
                                    class="form-control radius-8 @error('city') is-invalid @enderror" id="city"
                                    placeholder="Enter city name">
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="zip" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Zip
                                    Code </label>
                                <input type="text" name="zip" value="{{ $setting->zip ?? '' }}"
                                    class="form-control radius-8" id="zip" minlength="6" maxlength="8"
                                    pattern="\d{6}|\d{8}" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="instagram" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Instragram </label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}"
                                    class="form-control radius-8" id="instagram" placeholder="Enter instagram handle">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="youtube" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Youtube </label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}"
                                    class="form-control radius-8" id="youtube" placeholder="Enter youtube handle">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="google" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Google </label>
                                <input type="text" name="google" value="{{ $setting->google ?? '' }}"
                                    class="form-control radius-8" id="google" placeholder="Enter google handle">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="facebook" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Facebook </label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}"
                                    class="form-control radius-8" id="facebook" placeholder="Enter facebook handel">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="map" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Google Map</label>
                                <input type="text" name="map" value="{{ $setting->map ?? '' }}"
                                    class="form-control radius-8" id="map" placeholder="Enter google map address">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="mb-20">
                                <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Address <span class="text-danger-600">*</span></label>
                                <input type="text" name="address" value="{{ $setting->address ?? '' }}"
                                    class="form-control radius-8 @error('address') is-invalid @enderror" id="address"
                                    placeholder="Enter address">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="admission_form"
                                class="form-label fw-semibold text-secondary-light text-md mb-8">Admission Form <span
                                    class="text-secondary-light fw-normal @error('admission_form') is-invalid @enderror">(Only
                                    Pdf)</span>
                                @if (!empty($setting->admission_form))
                                    <a href="{{ route('form.admission', ['path' => $setting->admission_form]) }}"
                                        target="_blanck">View Form</a>
                                @endif
                            </label>
                            <input type="file" name="admission_form" class="form-control radius-8"
                                id="admission_form">
                            @error('admission_form')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center">
                                    <div class="hover-zoom">
                                        <img src="{{ asset('storage/' . $setting->favicon) }}"
                                            style="width:50px; height:50px;" alt="">
                                    </div>
                                </div>
                                <label for="imageUpload"
                                    class="form-label fw-semibold text-secondary-light text-md mb-8">Favicon <span
                                        class="text-secondary-light fw-normal @error('favicon') is-invalid @enderror ">(140px
                                        X 140px)</span></label>
                                <input type="file" name="favicon" class="form-control radius-8" id="imageUpload">
                                @error('favicon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center">
                                    <div class="hover-zoom">
                                        <img src="{{ asset('storage/' . $setting->logo) }}"
                                            style="width:50px; height:50px;" alt="">
                                    </div>
                                </div>
                                <label for="imageUploadTwo"
                                    class="form-label fw-semibold text-secondary-light text-md mb-8">Logo <span
                                        class="text-secondary-light fw-normal @error('logo') is-invalid @enderror">(2000px
                                        X 590px)</span></label>
                                <input type="file" name="logo" class="form-control radius-8" id="imageUploadTwo">
                                @error('logo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="submit"
                                class="btn btn-primary-600 border border-primary-600 text-md px-24 py-12 radius-8">
                                Save Change
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // ================== Image Upload Js Start ===========================
        function readURL(input, previewElementId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewElementId).css('background-image', 'url(' + e.target.result + ')');
                    $('#' + previewElementId).hide();
                    $('#' + previewElementId).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this, 'previewImage1');
        });

        $("#imageUploadTwo").change(function() {
            readURL(this, 'previewImage2');
        });
        // ================== Image Upload Js End ===========================
    </script>
@endsection
