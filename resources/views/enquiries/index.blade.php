@extends('layouts.app')
@section('title', 'Enquiries')
@section('content')
    <style>
        .pagination {
            margin: 0;
        }

        .pagination li {
            margin: 0 4px;
        }

        .pagination .page-link {
            border-radius: 6px;
            padding: 6px 12px;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light"> Enquiries </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Enquiries</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Enquiry
            </button>
        </div>

        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <div class="d-flex flex-wrap align-items-center gap-16">
                            <form id="inputForm" data-url={{ route('input.filter') }} class="navbar-search dt-search m-0"
                                action="POST">
                                @csrf
                                <input id="input" type="text" class="dt-input bg-transparent radius-4"
                                    aria-controls="dataTable" name="input" placeholder="Enter Id | Name | Email">
                                <input id="route" type="hidden" value="{{ Route::currentRouteName() }}"
                                    class="dt-input bg-transparent radius-4" aria-controls="dataTable" name="route">

                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                                <button class="btn btn-primary-600 filterBtn">Search</button>
                            </form>
                            <a href="{{ route('enquiries.index') }}" class="btn btn-primary-600 filterBtn" title="Reload"><i
                                    class="ri-refresh-line"></i></a>
                        </div>

                    </div>
                    @include('alerts.alert')
                    <span class="successMessage  alert alert-success" style="width: 100%; display:none;">
                    </span>
                    <span class="errorMessage  alert alert-danger" style="width: 100%; display:none;">
                    </span>
                    <div class="p-0 result table-responsive">
                        <table class="table  bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input enquiryCheckbox" type="checkbox" id="selectAll">
                                            <label class="form-check-label ms-2">S.L</label>
                                        </div>
                                    </th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($enquiries as $index => $enquiry)
                                    <tr>
                                        <td>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input enquiryCheckbox" type="checkbox">
                                                <label class="ms-2">{{ $index + 1 }}</label>
                                            </div>
                                        </td>
                                        <td>
                                            @if (!empty($enquiry->insertOn))
                                                {{ $enquiry->insertOn->format('d M Y') }}
                                            @else
                                                {{ $enquiry->created_at->format('d M Y') }}
                                            @endif
                                        </td>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->mobile }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="text-primary-light text-xl"
                                                    data-bs-toggle="dropdown" data-bs-display="static"
                                                    aria-expanded="false">
                                                    <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                    <li>
                                                        <button type="button"
                                                            class="editBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            data-enquiry-id="{{ $enquiry->id }}"
                                                            data-enquiry-name="{{ $enquiry->name }}"
                                                            data-enquiry-mobile="{{ $enquiry->mobile }}"
                                                            data-enquiry-email="{{ $enquiry->email }}">

                                                            <i class="ri-edit-2-line"></i>Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            type="button" data-bs-toggle="modal"
                                                            data-enquiry-id="{{ $enquiry->id }}"
                                                            data-bs-target="#exampleModalDelete" id="bulkDeleteTrigger">
                                                            <i class="ri-delete-bin-6-line"></i>Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No enquiries found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $enquiries->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add sidebar start -->
    <div
        class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Add enquiry</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="addEnquiry" action="{{ route('enquiries.store') }}" method="POST"class="d-flex flex-column p-20">
            @csrf
            <div class="row g-3">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="enquiryName" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Name
                            </label>
                            <input type="text" id="enquiryName" name="name" class="form-control"
                                placeholder="Enter enquiry Name">
                            <div class="invalid-feedback">
                                Enquiry name is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <label for="addEnquiryEmail"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Email
                            </label>
                            <input type="text" id="enquiryEmail" name="email" class="form-control"
                                placeholder="Enter email">
                            <div class="invalid-feedback">
                                Email is required
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="">
                            <label for="addEnquirMobile"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Number
                            </label>
                            <input type="text" id="addEnquiryMobile" name="mobile" class="form-control"
                                placeholder="Enter mobile number" value="{{ old('mobile') }}" maxlength="10"
                                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)">
                            <div class="invalid-feedback">
                                Mobile number is required
                            </div>
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
            <h5 class="text-lg mb-0">Edit Enquiry </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editEnquiryForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editEnquiryId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="">
                            <label for="editEnquiryName"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                Name
                            </label>
                            <input type="text" id="editEnquiryName" name="name" class="form-control"
                                placeholder="Enter enquiry Name">
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
                            <input type="text" id="editEnquiryEmail" name="email" class="form-control"
                                placeholder="Enter email">
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
                                placeholder="Enter mobile number" value="{{ old('mobile') }}" maxlength="10"
                                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)">
                            <div class="invalid-feedback">
                                Mobile number is required
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
    <x-button.confirm-delete-component />


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
                        <form id="deleteEnquiryForm" method="POST" action="">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf

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
                if (!editBtn) return;

                const id = editBtn.dataset.enquiryId;
                const name = editBtn.dataset.enquiryName;
                const email = editBtn.dataset.enquiryEmail;
                const mobile = editBtn.dataset.enquiryMobile;

                // Open sidebar
                const sidebar = document.querySelector('.edit-sidebar');
                if (sidebar) sidebar.classList.add('active-translate-0');

                // Set values
                document.getElementById('editEnquiryId').value = id;
                document.getElementById('editEnquiryName').value = name;
                document.getElementById('editEnquiryEmail').value = email;
                document.getElementById('editEnquiryMobile').value = mobile;

                // Set form action
                const form = document.getElementById('editEnquiryForm');
                if (form) {
                    form.action = "{{ route('enquiries.update', ':id') }}".replace(':id', id);
                }

            });


            // =========================
            // DELETE MODAL
            // =========================
            const modal = document.getElementById('exampleModalDelete');

            if (modal) {
                modal.addEventListener('show.bs.modal', function(e) {

                    const button = e.relatedTarget;
                    if (!button) return;

                    const id = button.dataset.enquiryId;
                    const form = document.getElementById('deleteEnquiryForm');

                    if (form) {
                        form.action = "{{ route('enquiries.destroy', ':id') }}".replace(':id', id);
                    }

                });
            }


            // =========================
            // VALIDATION (FIXED 🔥)
            // =========================
            function validateForm(formId, inputIds) {

                const form = document.getElementById(formId);
                if (!form) return;

                form.addEventListener('submit', function(e) {
                    let isValid = true;

                    inputIds.forEach(id => {
                        const input = document.getElementById(id);
                        if (!input) return;

                        input.classList.remove('is-invalid');

                        if (input.value.trim() === '') {
                            input.classList.add('is-invalid');
                            if (isValid) input.focus();
                            isValid = false;
                        }
                    });

                    if (!isValid) e.preventDefault();
                });

                // real-time validation
                inputIds.forEach(id => {
                    const input = document.getElementById(id);
                    if (!input) return;

                    input.addEventListener('input', function() {
                        if (input.value.trim() !== '') {
                            input.classList.remove('is-invalid');
                        }
                    });
                });
            }

            // Apply validation
            validateForm('addEnquiry', ['enquiryName', 'enquiryEmail', 'enquiryMobile']);
            validateForm('editEnquiryForm', ['editEnquiryName', 'editEnquiryEmail', 'editEnquiryMobile']);

        });
    </script>



@endsection
