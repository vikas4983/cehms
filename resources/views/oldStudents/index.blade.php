@extends('layouts.app')
@section('title', 'oldStudents')
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
                <h1 class="fw-semibold mb-4 h6 text-primary-light"> Old Students </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Old Students</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Student
            </button>
        </div>

        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <x-filter-from-component :url="route('input.filter')" :currentRoute="Route::currentRouteName()" />

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
                                            <input class="form-check-input oldStudentCheckbox" type="checkbox"
                                                id="selectAll">
                                            <label class="form-check-label ms-2">S.L</label>
                                        </div>
                                    </th>
                                    <th>Registration No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Father name</th>
                                    <th>Registration Date</th>
                                    <th>Address</th>
                                    <th>Valid Form</th>
                                    <th>Course</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($oldStudents as $index => $oldStudent)
                                    <tr>
                                        <td>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input oldStudentCheckbox" type="checkbox">
                                                <label class="ms-2">{{ $index + 1 }}</label>
                                            </div>
                                        </td>
                                        <td>{{ $oldStudent->registration_no }}</td>
                                        <td>{{ $oldStudent->first_name }}</td>
                                        <td>{{ $oldStudent->last_name }}</td>
                                        <td>{{ $oldStudent->father_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($oldStudent->registration_date)->format('d M Y') }}
                                        </td>
                                        <td>{{ $oldStudent->address }}</td>
                                        <td>{{ \Carbon\Carbon::parse($oldStudent->valid_form)->format('d M Y') }}
                                        <td>{{ $oldStudent->course }}</td>
                                        <td>{{ $oldStudent->city }}</td>
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
                                                            data-old-student-id="{{ $oldStudent->id }}"
                                                            data-old-student-registration-no="{{ $oldStudent->registration_no }}"
                                                            data-old-student-first-name="{{ $oldStudent->first_name }} "
                                                            data-old-student-last-name="{{ $oldStudent->last_name }}"
                                                            data-old-student-father-name="{{ $oldStudent->father_name }}"
                                                            data-old-student-registration-date="{{ $oldStudent->registration_date }}"
                                                            data-old-student-address="{{ $oldStudent->address }} "
                                                            data-old-student-valid-form="{{ $oldStudent->valid_form }} "
                                                            data-old-student-course="{{ $oldStudent->course }} "
                                                            data-old-student-city="{{ $oldStudent->city }} ">
                                                            <i class="ri-edit-2-line"></i>Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            type="button" data-bs-toggle="modal"
                                                            data-Student-id="{{ $oldStudent->id }}"
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
                                            No Old Students found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $oldStudents->links() }}
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
            <h5 class="text-lg mb-0">Add oldStudent</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="addOldStudent" action="{{ route('oldStudents.store') }}" method="POST" class="d-flex flex-column p-20">
            @csrf
            <div class="row g-3">
                <div class="row">

                    <!-- First Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="Enter student first name">

                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="Enter student last name">

                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Registration Date -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Registration Date</label>
                        <input type="date" name="registration_date" value="{{ old('registration_date') }}"
                            class="form-control @error('registration_date') is-invalid @enderror">

                        @error('registration_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Valid From -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Valid From</label>
                        <input type="date" name="valid_from" value="{{ old('valid_from') }}"
                            class="form-control @error('valid_from') is-invalid @enderror">

                        @error('valid_from')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Father Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Father Name</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}"
                            class="form-control @error('father_name') is-invalid @enderror"
                            placeholder="Enter father name">

                        @error('father_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Course -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Course</label>
                        <input type="text" name="course" value="{{ old('course') }}"
                            class="form-control @error('course') is-invalid @enderror" placeholder="Enter Course">

                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">City</label>
                        <input type="text" name="city" value="{{ old('city') }}"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Enter City name">

                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
            <h5 class="text-lg mb-0">Edit oldStudent </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editOldStudentForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editOldStudentId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="row">
                    <!-- First Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">First Name</label>
                        <input type="text" id="editOldStudentFName" name="first_name"
                            value="{{ old('first_name') }}"
                            class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="Enter student first name">

                        <div class="invalid-feedback">
                            First name is required
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Last Name</label>
                        <input type="text" id="editOldStudentLName" name="last_name" value="{{ old('last_name') }}"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="Enter student last name">

                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Registration Date -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Registration Date</label>
                        <input type="date" id="editOldStudentRDate" name="registration_date"
                            value="{{ old('registration_date') }}"
                            class="form-control @error('registration_date') is-invalid @enderror">
                    </div>

                    <!-- Valid From -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Valid From</label>
                        <input type="date" id="editOldStudentVFrom" name="valid_from"
                            value="{{ old('valid_from') }}"
                            class="form-control @error('valid_from') is-invalid @enderror">


                    </div>

                    <!-- Father Name -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Father Name</label>
                        <input type="text" id="editOldStudentFatherName" name="father_name"
                            value="{{ old('father_name') }}"
                            class="form-control @error('father_name') is-invalid @enderror"
                            placeholder="Enter father name">


                    </div>

                    <!-- Address -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Address</label>
                        <input type="text" id="editOldStudentAddress" name="address" value="{{ old('address') }}"
                            class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Course -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">Course</label>
                        <input type="text" id="editOldStudentCourse" name="course" value="{{ old('course') }}"
                            class="form-control @error('course') is-invalid @enderror" placeholder="Enter Course">


                    </div>

                    <!-- City -->
                    <div class="col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light mb-2">City</label>
                        <input type="text" id="editOldStudentCity" name="city" value="{{ old('city') }}"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Enter City name">

                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <form id="deleteOldStudentForm" method="POST" action="">
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

                const id = editBtn.dataset.oldStudentId;
                const fName = editBtn.dataset.oldStudentFirstName;
                const lName = editBtn.dataset.oldStudentLastName;
                const fatherName = editBtn.dataset.oldStudentFatherName;
                const rDate = editBtn.dataset.oldStudentRegistrationDate;
                const address = editBtn.dataset.oldStudentAddress;
                const vFrom = editBtn.dataset.oldStudentValidForm;
                const course = editBtn.dataset.oldStudentCourse;
                const city = editBtn.dataset.oldStudentCity;

                // Open sidebar
                const sidebar = document.querySelector('.edit-sidebar');
                if (sidebar) sidebar.classList.add('active-translate-0');

                // Set values
                document.getElementById('editOldStudentId').value = id;
                document.getElementById('editOldStudentFName').value = fName;
                document.getElementById('editOldStudentLName').value = lName;
                document.getElementById('editOldStudentFatherName').value = fatherName;
                let formattedDateR = rDate.split(' ')[0];
                document.getElementById('editOldStudentRDate').value = formattedDateR;
                document.getElementById('editOldStudentAddress').value = address;
                let formattedDateV = vFrom.split(' ')[0];
                document.getElementById('editOldStudentVFrom').value = formattedDateV;
                document.getElementById('editOldStudentCourse').value = course;
                document.getElementById('editOldStudentCity').value = city;

                // Set form action
                const form = document.getElementById('editOldStudentForm');
                if (form) {
                    form.action = "{{ route('oldStudents.update', ':id') }}".replace(':id', id);
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

                    const id = button.dataset.studentId;

                    const form = document.getElementById('deleteOldStudentForm');

                    if (form) {
                        form.action = "{{ route('oldStudents.destroy', ':id') }}".replace(':id', id);
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
            validateForm('addOldStudent', ['editOldStudentFName', 'editOldStudentLName']);
            validateForm('editOldStudentForm', ['editOldStudentFName', 'editOldStudentLName',

            ]);

        });
    </script>



@endsection
