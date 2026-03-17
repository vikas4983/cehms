@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <style>
        .icon-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;

            background-color: var(--primary);
            /* dynamic theme color */
        }

        .icon-circle iconify-icon {
            color: #fff;
            font-size: 20px;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h6 class="fw-semibold mb-0">Dashboard</h6>

            </div>
        </div>
        <div class="mt-24">
            <div class="row gy-4">
                <div class="col-xxl-8">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('students.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:account-group-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Total Students</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['students'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('active.students') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:account-check-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Active Students</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['activeStudents'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('inactive.students') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:account-cancel-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Block Student</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['suspendedStudents'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('trash.students') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:trash-can-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Trashed studentst</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['trashedStudents'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('books.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:book-check-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Books</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['books'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('news.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:newspaper-variant-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">News</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['news'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('medicines.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:pill" class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Medicines</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['medicines'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('roles.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:account-key-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Roles</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['roles'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('permissions.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:shield-check-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Permissions</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['permissions'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('siteSettings.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:web" class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Web Settings</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['siteSettings'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('banners.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:view-carousel-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Banners</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['banners'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                                <a href="{{ route('menus.index') }}">
                                    <div class="card-body p-20">
                                        <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                            <div class="icon-circle bg-primary-600">
                                                <iconify-icon icon="mdi:view-list-outline"
                                                    class="text-white"></iconify-icon>
                                            </div>
                                            <p class="fw-medium text-primary-light mb-1">Menus</p>
                                        </div>
                                        <h6 class="mb-0">{{ $counts['menus'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="col-xxl-4">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">Student Attendance</h6>
                            </div>
                            <div class="p-20">
                                <div class="d-flex gap-6">
                                    <div class="h-44-px bg-primary-600 rounded" style="width: 87%;"></div>
                                    <div class="h-44-px bg-warning-600 rounded" style="width: 40%;"></div>
                                    <div class="h-44-px bg-purple-600 rounded" style="width: 20%;"></div>
                                    <div class="h-44-px bg-success-600 rounded" style="width: 20%;"></div>
                                </div>
                                <div class="mt-32 d-flex flex-column gap-24">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                                            <span class="text-neutral-600">Present </span>
                                        </div>
                                        <span class="fw-semibold text-primary-light">87%</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="w-12-px h-12-px radius-2 bg-warning-600"></span>
                                            <span class="text-neutral-600">Absent: </span>
                                        </div>
                                        <span class="fw-semibold text-primary-light">40%</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="w-12-px h-12-px radius-2 bg-purple-600"></span>
                                            <span class="text-neutral-600">Late </span>
                                        </div>
                                        <span class="fw-semibold text-primary-light">20%</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="w-12-px h-12-px radius-2 bg-success-600"></span>
                                            <span class="text-neutral-600">Half day </span>
                                        </div>
                                        <span class="fw-semibold text-primary-light">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-xxl-8">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="card h-100">
                                        <div class="card-body p-0">
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                                <h6 class="text-lg mb-0">Revenue Statistic</h6>
                                            </div>
                                            <div class="p-20">
                                                <ul
                                                    class="d-flex flex-wrap align-items-center justify-content-center mb-16 gap-3">
                                                    <li class="d-flex align-items-center gap-8">
                                                        <span
                                                            class="w-12-px h-12-px radius-2 rotate-45-deg bg-primary-600"></span>
                                                        <span class="text-secondary-light text-sm fw-semibold">
                                                            Total Fee:
                                                            <span class="text-primary-light fw-bold">$500</span>
                                                        </span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-8">
                                                        <span
                                                            class="w-12-px h-12-px radius-2 rotate-45-deg bg-warning-600"></span>
                                                        <span class="text-secondary-light text-sm font-semibold">
                                                            Collected Fee:
                                                            <span class="text-primary-light fw-bold"> $300</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <div id="revenueStatistic"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body p-0">
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                                <h6 class="text-lg mb-0">Notice Board</h6>
                                                <div class="dropdown">
                                                    <button type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <iconify-icon icon="entypo:dots-three-vertical"
                                                            class="icon text-secondary-light"></iconify-icon>
                                                    </button>
                                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                                                <iconify-icon icon="hugeicons:view"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                View
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                                <iconify-icon icon="lucide:edit"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button"
                                                                class="delete-item dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalDelete">
                                                                <iconify-icon icon="fluent:delete-24-regular"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="ps-20 pt-20 pb-20">
                                                <div
                                                    class="pe-20 d-flex flex-column gap-20 max-h-462-px overflow-y-auto scroll-sm">
                                                    <div class="d-flex align-items-start gap-16">
                                                        <img src="{{ asset('assets/images/notice-board-img1.png') }}"
                                                            alt="Thumbnail"
                                                            class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                        <div class="">
                                                            <h6 class="mb-4 text-lg">Admin</h6>
                                                            <p class="text-secondary-light text-sm mb-0">Lorem
                                                                Ipsum is simply dummy text of the
                                                                printing and typesetti</p>
                                                            <span class="text-secondary-light text-sm mb-0 mt-4">25
                                                                Jan 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-16">
                                                        <img src="{{ asset('assets/images/notice-board-img2.png') }}"
                                                            alt="Thumbnail"
                                                            class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                        <div class="">
                                                            <h6 class="mb-4 text-lg">Kathryn Murphy</h6>
                                                            <p class="text-secondary-light text-sm mb-0">Lorem
                                                                Ipsum is simply dummy text of the
                                                                printing and typesett ing industry Lorem Ipsum is
                                                                simply dummy text of the printing and
                                                                typesetting industry.</p>
                                                            <span class="text-secondary-light text-sm mb-0 mt-4">25
                                                                Jan 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-16">
                                                        <img src="{{ asset('assets/images/notice-board-img3.png') }}"
                                                            alt="Thumbnail"
                                                            class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                        <div class="">
                                                            <h6 class="mb-4 text-lg">Admin</h6>
                                                            <p class="text-secondary-light text-sm mb-0">Lorem
                                                                Ipsum is simply dummy text of the
                                                                printing and typesetti</p>
                                                            <span class="text-secondary-light text-sm mb-0 mt-4">25
                                                                Jan 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-16">
                                                        <img src="{{ asset('assets/images/notice-board-img2.png') }}"
                                                            alt="Thumbnail"
                                                            class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                        <div class="">
                                                            <h6 class="mb-4 text-lg">John Doe</h6>
                                                            <p class="text-secondary-light text-sm mb-0">Lorem
                                                                ipsum dolor sit amet consectetur
                                                                adipisicing elit. Laborum voluptas corporis qui
                                                                dolore est odit officia fuga?</p>
                                                            <span class="text-secondary-light text-sm mb-0 mt-4">25
                                                                Jan 2024</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body p-0">
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                                <h6 class="text-lg mb-0">Leave Requests</h6>
                                                <div class="dropdown">
                                                    <button type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <iconify-icon icon="entypo:dots-three-vertical"
                                                            class="icon text-secondary-light"></iconify-icon>
                                                    </button>
                                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                                                <iconify-icon icon="hugeicons:view"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                View
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                                <iconify-icon icon="lucide:edit"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button"
                                                                class="delete-item dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalDelete">
                                                                <iconify-icon icon="fluent:delete-24-regular"
                                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="ps-20 pt-20 pb-20">
                                                <div
                                                    class="pe-20 d-flex flex-column gap-28 max-h-462-px overflow-y-auto scroll-sm">
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img1.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Darlene Robertson</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img2.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Esther Howard</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img3.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Kristin Watson</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img4.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Leslie Alexander</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img5.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Dianne Russell</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between gap-16">
                                                        <div class="d-flex align-items-start gap-16">
                                                            <img src="{{ asset('assets/images/leave-request-img3.png') }}"
                                                                alt="Thumbnail"
                                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                                                            <div class="">
                                                                <h6 class="mb-0 text-lg">Kristin Watson</h6>
                                                                <span class="text-secondary-light text-sm mb-0">English
                                                                    Teacher</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="d-block fw-bold text-primary-light">3
                                                                Days</span>
                                                            <p class="text-secondary-light text-sm mb-0">Apply on:
                                                                10 April</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card h-100">
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                        <h6 class="text-lg mb-0">Calendar</h6>
                                    </div>

                                    <div class="p-20">
                                        <div class="calendar">
                                            <div class="calendar__header">
                                                <button type="button" class="calendar__arrow left">
                                                    <i class="ri-arrow-left-s-line"></i>
                                                </button>
                                                <p class="display text-md text-secondary-light fw-semibold mb-0">""
                                                </p>
                                                <button type="button" class="calendar__arrow right">
                                                    <i class="ri-arrow-right-s-line"></i>
                                                </button>
                                            </div>

                                            <div class="calendar__week week">
                                                <div class="calendar__week-text">Su</div>
                                                <div class="calendar__week-text">Mo</div>
                                                <div class="calendar__week-text">Tu</div>
                                                <div class="calendar__week-text">We</div>
                                                <div class="calendar__week-text">Th</div>
                                                <div class="calendar__week-text">Fr</div>
                                                <div class="calendar__week-text">Sa</div>
                                            </div>
                                            <div class="days"></div>
                                        </div>
                                    </div>

                                    <div class="ps-20 pt-20 pb-20 border-top border-neutral-200">
                                        <h6 class="text-lg mb-20">Upcoming Events</h6>
                                        <div
                                            class="pe-20 d-flex flex-column gap-32 overflow-y-auto max-h-500-px scroll-sm">
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-purple-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">09:00 - 09:45</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">AM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Marketing
                                                        Strategy Kickoff</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">Robert Fox</a>
                                                    </p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-warning-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">11:15 - 12:00</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">AM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Product
                                                        Design Brainstorm</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">Leslie
                                                            Alexander</a></p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-blue-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">02:00 - 03:00</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">PM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Client
                                                        Feedback Review</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">Courtney
                                                            Henry</a></p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-success-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">04:15 - 05:00</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">PM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Sprint
                                                        Planning & Task Allocation</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">Eleanor
                                                            Pena</a></p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-primary-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">01:15 - 02:00</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">PM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Client
                                                        Feedback Review</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">John</a></p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-16">
                                                <div class="ps-10 border-start-width-3-px border-warning-600">
                                                    <div class="d-flex align-items-end gap-6">
                                                        <h6 class="text-lg fw-normal mb-0">11:15 - 12:00</h6>
                                                        <span
                                                            class="text-xs text-secondary-light line-height-1 mb-2">AM</span>
                                                    </div>
                                                    <p class="text-secondary-light mt-4 mb-2 text-sm">Product
                                                        Design Brainstorm</p>
                                                    <p class="text-xs text-secondary-light mb-0">Lead by <a
                                                            href="javascript:void(0)"
                                                            class="text-primary-600 hover-underline">Leslie
                                                            Alexander</a></p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-16 radius-4 bg-neutral-100 text-secondary-light fw-semibold bg-hover-primary-600 hover-text-white">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xxl-4 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">User Overview</h6>
                                <div class="dropdown">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="entypo:dots-three-vertical"
                                            class="icon text-secondary-light"></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                                <iconify-icon icon="hugeicons:view"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                <iconify-icon icon="lucide:edit"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="delete-item dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
                                                <iconify-icon icon="fluent:delete-24-regular"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-20">
                                <div>
                                    <div class="mt-40 mb-24 pe-110 position-relative max-w-288-px mx-auto">
                                        <div
                                            class="w-170-px h-170-px rounded-circle z-1 position-relative d-inline-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/images/radial-bg1.png') }}" alt="Image"
                                                class="position-absolute top-0 start-0 z-n1 w-100 h-100 object-fit-cover">
                                            <h5 class="text-white"> 60% </h5>
                                        </div>
                                        <div
                                            class="w-144-px h-144-px rounded-circle z-1 position-relative d-inline-flex justify-content-center align-items-center position-absolute top-0 end-0 mt--36">
                                            <img src="{{ asset('assets/images/radial-bg2.png') }}" alt="Image"
                                                class="position-absolute top-0 start-0 z-n1 w-100 h-100 object-fit-cover">
                                            <h5 class="text-white"> 30% </h5>
                                        </div>
                                        <div
                                            class="w-110-px h-110-px rounded-circle z-1 position-relative d-inline-flex justify-content-center align-items-center position-absolute bottom-0 start-50 translate-middle-x ms-48">
                                            <img src="{{ asset('assets/images/radial-bg3.png') }}" alt="Image"
                                                class="position-absolute top-0 start-0 z-n1 w-100 h-100 object-fit-cover">
                                            <h5 class="text-white"> 10% </h5>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap gap-24 justify-content-evenly">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="w-12-px h-12-px rounded-pill bg-success-600"></span>
                                                <span class="text-secondary-light text-sm fw-normal">Student</span>
                                            </div>
                                            <h6 class="text-primary-light fw-semibold mb-0 mt-4 text-lg">750</h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="w-12-px h-12-px rounded-pill bg-warning-600"></span>
                                                <span class="text-secondary-light text-sm fw-normal">Teacher</span>
                                            </div>
                                            <h6 class="text-primary-light fw-semibold mb-0 mt-4 text-lg">56</h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="w-12-px h-12-px rounded-pill bg-blue-600"></span>
                                                <span class="text-secondary-light text-sm fw-normal">Staffs
                                                </span>
                                            </div>
                                            <h6 class="text-primary-light fw-semibold mb-0 mt-4 text-lg">15</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xxl-8 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">Income Vs Expense </h6>
                                <div class="dropdown">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="entypo:dots-three-vertical"
                                            class="icon text-secondary-light"></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                                <iconify-icon icon="hugeicons:view"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                <iconify-icon icon="lucide:edit"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="delete-item dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
                                                <iconify-icon icon="fluent:delete-24-regular"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-20">
                                <ul class="d-flex flex-wrap align-items-center justify-content-center mb-16 gap-3">
                                    <li class="d-flex align-items-center gap-8">
                                        <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                                        <span class="text-secondary-light text-sm fw-semibold">
                                            Income:
                                            <span class="text-primary-light fw-bold">$500</span>
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center gap-8">
                                        <span class="w-12-px h-12-px rounded-circle bg-warning-600"></span>
                                        <span class="text-secondary-light text-sm font-semibold">
                                            Expense:
                                            <span class="text-primary-light fw-bold"> $300</span>
                                        </span>
                                    </li>
                                </ul>
                                <div id="incomeExpense" class="apexcharts-tooltip-style-1"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-xxl-4">
                    <div class="card radius-12 border-0 h-100">
                        <div
                            class="d-flex align-items-center flex-wrap gap-2 justify-content-between py-12 px-20 border-bottom border-neutral-200">
                            <h6 class="mb-2 fw-bold text-lg">Top Students</h6>
                            <div class="dropdown">
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <iconify-icon icon="entypo:dots-three-vertical"
                                        class="icon text-secondary-light"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <a href="{{ route('students.index') }}"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                            <iconify-icon icon="hugeicons:view"
                                                class="icon text-lg line-height-1"></iconify-icon>
                                            View
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-28">
                                @forelse ($todayStudents as $student)
                                    <div class="d-flex align-items-center justify-content-between gap-10">
                                        <div class="d-flex align-items-center gap-12">
                                            <span
                                                class="w-44-px h-44-px rounded-circle d-flex justify-content-center align-items-center">
                                                <img src="{{ $student->image
                                                    ? asset('storage/' . $student->image)
                                                    : ($student->gender == 'female'
                                                        ? asset('assets/images/female-avtar.png')
                                                        : asset('assets/images/male-avtar.png')) }}"
                                                    alt="Student Image"
                                                    class="w-44-px h-44-px object-fit-cover rounded-circle">
                                            </span>
                                            <div class="">
                                                <h6 class="text-sm mb-2">
                                                    <a href="{{ route('students.show', $student->id) }}"
                                                        style="color: #25A194">
                                                        {{ ucwords($student?->name ?? '') }}
                                                    </a>
                                                </h6>
                                                <span
                                                    class="text-xs text-secondary-light">{{ $student->getRoleNames()->first() ?? 'User' }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-8">
                                            <span
                                                class="text-sm text-secondary-light">{{ $student?->practitioner_registration ?? '' }}</span>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            {{-- <div class="row text-center mt-5">
                                {{ $todayStudents->links() }}
                            </div> --}}
                        </div>

                    </div>

                </div>
                <div class="col-xxl-4">
                    <div class="card radius-12 border-0 h-100">
                        <div
                            class="d-flex align-items-center flex-wrap gap-2 justify-content-between py-12 px-20 border-bottom border-neutral-200">
                            <h6 class="mb-2 fw-bold text-lg">New Admissions</h6>
                            <div class="dropdown">
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <iconify-icon icon="entypo:dots-three-vertical"
                                        class="icon text-secondary-light"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <a href="{{ route('students.index') }}"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                            <iconify-icon icon="hugeicons:view"
                                                class="icon text-lg line-height-1"></iconify-icon>
                                            View
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-28">
                                <div class="d-flex flex-column gap-28">
                                    @forelse ($weeklyStudents as $student)
                                        <div class="d-flex align-items-center justify-content-between gap-10">
                                            <div class="d-flex align-items-center gap-12">
                                                <span
                                                    class="w-44-px h-44-px rounded-circle d-flex justify-content-center align-items-center">
                                                    <img src="{{ $student->image
                                                        ? asset('storage/' . $student->image)
                                                        : ($student->gender == 'female'
                                                            ? asset('assets/images/female-avtar.png')
                                                            : asset('assets/images/male-avtar.png')) }}"
                                                        alt="Student Image"
                                                        class="w-44-px h-44-px object-fit-cover rounded-circle">
                                                </span>
                                                <div class="">
                                                    <h6 class="text-sm mb-2">
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            style="color: #25A194">
                                                            {{ ucwords($student?->name ?? '') }}
                                                        </a>
                                                    </h6>
                                                    <span
                                                        class="text-xs text-secondary-light">{{ $student->getRoleNames()->first() ?? 'User' }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-8">
                                                <span
                                                    class="text-sm text-secondary-light">{{ $student?->practitioner_registration ?? '' }}</span>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                {{-- <div class="row text-right mt-5">
                                    {{ $weeklyStudents->links() }}
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">Top Cources</h6>
                                <div class="dropdown">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="entypo:dots-three-vertical"
                                            class="icon text-secondary-light"></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <a href="{{ route('books.index') }}"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                                <iconify-icon icon="hugeicons:view"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                View
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            @forelse ($books as $book)
                                <div class="ps-20 pt-20 pb-20">
                                    <div class="pe-20 d-flex flex-column gap-20 max-h-462-px overflow-y-auto scroll-sm">
                                        <div class="d-flex align-items-center justify-content-between gap-16">
                                            <div class="d-flex align-items-start gap-16">
                                                <div class="">
                                                    <h6 class="mb-0 text-lg">{{ ucwords($book?->name ?? '') }}</h6>

                                                    <span
                                                        class="text-secondary-light text-sm mb-0">{{ ucwords($book?->publisher ?? '') }}</span>
                                                </div>
                                            </div>
                                            @if (!empty($book->pdf))
                                                <div class="text-end">
                                                    <span class="d-block fw-semibold text-primary-light"><a
                                                            href="{{ route('book.view', ['path' => $book->pdf]) }}"
                                                            target="_blank" style="color: #25A194">View</a></span>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>


                <div class="col-xxl-4 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">Top Medicine</h6>
                                <div class="dropdown">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="entypo:dots-three-vertical"
                                            class="icon text-secondary-light"></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <a href="{{ route('medicines.index') }}"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                                <iconify-icon icon="hugeicons:view"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                View
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="ps-20 pt-20 pb-20">
                                <div class="pe-20 d-flex flex-column gap-20 max-h-462-px overflow-y-auto scroll-sm">
                                    @forelse ($medicines as $medicine)
                                        <div class="d-flex align-items-center justify-content-between gap-16">
                                            <div class="d-flex align-items-start gap-16">
                                                {{-- <img src="{{ asset('assets/images/top-teacher-img1.png') }}" alt="Thumbnail"
                                                class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0"> --}}
                                                <div class="">
                                                    <h6 class="mb-0 text-lg">{{ $medicine?->name ?? '' }}</h6>
                                                    <span
                                                        class="text-secondary-light text-sm mb-0">{{ $medicine?->code ?? '' }}</span>
                                                </div>
                                            </div>
                                            {{-- <div class="text-end">
                                            <span class="d-block fw-semibold text-primary-light">Mathematics</span>
                                        </div> --}}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                {{-- <div class="col-xxl-4 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between px-20 py-16 border-bottom border-neutral-200">
                                <h6 class="text-lg mb-0">New Admissions</h6>
                                <div class="dropdown">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="entypo:dots-three-vertical"
                                            class="icon text-secondary-light"></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                                <iconify-icon icon="hugeicons:view"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                <iconify-icon icon="lucide:edit"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="delete-item dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
                                                <iconify-icon icon="fluent:delete-24-regular"
                                                    class="icon text-lg line-height-1"></iconify-icon>
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-20">
                                <div class="position-relative text-center">
                                    <div id="newAdmissions" class="y-value-left apexcharts-tooltip-z-none">
                                    </div>
                                    <div class="text-center position-absolute top-50 start-50 translate-middle">
                                        <h5 class="mb-4">50</h5>
                                        <span class="text-secondary-light">Total Admissions</span>
                                    </div>
                                </div>
                                <ul class="d-flex flex-wrap align-items-center justify-content-center mt-48 gap-24">
                                    <li class="d-flex align-items-center gap-2">
                                        <span class="w-12-px h-12-px radius-2 bg-success-600 rotate-45-deg"></span>
                                        <div class="">
                                            <span class="text-secondary-light fw-medium">
                                                English:
                                                <span class="fw-bold text-primary-light">15</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <span class="w-12-px h-12-px radius-2 bg-blue-600 rotate-45-deg"></span>
                                        <div class="">
                                            <span class="text-secondary-light fw-medium">
                                                Math:
                                                <span class="fw-bold text-primary-light">15</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <span class="w-12-px h-12-px radius-2 bg-warning-600 rotate-45-deg"></span>
                                        <div class="">
                                            <span class="text-secondary-light fw-medium">
                                                Biology:
                                                <span class="fw-bold text-primary-light">5</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <span class="w-12-px h-12-px radius-2 bg-primary-600 rotate-45-deg"></span>
                                        <div class="">
                                            <span class="text-secondary-light fw-medium">
                                                Physics:
                                                <span class="fw-bold text-primary-light">10</span>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
