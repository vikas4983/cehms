@extends('layouts.app')
@section('title', 'News - Edit')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit News</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    @can('view-news')
                        <a href="{{ route('news.index') }}" class="text-secondary-light hover-text-primary hover-underline "> /
                            News</a>
                    @endcan
                    <span class="text-secondary-light">/ Edit News</span>
                </div>
            </div>
            <a href="add-new-student.html" class="btn btn-primary-600 d-flex align-items-center gap-6 d-none">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Edit News
            </a>
        </div>
        @include('alerts.alert')
        <form action="{{ route('news.update', $news->id) }}" method="POST" class="mt-24" enctype="multipart/form-data">
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
                                <div class=" col-sm-9">
                                    <div class="">
                                        <label for="title"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">News Title
                                            <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="title" value="{{ $news?->title ?? '' }}"
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            placeholder="Enter news title">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                @can('change-news-status')
                                    <div class="col-sm-3">
                                        <div class="">
                                            <label for="status"
                                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8"><span
                                                    class="text-danger-600">*</span>Status</label>
                                            <select id="status" name="status"
                                                class="form-control form-select @error('status') is-invalid @enderror">
                                                <option value="Select section" disabled>Select Status</option>
                                                <option value="1"
                                                    {{ old('status', $news->status ?? '') == '1' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $news->status ?? '') == '0' ? 'selected' : '' }}>Inactive
                                                </option>

                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endcan

                                <div class=" col-sm-9">
                                    <div class="">
                                        <label for="description"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Description
                                        </label>
                                        <input type="text" name="description" value="{{ $news?->description ?? '' }}"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter description">

                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-sm-3">
                                    <div class="">
                                        <label for="file"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Upload File
                                        </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <a href="{{ asset('storage/' . $news->file) }}" target="_blank"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">View News</a>
                                        <input type="file" name="file" accept="application/pdf"
                                            class="form-control @error('file') is-invalid @enderror">

                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                                        <button type="reset"
                                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
