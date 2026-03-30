@extends('layouts.app')
@section('title', 'Students')
@section('content')
    <style>
        .dataTables_paginate,
        .dataTables_info,
        .dataTables_length,
        .dataTables_filter {
            display: none !important;
        }

        .dropdown-submenu .excel-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            cursor: pointer;
        }

        .dropdown-submenu:hover .excel-submenu {
            display: block;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">

                @if (Route::currentRouteName() == 'admin')
                    <h1 class="fw-semibold mb-4 h6 text-primary-light">Admin List</h1>
                @else
                    <h1 class="fw-semibold mb-4 h6 text-primary-light">Student List</h1>
                @endif

                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    @if (Route::currentRouteName() == 'admin')
                        <span class="text-secondary-light">/ Admins</span>
                    @else
                        <span class="text-secondary-light">/ Students</span>
                    @endif

                </div>
            </div>
            @can('create-student')
                <a href="{{ route('students.create') }}" class="btn btn-primary-600 d-flex align-items-center gap-6 ">
                    <span class="d-flex text-md">
                        <i class="ri-add-large-line"></i>
                    </span>
                    Add Student
                </a>
            @endcan
        </div>
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <div class="d-flex flex-wrap align-items-center gap-16">
                            <div class="dropdown">
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
                                @can('download-student-excel')
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <!-- Excel Parent -->
                                        <li class="dropdown-submenu position-relative">
                                            <a href="#"
                                                class="dropdown-item px-16 py-8 rounded d-flex align-items-center justify-content-between">
                                                <span class="d-flex align-items-center gap-10">
                                                    <i class="ri-file-excel-line text-success"></i> Excel
                                                </span>
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>

                                            <!-- Excel Submenu -->
                                            <ul class="dropdown-menu excel-submenu">
                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('inactive.students.export') }}"
                                                        class="dropdown-item">Inactive Students</a>
                                                </li>

                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('active.students.export') }}"
                                                        class="dropdown-item">Active Students</a>
                                                </li>

                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('today.students.export') }}"
                                                        class="dropdown-item">Daily Students</a>
                                                </li>

                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('weekly.students.export') }}"
                                                        class="dropdown-item">Weekly Students</a>
                                                </li>

                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('monthly.students.export') }}"
                                                        class="dropdown-item">Monthly Students</a>
                                                </li>

                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDownloadModal"
                                                        data-url="{{ route('yearly.students.export') }}"
                                                        class="dropdown-item">Yearly Students</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endcan

                                </ul>
                            </div>
                            <form id="inputForm" data-url={{ route('input.filter') }} class="navbar-search dt-search m-0">
                                @csrf
                                <input id="input" type="text" class="dt-input bg-transparent radius-4"
                                    aria-controls="dataTable" name="input" placeholder="Enter Id | Name | Email">
                                <input id="route" type="hidden" value="{{ Route::currentRouteName() }}"
                                    class="dt-input bg-transparent radius-4" aria-controls="dataTable" name="route">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>

                                <button class="btn btn-primary-600 filterBtn">Search</button>
                            </form>
                            <a href="{{ route('students.index') }}" class="btn btn-primary-600 filterBtn" title="Reload"><i
                                    class="ri-refresh-line"></i></a>

                        </div>
                    </div>
                    @include('alerts.alert')
                    <span class="successMessage  alert alert-success" style="width: 100%; display:none;">
                    </span>
                    <span class="errorMessage  alert alert-danger" style="width: 100%; display:none;">
                    </span>
                    <div class="p-0 result table-responsive">
                        <table class="table bordered-table mb-0 " id="dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                S.L
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Practitioner Registration</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                <tr class="error-row" style="display:none;">
                                    <th colspan="4" class="text-danger text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="noResult"></tbody>
                            @forelse ($students as $count => $student)
                                <tr>
                                    <td>
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                {{ $count + 1 }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('students.show', $student?->id ?? '') }}"
                                            style="color:rgb(9, 146, 112)">
                                            {{ $student?->name ?? '' }}</a>
                                    </td>
                                    <td>
                                        {{ $student?->email ?? '' }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl"
                                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                @can('edit-student')
                                                    <li>
                                                        <x-button.edit-button-component :route="route('students.edit', $student->id)" />

                                                    </li>
                                                @endcan
                                                @can('delete-student')
                                                    <li>
                                                        <x-button.delete-button-component :route="route('students.destroy', $student->id)" :id="$student->id" />
                                                    </li>
                                                @endcan
                                                @can('permission-assign')
                                                    <li>
                                                        <button data-bs-toggle="modal" data-student="{{ $student }}"
                                                            data-bs-target="#student{{ $student->id }}"
                                                            class="dropdown-item rounded  text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                            <i class="ri-shield-keyhole-line"></i>
                                                            Role & Permission
                                                        </button>
                                                    </li>
                                                @endcan


                                            </ul>
                                        </div>
                                        {{ $student?->practitioner_registration ?? '' }}
                                    </td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student?->mobile ?? '' }}</td>
                                    <td>
                                        @if ($student?->status ?? '' == '1')
                                            <span
                                                class="bg-success-100 text-success-600 px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                                        @else
                                            <span
                                                class="bg-danger-100 text-danger-600 px-24 py-4 radius-4 fw-medium text-sm">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl"
                                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                @can('edit-student')
                                                    <li>
                                                        <x-button.edit-button-component :route="route('students.edit', $student->id)" />

                                                    </li>
                                                @endcan
                                                @can('delete-student')
                                                    <li>
                                                        <x-button.delete-button-component :route="route('students.destroy', $student->id)" :id="$student->id" />
                                                    </li>
                                                @endcan
                                                @can('permission-assign')
                                                    <li>
                                                        <button data-bs-toggle="modal" data-student="{{ $student }}"
                                                            data-bs-target="#student{{ $student->id }}"
                                                            class="dropdown-item rounded  text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                            <i class="ri-shield-keyhole-line"></i>
                                                            Role & Permission
                                                        </button>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <x-assign-permission-component :groupedPermissions="$groupedPermissions" :student="$student" :roles="$roles" />
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row text-right">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Event start -->
    <x-button.confirm-delete-component />
    <x-confirm-download-component />


@endsection
