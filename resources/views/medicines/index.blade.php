@extends('layouts.app')
@section('title', 'Medicines')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add Medicine </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Medicines</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Medicine
            </button>
        </div>

        @include('alerts.alert')
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <div class="d-flex flex-wrap align-items-center gap-16">
                            {{-- <div class="dropdown">
                                <button type="button"
                                    class="px-12 py-5-px border border-neutral-300 radius-8 d-flex align-items-center gap-20 "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="d-flex align-items-center gap-1 text-secondary-light text-sm">
                                        <i class="ri-file-upload-line text-md line-height-1"></i>
                                        Export
                                    </span>
                                    <span class="">
                                        <i class="ri-arrow-down-s-line"></i>
                                    </span>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                            <i class="ri-file-3-line"></i>
                                            PDF
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                            <i class="ri-file-excel-line"></i>
                                            Excel
                                        </button>
                                    </li>
                                </ul>
                            </div> --}}
                            <form class="navbar-search dt-search m-0">
                                <input type="text" class="dt-input bg-transparent radius-4" aria-controls="dataTable"
                                    name="search" placeholder="Search...">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </form>
                        </div>
                        <div class="d-flex align-items-center gap-8 text-secondary-light">
                            <span class="">
                                Rows per page:
                            </span>
                            <div class="dt-length">
                                <select name="dataTable_length" aria-controls="dataTable"
                                    class="dt-input form-control form-select">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="p-0">
                        <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input medicineCheckbox" type="checkbox" id="selectAll">
                                            <label class="form-check-label">
                                                S.L
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medicines as $count => $medicine)
                                    <tr>
                                        <td>
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input medicineCheckbox" type="checkbox">
                                                <label class="form-check-label">{{ $count + 1 }}</label>
                                            </div>
                                        </td>
                                        <td>{{ ucwords($medicine->name) }}</td>
                                        <td>{{ ucfirst($medicine->code) }}</td>
                                        <td><span
                                                style="padding:1px 2px;font-size:9px;border-radius:4px;color:white;margin-bottom:1px;background-color: {{ $medicine->status === 1 ? 'green' : 'red' }};">
                                                {{ $medicine->status === 1 ? 'Active' : 'Inactive' }}
                                            </span></td>
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
                                                            data-medicine-id="{{ $medicine->id }}"
                                                            data-medicine-name="{{ $medicine->name }}"
                                                            data-medicine-code="{{ $medicine->code }}"
                                                            data-medicine-status="{{ $medicine->status }}">
                                                            <i class="ri-edit-2-line"></i>Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            type="button" data-bs-toggle="modal"
                                                            data-medicine-id="{{ $medicine->id }}"
                                                            data-bs-target="#exampleModalDelete" id="bulkDeleteTrigger">
                                                            <i class="ri-delete-bin-6-line"></i>Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add sidebar start -->
    <div
        class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Add Medicine</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="addMedicine" action="{{ route('medicines.store') }}" method="POST"class="d-flex flex-column p-20">
            @csrf
            <div class="row g-3">
                <div class="col-sm-4">
                    <div>
                        <label for="medicineName" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Medicine Name
                        </label>

                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="medicineName" value="{{ old('name') }}" placeholder="Enter medicine Name">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="invalid-feedback">
                            Medicine name is required
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="medicineCode"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8  @error('code') is-invalid @enderror">Medicine
                            Code
                        </label>
                        <input type="text" name="code" class="form-control" id="medicineCode"
                            placeholder="Enter medicine code">
                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="invalid-feedback">
                            Medicine code is required
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="status" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                        </label>
                        <select id="status" name="status" class="form-control form-select">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>


                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="button" data-bs-dismiss="modal"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                            Cancel
                        </button>
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
            <h5 class="text-lg mb-0">Edit Medicine </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editMedicineForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editMedicineId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="">
                            <label for="editMedicineForm"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Medicine
                                Name
                            </label>
                            <input type="text" id="editMedicineName" name="name"
                                class="form-control @error('name') is-invalid @enderror() "
                                placeholder="Enter medicine name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="editMedicineCode"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Medicine
                                Code
                            </label>
                            <input type="text" id="editMedicineCode" name="code" class="form-control"
                                placeholder="Enter medicine code">
                            <div class="invalid-feedback">
                                Medicine code is required
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                            <label for="status"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                            </label>
                            <select id="editMedicineStatus" name="status" class="form-control form-select">
                                <option value="Select a Class" disabled>Select One</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
                        <form id="deleteMedicineForm" method="POST" action="">
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

                const id = editBtn.getAttribute('data-medicine-id');
                const name = editBtn.getAttribute('data-medicine-name');
                const code = editBtn.getAttribute('data-medicine-code');
                const status = editBtn.getAttribute('data-medicine-status');

                const sidebar = document.querySelector('.edit-sidebar');

                if (sidebar) {
                    sidebar.classList.add('active-translate-0');
                }

                // Set form values
                const medicineIdInput = document.getElementById('editMedicineId');
                const medicineNameInput = document.getElementById('editMedicineName');
                const medicineCodeInput = document.getElementById('editMedicineCode');
                const medicineStatusInput = document.getElementById('editMedicineStatus');

                const form = document.getElementById('editMedicineForm');

                if (medicineIdInput) medicineIdInput.value = id;
                if (medicineNameInput) medicineNameInput.value = name;
                if (medicineCodeInput) medicineCodeInput.value = code;
                if (medicineStatusInput) medicineStatusInput.value = String(status);

                if (form) {
                    form.action = "{{ route('medicines.update', ':id') }}".replace(':id', id);
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

                    const medicineId = button.getAttribute('data-medicine-id');
                    const form = document.getElementById('deleteMedicineForm');

                    if (form) {
                        form.action = "{{ route('medicines.destroy', ':id') }}".replace(':id', medicineId);
                    }

                });
            }

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function validatemedicine(formId, inputId) {
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
            validatemedicine('addMedicine', 'medicineName');
            validatemedicine('addMedicine', 'medicineCode');
            validatemedicine('editMedicineForm', 'editMedicineName');
            validatemedicine('editMedicineForm', 'editMedicineCode');

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
@endsection
