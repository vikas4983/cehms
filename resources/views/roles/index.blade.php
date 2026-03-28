@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add Role </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Roles</span>
                </div>
            </div>
            @can('create-role')
                <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                    <span class="d-flex text-md">
                        <i class="ri-add-large-line"></i>
                    </span>
                    Add Role
                </button>
            @endcan
        </div>

        @include('alerts.alert')
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <div class="d-flex flex-wrap align-items-center gap-16">
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
                                            <input class="form-check-input " type="checkbox" id="selectAll">
                                            <label class="form-check-label">
                                                S.L
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Role Name</th>
                                    @can('view-role-permission')
                                        <th scope="col">Permissions</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $count => $role)
                                    <tr>
                                        <td>
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input " type="checkbox">
                                                <label class="form-check-label">{{ $count + 1 }}</label>
                                            </div>
                                        </td>
                                        <td>{{ $role->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="text-primary-light text-xl"
                                                    data-bs-toggle="dropdown" data-bs-display="static"
                                                    aria-expanded="false">
                                                    <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                    @can('edit-role')
                                                        <li>
                                                            <button type="button"
                                                                class="editBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                data-role-id="{{ $role->id }}"
                                                                data-role-name="{{ $role->name }}"
                                                                data-role-permissions="{{ $role->permissions->pluck('name') }}"
                                                                data-role-status="{{ $role->status }}">
                                                                <i class="ri-edit-2-line"></i>Edit
                                                            </button>
                                                        </li>
                                                    @endcan
                                                    @can('delete-role')
                                                        <li>
                                                            <button
                                                                class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                type="button" data-bs-toggle="modal"
                                                                data-role-id="{{ $role->id }}"
                                                                data-bs-target="#exampleModalDelete" id="bulkDeleteTrigger">
                                                                <i class="ri-delete-bin-6-line"></i>Delete
                                                            </button>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </div> {{ ucfirst($role->name) }}
                                        </td>
                                        @can('view-role-permission')
                                            <td>{{ ucwords(Str::limit($role->permissions->pluck('name')->implode(' | '), 100)) }}
                                            </td>
                                        @endcan
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
            <h5 class="text-lg mb-0">Add Role</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="addRole" action="{{ route('roles.store') }}" method="POST"class="d-flex flex-column p-20">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="">
                        <label for="roleName" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Role Name
                        </label>
                        <input type="text" name="name" class="form-control" id="roleName"
                            placeholder="Enter Role Name">
                        <div class="invalid-feedback">
                            Role name is required
                        </div>
                    </div>
                </div>
                @can('change-role-status')
                    <div class="col-sm-6">
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
                @endcan
                @can('view-role-permission')
                    <div class="col-sm-12">
                        <div>
                            <label
                                class=" d-flex justify-content-center text-sm fw-semibold text-primary-light d-inline-block mt-2">
                                Permissions
                            </label>

                            <div class="form-check mb-2">
                                <input class="form-check-input allCb" name="permissions[]" type="checkbox">
                                <label class="form-check-label">&nbsp;
                                    All Permissions
                                </label>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-2">
                                @foreach ($groupedPermissions as $group => $permissions)
                                    <div class="col-12 mb-2">
                                        <span class="fw-bold text-primary">{{ ucfirst($group) }} Permissions</span>
                                        <div class="d-flex flex-wrap gap-3">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="singleCb form-check-input  mt-2"
                                                        name="permissions[]" value="{{ $permission->name }}"> &nbsp;<label
                                                        class="form-check-label" for="permission{{ $permission->id }}">
                                                        {{ ucwords($permission->name) }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endcan

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
            <h5 class="text-lg mb-0">Edit Role </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editRoleForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editRoleId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="">
                            <label for="editRoleForm"
                                class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Role
                                Name
                            </label>
                            <input type="text" id="editRoleName" name="name" class="form-control"
                                placeholder="Enter Role Name">
                            <div class="invalid-feedback">
                                Role name is required
                            </div>
                        </div>
                    </div>
                    @can('change-role-status')
                        <div class="col-sm-6">
                            <div class="">
                                <label for="status"
                                    class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                                </label>
                                <select id="editRoleStatus" name="status" class="form-control form-select">
                                    <option value="Select a Class" disabled>Select One</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    @endcan

                </div>
                @can('view-role-permission')
                    <div class="col-sm-12">
                        <div>
                            <label
                                class=" d-flex justify-content-center text-sm fw-semibold text-primary-light d-inline-block mt-2">
                                Permissions
                            </label>

                            <div class="form-check mb-2">
                                <input class="form-check-input allCb" type="checkbox">
                                <label class="form-check-label ">&nbsp;
                                    All Permissions
                                </label>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-2">
                                @foreach ($groupedPermissions as $group => $permissions)
                                    <div class="col-12 mb-2">
                                        <span class="fw-bold text-primary">{{ ucfirst($group) }} Permissions</span>

                                        <div class="d-flex flex-wrap gap-3">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="singleCb form-check-input  mt-2"
                                                        id="permission{{ $permission->id }}" name="permissions[]"
                                                        value="{{ $permission->name }}"
                                                        {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>

                                                    &nbsp;<label class="form-check-label"
                                                        for="permission{{ $permission->id }}">
                                                        {{ ucwords($permission->name) }}
                                                    </label>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endcan

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
                        <form id="deleteRoleForm" method="POST" action="">
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

                const id = editBtn.getAttribute('data-role-id');
                const name = editBtn.getAttribute('data-role-name');
                const status = editBtn.getAttribute('data-role-status');

                let rolePermissions = editBtn.getAttribute('data-role-permissions');
                let permissions = JSON.parse(rolePermissions);

                document.querySelectorAll('.singleCb').forEach(function(checkbox) {

                    checkbox.checked = false;

                    if (permissions.includes(checkbox.value)) {
                        checkbox.checked = true;
                    }

                });
                const sidebar = document.querySelector('.edit-sidebar');

                if (sidebar) {
                    sidebar.classList.add('active-translate-0');
                }

                // Set form values
                const roleIdInput = document.getElementById('editRoleId');
                const roleNameInput = document.getElementById('editRoleName');
                const roleStatusInput = document.getElementById('editRoleStatus');

                const form = document.getElementById('editRoleForm');

                if (roleIdInput) roleIdInput.value = id;
                if (roleNameInput) roleNameInput.value = name;
                if (roleStatusInput) roleStatusInput.value = String(status);

                if (form) {
                    form.action = "{{ route('roles.update', ':id') }}".replace(':id', id);
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

                    const roleId = button.getAttribute('data-role-id');
                    const form = document.getElementById('deleteRoleForm');

                    if (form) {
                        form.action = "{{ route('roles.destroy', ':id') }}".replace(':id', roleId);
                    }

                });
            }

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function validateRole(formId, inputId) {
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
            validateRole('addRole', 'roleName');
            validateRole('editRoleForm', 'editRoleName');

        });
    </script>

    <script>
        document.addEventListener('change', function(e) {
            // ALL checkbox
            if (e.target.matches('.allCb')) {

                const parent = e.target.closest('.modal') || document;
                const singles = parent.querySelectorAll('.singleCb');

                singles.forEach(cb => {
                    cb.checked = e.target.checked;
                });
            }

            // SINGLE checkbox
            if (e.target.matches('.singleCb')) {
                const parent = e.target.closest('.modal') || document;
                const allCb = parent.querySelector('.allCb');
                const singles = parent.querySelectorAll('.singleCb');

                const allChecked = [...singles].every(cb => cb.checked);

                if (allCb) {
                    allCb.checked = allChecked;
                }
            }

        });
    </script>
@endsection
