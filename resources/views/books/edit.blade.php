@extends('layouts.app')
@section('title', 'Book - Edit')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Book</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="{{ route('books.index') }}" class="text-secondary-light hover-text-primary hover-underline "> /
                        Book</a>
                    <span class="text-secondary-light">/ Edit Book</span>
                </div>
            </div>
            <a href="add-new-student.html" class="btn btn-primary-600 d-flex align-items-center gap-6 d-none">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Edit Book
            </a>
        </div>
        @include('alerts.alert')
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="mt-24" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Book Info</h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">
                                <div class=" col-sm-6">
                                    <div class="">
                                        <label for="name"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Book Name
                                            <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="name" value="{{ $book?->name ?? '' }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Enter book name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-sm-3">
                                    <div class="">
                                        <label for="image"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Book Image
                                        </label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="text-end">
                                            @if (!empty($book->image))
                                                <a href="{{ asset('storage/' . $book->image) }}" target="_blank"
                                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-2">
                                                    View
                                                </a>
                                                @endif
                                       </label>
                                        <input type="file" name="image" value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror" id="image"
                                            placeholder="Enter book image" >
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-sm-3">
                                    <div class="">
                                        <label for="pdf"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Upload Pdf
                                            Book
                                            <span class="text-danger-600">*</span> </label>
                                        <input type="file" name="pdf"
                                            class="form-control @error('pdf') is-invalid @enderror" id="pdf">
                                        @error('pdf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-sm-6">
                                    <div class="">
                                        <label for="publisher"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Publisher
                                            <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="publisher" value="{{ $book?->publisher ?? '' }}"
                                            class="form-control @error('publisher') is-invalid @enderror"
                                            placeholder="Enter publisher">
                                        @error('publisher')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="">
                                        <label for="status"
                                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8"><span
                                                class="text-danger-600">*</span>Status</label>
                                        <select id="status" name="status"
                                            class="form-control form-select @error('status') is-invalid @enderror">
                                            <option value="Select section" disabled>Select Status</option>
                                            <option value="1"
                                                {{ old('status', $book->status ?? '') == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', $book->status ?? '') == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
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
