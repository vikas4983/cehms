@extends('layouts.app')
@section('title', 'Banners')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add Banner </h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="{{ route('banners.index') }}" class="text-secondary-light hover-text-primary hover-underline "> /
                        Banners</a>
                    <span class="text-secondary-light">/ Add Banner</span>
                </div>
            </div>
            @can('create-banner')
                <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                    <span class="d-flex text-md">
                        <i class="ri-add-large-line"></i>
                    </span>
                    Add Banner
                </button>
            @endcan
        </div>
        @include('alerts.alert')
        <div class="row">
            @forelse ($banners as $banner)
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body p-24 text-center position-relative">

                            <!-- Order Number -->
                            <span class="position-absolute top-0 start-0 m-2 badge bg-primary">
                                {{ $banner->order }}
                            </span>

                            <figure class="mb-24 overflow-hidden rounded" style="height:120px;">
                                <img src="{{ asset('storage/' . $banner->banner) }}" alt="Banner Image"
                                    class="w-100 h-100 object-fit-cover">
                            </figure>

                            <div class="d-flex justify-content-center gap-2">
                                @can('edit-banner')
                                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                @endcan

                                @can('change-banner-status')
                                    @if ($banner->status == 0)
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#changeStatusModal" data-url="{{ route('banner.status') }}"
                                            data-id="{{ $banner->id }}">
                                            Active
                                        </button>
                                    @elseif($banner->status == 1)
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#changeStatusModal" data-url="{{ route('banner.status') }}"
                                            data-id="{{ $banner->id }}">
                                            Inactive
                                        </a>
                                    @endif
                                @endcan

                                @can('delete-banner')
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-url="{{ route('banners.destroy', $banner->id) }}">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- Confirm delete modal -->
    <x-button.confirm-delete-component />
    <x-button.change-status-modal-component />
    <!-- Add sidebar end -->
    <x-button.add-modal-component />

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
            validateRole('addBanner', 'banner');
            validateRole('editRoleForm', 'editRoleName');

        });
    </script>
@endsection
