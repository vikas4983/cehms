@extends('layouts.app')
@section('title', 'Cms Page')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ CmsPages</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Cms Page
            </button>
        </div>
        @include('alerts.alert')
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div class="row mt-3 ">
                        @forelse ($cmsPages as $cms)
                            <div class="col-sm-6 mb-3">
                                <div class="card text-center p-4 shadow-lg border-0 h-100 position-relative"
                                    style="margin-left:1rem ">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl"
                                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                @can('edit-cms')
                                                    <li>
                                                        <button type="button"
                                                            class="editBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            data-cms-id="{{ $cms->id }}"
                                                            data-cms-title="{{ $cms->title }}"
                                                            data-cms-content="{{ $cms->content }}"
                                                            data-cms-meta-title="{{ $cms->meta_title }}"
                                                            data-cms-meta-description="{{ $cms->meta_description }}"
                                                            data-cms-status="{{ $cms->status }}">
                                                            <i class="ri-edit-2-line"></i>Edit
                                                        </button>
                                                    </li>
                                                @endcan
                                                @can('delete-cms')
                                                    <li>
                                                        <button
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            type="button" data-bs-toggle="modal"
                                                            data-cms-id="{{ $cms->id }}"
                                                            data-bs-target="#exampleModalDelete" id="bulkDeleteTrigger">
                                                            <i class="ri-delete-bin-6-line"></i>Delete
                                                        </button>
                                                    </li>
                                                @endcan


                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mt-2">{{ $cms?->title ?? '' }}</h6>
                                    <p class="text-muted small">
                                        {{ $cms?->content ?? '' }}
                                    </p>
                                </div>
                            </div>

                        @empty
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
        <!-- Add sidebar start -->
        <div
            class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
            <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
                <h5 class="text-lg mb-0">Add cms</h5>
                <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                    <i class="ri-close-large-line"></i>
                </button>
            </div>
            <form id="addCms" action="{{ route('cms.store') }}" method="POST" class="d-flex flex-column p-20"
                enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="cmsTitle" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Title
                            </label>
                            <input type="text" name="title" class="form-control" id="cmsTitle"
                                placeholder="Enter title">
                            <div class="invalid-feedback">
                                Title is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="cmsMetaTitle"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Meta Title
                            </label>
                            <input type="text" name="meta_title" class="form-control" id="cmsMetaTitle"
                                placeholder="Enter meta title">
                            <div class="invalid-feedback">
                                Enter meta title is required
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="">
                            <label for="cmsImage" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Image
                            </label>
                            <input type="file" name="image" class="form-control" id="cmsImage">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="">
                            <label for="cmsMetaDescription"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Meta Description
                            </label>
                            <input type="text" name="meta_description" class="form-control" id="cmsMetaDescription"
                                placeholder="Enter meta description">
                            <div class="invalid-feedback">
                                Enter meta description is required
                            </div>
                        </div>
                    </div>
                    @can('change-cms-status')
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
                    @endcan
                    <div class="col-sm-12">
                        <div class="">
                            <label for="cmsContent"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Content
                            </label>
                            <textarea name="content" class="form-control" id="cmsContent" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">
                                Cms content is required
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
    </div>
    <!-- Add sidebar end -->

    <!-- Edit sidebar start -->
    <div
        class="edit-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Edit cms </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editCmsForm" method="POST" class="d-flex flex-column p-20" enctype="multipart/form-data">
            <input type="hidden" name="id" id="editCmsId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="editCmsTitle" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Title
                            </label>
                            <input type="text" id="editCmsTitle" name="title" class="form-control"
                                placeholder="Enter Name">
                            <div class="invalid-feedback">
                                Enter title is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="cmsMetaTitle"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Meta Title
                            </label>
                            <input type="text" name="meta_title" class="form-control" id="editCmsMetaTitle"
                                placeholder="Enter meta title">
                            <div class="invalid-feedback">
                                Enter meta title is required
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="">
                            <label for="cmsImage" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Image
                            </label>
                            <input type="file" name="image" class="form-control" id="cmsImage">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="">
                            <label for="cmsMetaDescription"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Meta Description
                            </label>
                            <input type="text" name="meta_description" class="form-control"
                                id="editCmsMetaDescription" placeholder="Enter meta description">
                            <div class="invalid-feedback">
                                Enter meta description is required
                            </div>
                        </div>
                    </div>
                    @can('change-cms-status')
                        <div class="col-sm-4">
                            <div class="">
                                <label for="status"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                                </label>
                                <select id="status" name="status" class="form-control form-select">
                                    <option value="Select a Class" disabled>Select One</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    @endcan
                    <div class="col-sm-12">
                        <div class="">
                            <label for="editcmsContent"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Content
                            </label>
                            <textarea name="content" class="form-control" id="editcmsContent" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">
                                Cms content is required
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
                        <form id="deleteCmsForm" method="POST" action="">
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

                const id = editBtn.getAttribute('data-cms-id');
                const title = editBtn.getAttribute('data-cms-title');
                const metaTitle = editBtn.getAttribute('data-cms-meta-title');
                const metaDescription = editBtn.getAttribute('data-cms-meta-description');
                const content = editBtn.getAttribute('data-cms-content');
                const status = editBtn.getAttribute('data-cms-status');
                const sidebar = document.querySelector('.edit-sidebar');

                if (sidebar) {
                    sidebar.classList.add('active-translate-0');
                }

                // Set form values
                const cmsIdInput = document.getElementById('editCmsId');
                const cmsTitleInput = document.getElementById('editCmsTitle');
                const cmsMetaTitleInput = document.getElementById('editCmsMetaTitle');
                const cmsMetaDescriptionInput = document.getElementById('editCmsMetaDescription');
                const cmsContentInput = document.getElementById('editcmsContent');
                const cmsStatusInput = document.getElementById('editcmsStatus');

                const form = document.getElementById('editCmsForm');

                if (cmsIdInput) cmsIdInput.value = id;
                if (cmsTitleInput) cmsTitleInput.value = title;
                if (cmsMetaTitleInput) cmsMetaTitleInput.value = metaTitle;
                if (cmsMetaDescriptionInput) cmsMetaDescriptionInput.value = metaDescription;
                if (cmsContentInput) cmsContentInput.value = content;
                if (cmsStatusInput) cmsStatusInput.value = String(status);

                if (form) {
                    form.action = "{{ route('cms.update', ':id') }}".replace(':id', id);
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

                    const cmsId = button.getAttribute('data-cms-id');
                    const form = document.getElementById('deleteCmsForm');

                    if (form) {
                        form.action = "{{ route('cms.destroy', ':id') }}".replace(':id',
                            cmsId);
                    }

                });
            }

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function validatecms(formId, inputId) {
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
            validatecms('addCms', 'cmsTitle');
            validatecms('addCms', 'cmsContent');
            validatecms('editCmsForm', 'editCmsTitle');
            validatecms('editCmsForm', 'editcmsContent');

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
            const cmsContent = document.querySelector('#cmsContent');
            if (cmsContent) {
                cmsContent.addEventListener('click', function() {
                    this.value = '';
                });
            }
        </script> --}}
@endsection
