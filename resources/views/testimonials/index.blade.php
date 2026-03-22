@extends('layouts.app')
@section('title', 'Testimonials')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add Testimonial </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Testimonials</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Testimonial
            </button>
        </div>
        @include('alerts.alert')
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div class="row mt-3 ">
                        @forelse ($testimonials as $testimonial)
                            <div class="col-sm-4 mb-3">
                                <div class="card text-center p-4 shadow-lg border-0 h-100 position-relative">
                                    <div class="position-absolute top-0 start-0 m-2">
                                        <button class="btn {{ $testimonial->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                            {{ $testimonial->status == 1 ? 'Active' : 'Inactive' }}
                                        </button>
                                    </div>
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl"
                                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                <li>
                                                    <button type="button"
                                                        class="editBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                        data-testimonial-id="{{ $testimonial->id }}"
                                                        data-testimonial-name="{{ $testimonial->name }}"
                                                        data-testimonial-content="{{ $testimonial->content }}"
                                                        data-testimonial-image="{{ $testimonial->image }}"
                                                        data-testimonial-status="{{ $testimonial->status }}">
                                                        <i class="ri-edit-2-line"></i>Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                        type="button" data-bs-toggle="modal"
                                                        data-testimonial-id="{{ $testimonial->id }}"
                                                        data-bs-target="#exampleModalDelete" id="bulkDeleteTrigger">
                                                        <i class="ri-delete-bin-6-line"></i>Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <img src="{{ $testimonial->image
                                        ? asset('storage/' . $testimonial->image)
                                        : asset('assets-frontend/images/default-testimonial.png') }}"
                                        class="rounded-circle mx-auto mb-3"
                                        style="width: 90px; height: 90px; object-fit: cover;" alt="">

                                    <span class="text-warning fs-3">❝</span>

                                    <h6 class="fw-bold mt-2">{{ $testimonial?->name ?? '' }}</h6>
                                    <small class="text-muted d-block mb-2">Software Engineer</small>

                                    <p class="text-muted small">
                                        {{ $testimonial?->content ?? '' }}
                                    </p>
                                </div>
                            </div>

                        @empty
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!-- Add sidebar start -->
        <div
            class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
            <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
                <h5 class="text-lg mb-0">Add Testimonial</h5>
                <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                    <i class="ri-close-large-line"></i>
                </button>
            </div>
            <form id="addTestimonial" action="{{ route('testimonials.store') }}" method="POST"
                class="d-flex flex-column p-20" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="testimonialName"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Name
                            </label>
                            <input type="text" name="name" class="form-control" id="testimonialName"
                                placeholder="Enter name">
                            <div class="invalid-feedback">
                                Name is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="testimonialImage"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Image
                            </label>
                            <input type="file" name="image" class="form-control" id="testimonialImage">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="status" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                            </label>
                            <select id="status" name="status" class="form-control form-select">
                                <option value="Select a Class" disabled>Select One</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="">
                            <label for="testimonialContent"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Content
                            </label>
                            <textarea name="content" class="form-control" id="testimonialContent" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">
                                Testimonial content is required
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                            <button type="submit"
                                class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8 max-w-156-px w-100">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Add sidebar end -->

        <!-- Edit sidebar start -->
        <div
            class="edit-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
            <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
                <h5 class="text-lg mb-0">Edit Testimonial </h5>
                <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                    <i class="ri-close-large-line"></i>
                </button>
            </div>
            <form id="editTestimonialForm" method="POST" class="d-flex flex-column p-20" enctype="multipart/form-data">
                <input type="hidden" name="id" id="editTestimonialId">
                @csrf
                @method('PATCH')
                <div class="row g-3">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="">
                                <label for="edittestimonialName"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                    Name
                                </label>
                                <input type="text" id="editTestimonialName" name="name" class="form-control"
                                    placeholder="Enter Name">
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <label for="editTestimonialImage"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Image
                                </label>
                                <input type="file" name="image" class="form-control" id="editTestimonialImage">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <label for="status"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                                </label>
                                <select id="editTestimonialStatus" name="status" class="form-control form-select">
                                    <option value="Select a Class" disabled>Select One</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="">
                                <label for="editTestimonialContent"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Content
                                </label>
                                <textarea name="content" class="form-control" id="editTestimonialContent" cols="30" rows="10"></textarea>
                                <div class="invalid-feedback">
                                    Testimonial content is required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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

        <!-- Edit sidebar end -->


        <!-- Modal Delete Event start -->
        <div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog modal-dialog-centered max-w-340-px">
                <div class="modal-content radius-16 bg-base">
                    <div class="modal-body pt-32 px-36 pb-24 text-center">
                        <span class="mb-16 fs-1 line-height-1 text-danger">
                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                        </span>
                        <h6 class="text-lg fw-semibold text-primary-light mb-0">Are your sure you want to delete
                        </h6>
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="reset"
                                class="flex-grow-1 border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-24 py-11 radius-8"
                                data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <form id="deletetestimonialForm" method="POST" action="">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                {{-- @method('DELETE') --}}
                                <button type="submit"
                                    class="deleteBtn flex-grow-1 btn btn-primary-600 border border-primary-600 text-md px-16 py-12 radius-8">
                                    Yes, Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete Event end -->



        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // =========================
                // EDIT BUTTON CLICK
                // =========================
                document.addEventListener('click', function(e) {

                    const editBtn = e.target.closest('.editBtn');
                    if (!editBtn) return; // Agar editBtn nahi hai to kuch mat karo

                    const id = editBtn.getAttribute('data-testimonial-id');
                    const name = editBtn.getAttribute('data-testimonial-name');
                    const image = editBtn.getAttribute('data-testimonial-image');
                    const content = editBtn.getAttribute('data-testimonial-content');
                    const status = editBtn.getAttribute('data-testimonial-status');
                    const sidebar = document.querySelector('.edit-sidebar');

                    if (sidebar) {
                        sidebar.classList.add('active-translate-0');
                    }

                    // Set form values
                    const testimonialIdInput = document.getElementById('editTestimonialId');
                    const testimonialNameInput = document.getElementById('editTestimonialName');
                    const testimonialImageInput = document.getElementById('editTestimonialImage');
                    const testimonialContentInput = document.getElementById('editTestimonialContent');
                    const testimonialStatusInput = document.getElementById('editTestimonialStatus');

                    const form = document.getElementById('editTestimonialForm');

                    if (testimonialIdInput) testimonialIdInput.value = id;
                    if (testimonialNameInput) testimonialNameInput.value = name;
                    if (testimonialContentInput) testimonialContentInput.value = content;
                    if (testimonialStatusInput) testimonialStatusInput.value = String(status);

                    if (form) {
                        form.action = "{{ route('testimonials.update', ':id') }}".replace(':id', id);
                    }

                });


                // =========================
                // DELETE MODAL
                // =========================
                const exampleModal = document.getElementById('exampleModalDelete');

                if (exampleModal) {
                    exampleModal.addEventListener('show.bs.modal', function(e) {

                        const button = e.relatedTarget;
                        if (!button) return;

                        const testimonialId = button.getAttribute('data-testimonial-id');
                        const form = document.getElementById('deletetestimonialForm');

                        if (form) {
                            form.action = "{{ route('testimonials.destroy', ':id') }}".replace(':id',
                                testimonialId);
                        }

                    });
                }

            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function validatetestimonial(formId, inputId) {
                    const form = document.getElementById(formId);
                    if (!form) return;
                    form.addEventListener('submit', function(e) {
                        const input = document.getElementById(inputId);
                        if (!input) return;
                        const value = input.value.trim();
                        // Reset previous validation state
                        input.classList.remove('is-invalid');
                        if (value === '') {
                            e.preventDefault(); // form submit rok do
                            input.classList.add('is-invalid');
                            input.focus();
                            return false;
                        }

                    });
                    // Optional: real-time validation remove kare jab user type kare
                    const input = document.getElementById(inputId);
                    if (input) {
                        input.addEventListener('input', function() {
                            if (input.value.trim() !== '') {
                                input.classList.remove('is-invalid');
                            }
                        });
                    }
                }
                // Apply validation
                validatetestimonial('addTestimonial', 'testimonialName');
                validatetestimonial('addTestimonial', 'testimonialContent');
                validatetestimonial('editTestimonialForm', 'editTestimonialName');
                validatetestimonial('editTestimonialForm', 'editTestimonialContent');

            });
        </script>
        {{-- <script>
        const selectAll = document.querySelector('.selectAllCb')
        const selectOne = document.querySelectorAll('.permissionCheckbox')
        selectAll.addEventListener('change', function() {
            if (selectAll.checked) {
                selectOne.forEach(cb => {
                    cb.checked = true;
                });
            } else {
                selectOne.forEach(cb => {
                    cb.checked = false;
                });
            }
        });
        selectOne.forEach(cb => {
            cb.addEventListener('change', function() {
                if (!this.checked) {
                    selectAll.checked = false;
                }

            });
        });
    </script> --}}
        {{-- <script>
            const testimonialContent = document.querySelector('#testimonialContent');
            if (testimonialContent) {
                testimonialContent.addEventListener('click', function() {
                    this.value = '';
                });
            }
        </script> --}}
    @endsection
