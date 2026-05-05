@extends('layouts.app')
@section('title', 'Banner - Edit')

@section('content')
    <div class="dashboard-main-body">

        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Banner</h1>
                <div>
                    <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">
                        Dashboard
                    </a> /
                    <a href="{{ route('banners.index') }}" class="text-secondary-light hover-text-primary hover-underline">
                        Banners
                    </a>
                    <span class="text-secondary-light">/ Edit Banner</span>
                </div>
            </div>
        </div>

        @include('alerts.alert')

        <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="shadow-1 radius-12 bg-base overflow-hidden">

                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Banner Info</h6>
                </div>

                <div class="card-body p-20">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="text-sm fw-semibold text-primary-light mb-8">Upload New Banner</label>
                                <input type="file" name="banner"
                                    class="form-control @error('banner') is-invalid @enderror">
                                @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="text-sm fw-semibold text-primary-light mb-8">Order</label>
                                <input type="text" name="order" value="{{ old('order', $banner->order) }}"
                                    class="form-control @error('order') is-invalid @enderror" placeholder="Enter order">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="text-sm fw-semibold text-primary-light mb-8">Status</label>
                                <select name="status"
                                    class="form-control form-select @error('status') is-invalid @enderror">

                                    <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center ">
                                <button type="submit"
                                    class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                        <!-- RIGHT SIDE : BANNER -->
                        <div class="col-lg-6">
                            <div class="text-center position-relative">
                                <span class="position-absolute top-0 start-0 m-2 badge bg-primary">
                                    {{ $banner->order }}
                                </span>
                                <figure class="overflow-hidden rounded" style="height:180px;">
                                    <img src="{{ asset('storage/' . $banner->banner) }}"
                                        class="w-100 h-100 object-fit-cover" alt="Banner Image">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
