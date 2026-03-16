@extends('layouts.app')
@section('title', 'Menu - Add')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add Menu </h1>
                <div class="">
                    <a href="{{route('dashboard')}}" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <span class="text-secondary-light">/ Menus</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <span class="d-flex text-md">
                    <i class="ri-add-large-line"></i>
                </span>
                Add Menu
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
                    <div class="row " style="display: flex">
                        <div class="col-sm-6">
                            <table class="table bordered-table mb-0 data-table mt-3" id="dataTable" data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input menuCheckbox" type="checkbox" id="selectAll">
                                                <label class="form-check-label">
                                                    S.L
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($headers as $count => $header)
                                        <tr>
                                            <td>
                                                <div class="form-check style-check d-flex align-items-center">
                                                    <input class="form-check-input menuCheckbox" type="checkbox">
                                                    <label class="form-check-label">{{ $count + 1 }}</label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="text-primary-light text-xl"
                                                        data-bs-toggle="dropdown" data-bs-display="static">
                                                        <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                        <li>

                                                            <button type="button"
                                                                class="editHeaderBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                data-header-id="{{ $header->id }}"
                                                                data-header-name="{{ $header->name }}"
                                                                data-header-status="{{ $header->status }}"
                                                                data-header-url="{{ $header->url }}"
                                                                data-header-menu-type="{{ $header->menu_type }}"
                                                                data-header-parent-id="{{ $header->parent_id }}">
                                                                <i class="ri-edit-2-line"></i>Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button
                                                                class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                type="button" data-bs-toggle="modal"
                                                                data-header-id="{{ $header->id }}"
                                                                data-bs-target="#headerDeleteModal">
                                                                <i class="ri-delete-bin-6-line"></i> Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div><span
                                                    style="padding:1px 2px;font-size:9px;border-radius:4px;color:white;margin-bottom:1px;background-color: {{ $header->status === 1 ? 'green' : 'red' }};">
                                                    {{ $header->status === 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $header->name }}
                                                @foreach ($header->children as $child)
                                                    → {{ $child->name }}
                                                @endforeach

                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table bordered-table mb-0 data-table mt-3" id="dataTable"
                                data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input menuCheckbox" type="checkbox"
                                                    id="selectAll">
                                                <label class="form-check-label">
                                                    S.L
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Menu Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($footers as $count => $footer)
                                        <tr>
                                            <td>
                                                <div class="form-check style-check d-flex align-items-center">
                                                    <input class="form-check-input menuCheckbox" type="checkbox">
                                                    <label class="form-check-label">{{ $count + 1 }}</label>
                                                </div>
                                            </td>
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
                                                                class="editFooterBtn edit-sidebar-btn dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                data-footer-id="{{ $footer->id }}"
                                                                data-footer-name="{{ $footer->name }}"
                                                                data-footer-status="{{ $footer->status }}"
                                                                data-footer-url="{{ $footer->url }}"
                                                                data-footer-menu-type="{{ $footer->menu_type }}"
                                                                data-footer-parent-id="{{ $footer->parent_id }}">
                                                                <i class="ri-edit-2-line"></i>Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button
                                                                class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                                type="button" data-bs-toggle="modal"
                                                                data-footer-menu-id="{{ $footer->id }}"
                                                                data-bs-target="#footerDeleteModal"
                                                                id="bulkDeleteTrigger">
                                                                <i class="ri-delete-bin-6-line"></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div><span
                                                    style="padding:1px 2px;font-size:9px;border-radius:4px;color:white;margin-bottom:1px;background-color: {{ $footer->status === 1 ? 'green' : 'red' }};">
                                                    {{ $footer->status === 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                               </span>
                                            </td>
                                            <td> {{ $footer->name }}
                                                @foreach ($footer->children as $child)
                                                    → {{ $child->name }}
                                                @endforeach
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
    </div>
    <!-- Add sidebar start -->

    <div
        class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Add Menu</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="addHeadeMmenu" action="{{ route('menus.store') }}"
            method="POST"class="d-flex flex-column p-20 validate-form">
            @csrf
            <div class="row g-3">
                <div class="col-sm-4">
                    <div class="">
                        <label for="headerMenuName"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu Name
                        </label>
                        <input type="text" name="name" class="form-control required-field" id="menuName"
                            placeholder="Enter menu name">
                        <div class="invalid-feedback">
                            Menu name is required
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="headerMenuType"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu Type
                        </label>
                        <select id="menuType" name="menu_type" class=" form-control form-select ">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                        <div class="invalid-feedback">
                            Menu type is required
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <label for="headerStatus"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                        </label>
                        <select id="status" name="status" class="form-control form-select">
                            <option value="" disabled>Select One</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="">
                        <label for="parent" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Parent
                            Menu
                        </label>
                        <select id="headerParent" name="parent_id" class="form-control form-select">
                            <option value="">Is Parent</option>

                            @foreach ($menus as $menu)
                                {{-- Parent --}}
                                <option value="{{ $menu->id }}"
                                    style="color: {{ $menu->menu_type === 1 ? '#17A43B' : '#FF9F29' }};">
                                    {{ $menu->name }} &nbsp;&nbsp;&nbsp; -> &nbsp;&nbsp;&nbsp;
                                    {{ $menu->menu_type === 1 ? 'Header' : 'Footer' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="">
                        <label for="headerUrl" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Url
                        </label>
                        <input type="text" name="url" class=" required-field form-control" id="headerUrl"
                            placeholder="Enter url name">
                        <div class="invalid-feedback">
                            Url is required
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="reset"
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

    <!-- Edit footer start -->
    <div
        class="edit-sidebar edit-footer-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 ">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Edit Footer Menu </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editFooterForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editFooterId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="col-sm-4">
                    <div class="">
                        <label for="editFooter" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu
                            Name
                        </label>
                        <input type="text" id="editFooterName" name="name" class="form-control"
                            placeholder="Enter menu Name">
                        <div class="invalid-feedback">
                            menu name is required
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="editFooter" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu
                            Type
                        </label>
                        <select id="editFooterType" name="menu_type" class=" form-control form-select ">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                        <div class="invalid-feedback">
                            Menu type is required
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="status" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                        </label>
                        <select id="editFooterStatus" name="status" class="form-control form-select">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="">
                        <label for="featuresEditClass"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Parent Menu
                        </label>
                        <select id="editFooterParentId" name="parent_id" class="form-control form-select">

                            <option value="">Is Parent</option>
                            @foreach ($footers as $footer)
                                @if ($footer->parent_id == null)
                                    <option value="{{ $footer->id }}">{{ $footer->name }}
                                        @foreach ($footer->children as $child)
                                            → {{ $child->name }}
                                        @endforeach
                                    </option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="">
                        <label for="headerUrl" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Url
                        </label>
                        <input type="text" name="url" class=" required-field form-control" id="editFooterUrl"
                            placeholder="Enter url name">
                        <div class="invalid-feedback">
                            Url is required
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="reset"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                            Cancel
                        </button>
                        <button type="submit"
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8 max-w-156-px w-100">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Edit header start -->
    <div
        class="edit-sidebar edit-header-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 ">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Edit Header Menu </h5>
            <button type="button" class="close-edit-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form id="editHeaderForm" method="POST" class="d-flex flex-column p-20">
            <input type="hidden" name="id" id="editHeaderId">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="col-sm-4">
                    <div class="">
                        <label for="headerName" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu
                            Name
                        </label>
                        <input type="text" id="editHeaderName" name="name" class="form-control"
                            placeholder="Enter menu Name">
                        <div class="invalid-feedback">
                            menu name is required
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="headerType" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Menu
                            Type
                        </label>
                        <select id="editHeaderType" name="menu_type" class=" form-control form-select ">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                        <div class="invalid-feedback">
                            Menu type is required
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <label for="status" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status
                        </label>
                        <select id="editHeaderStatus" name="status" class="form-control form-select">
                            <option value="Select a Class" disabled>Select One</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="">
                        <label for="featuresEditClass"
                            class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Parent Menu
                        </label>
                        <select id="editHeaderParentId" name="parent_id" class="form-control form-select">

                            <option value="">Is Parent</option>
                            @foreach ($headers as $header)
                                @if ($header->parent_id == null)
                                    <option value="{{ $header->id }}">{{ $header->name }}
                                        @foreach ($header->children as $child)
                                            → {{ $child->name }}
                                        @endforeach
                                    </option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="">
                        <label for="headerUrl" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Url
                        </label>
                        <input type="text" name="url" class=" required-field form-control" id="editHeaderUrl"
                            placeholder="Enter url name">
                        <div class="invalid-feedback">
                            Url is required
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="reset"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                            Cancel
                        </button>
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
    <!-- Modal Footer Delete  -->
    <div class="modal fade" id="footerDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog modal-dialog-centered max-w-340-px">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-body pt-32 px-36 pb-24 text-center">
                    <span class="mb-16 fs-1 line-height-1 text-danger">
                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                    </span>
                    <h6 class="text-lg fw-semibold text-primary-light mb-0">Are your sure you want to Suspend this teacher
                    </h6>
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="reset"
                            class="flex-grow-1 border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-24 py-11 radius-8"
                            data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <form id="deleteFooterMenuForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="deleteBtn flex-grow-1 btn btn-primary-600 border border-primary-600 text-md px-16 py-12 radius-8">
                                Yes, Suspend
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Footer Delete Event end -->

    <!-- Modal Header Delete  -->
    <div class="modal fade" id="headerDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog modal-dialog-centered max-w-340-px">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-body pt-32 px-36 pb-24 text-center">
                    <span class="mb-16 fs-1 line-height-1 text-danger">
                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                    </span>
                    <h6 class="text-lg fw-semibold text-primary-light mb-0">Are your sure you want to Suspend this teacher
                    </h6>
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="reset"
                            class="flex-grow-1 border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-24 py-11 radius-8"
                            data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <form id="deleteHeaderMenuForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="deleteBtn flex-grow-1 btn btn-primary-600 border border-primary-600 text-md px-16 py-12 radius-8">
                                Yes, Suspend
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Header Delete Event end -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                const footerBtn = e.target.closest('.editFooterBtn');
                const headerBtn = e.target.closest('.editHeaderBtn');
                const closeBtn = e.target.closest('.close-edit-sidebar');
                const footerSidebar = document.querySelector('.edit-footer-sidebar');
                const headerSidebar = document.querySelector('.edit-header-sidebar');

                // ================= CLOSE SIDEBAR =================
                if (closeBtn) {
                    footerSidebar.classList.remove('active-translate-0');
                    headerSidebar.classList.remove('active-translate-0');
                    return;
                }

                // ================= FOOTER EDIT =================
                if (footerBtn) {

                    // Close header if open
                    headerSidebar.classList.remove('active-translate-0');

                    // Open footer
                    footerSidebar.classList.add('active-translate-0');

                    const id = footerBtn.dataset.footerId;
                    const name = footerBtn.dataset.footerName;
                    const status = footerBtn.dataset.footerStatus;
                    const url = footerBtn.dataset.footerUrl;
                    const menuType = footerBtn.dataset.footerMenuType;
                    const parentId = footerBtn.dataset.footerParentId;

                    document.getElementById('editFooterId').value = id;
                    document.getElementById('editFooterName').value = name;
                    document.getElementById('editFooterStatus').value = status;
                    document.getElementById('editFooterType').value = menuType;
                    document.getElementById('editFooterParentId').value = parentId;
                    document.getElementById('editFooterUrl').value = url;

                    document.getElementById('editFooterForm').action =
                        "{{ route('menus.update', ':id') }}".replace(':id', id);
                    return;
                }
                // ================= HEADER EDIT =================
                if (headerBtn) {
                    // Close footer if open
                    footerSidebar.classList.remove('active-translate-0');
                    // Open header
                    headerSidebar.classList.add('active-translate-0');
                    const id = headerBtn.dataset.headerId;
                    const name = headerBtn.dataset.headerName;
                    const status = headerBtn.dataset.headerStatus;
                    const url = headerBtn.dataset.headerUrl;
                    const menuType = headerBtn.dataset.headerMenuType;
                    const parentId = headerBtn.dataset.headerParentId;
                    document.getElementById('editHeaderId').value = id;
                    document.getElementById('editHeaderName').value = name;
                    document.getElementById('editHeaderStatus').value = status;
                    document.getElementById('editHeaderType').value = menuType;
                    document.getElementById('editHeaderParentId').value = parentId;
                    document.getElementById('editHeaderUrl').value = url;
                    document.getElementById('editHeaderForm').action =
                        "{{ route('menus.update', ':id') }}".replace(':id', id);
                    return;
                }

            });
            // =========================
            // FOOTER DELETE MODAL
            // =========================
            const footerModal = document.getElementById('footerDeleteModal');
            if (footerModal) {
                footerModal.addEventListener('show.bs.modal', function(e) {

                    const button = e.relatedTarget;
                    if (!button) return;

                    const footerMenuId = button.getAttribute('data-footer-menu-id');
                    const footerForm = document.getElementById('deleteFooterMenuForm');
                    if (footerForm) {
                        footerForm.action = "{{ route('menus.destroy', ':id') }}".replace(':id',
                            footerMenuId);

                    }

                });
            }
            // =========================
            // HEADER DELETE MODAL
            // =========================
            const headerModal = document.getElementById('headerDeleteModal');
            if (headerModal) {
                headerModal.addEventListener('show.bs.modal', function(e) {

                    const button = e.relatedTarget;
                    if (!button) return;

                    const headerMenuId = button.getAttribute('data-header-id');
                    const headerForm = document.getElementById('deleteHeaderMenuForm');
                    if (headerForm) {
                        headerForm.action = "{{ route('menus.destroy', ':id') }}".replace(':id',
                            headerMenuId);
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.validate-form');
            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    // Only check inputs having class "required-field"
                    const inputs = form.querySelectorAll('.required-field');
                    inputs.forEach(function(input) {
                        input.classList.remove('is-invalid');
                        if (input.value.trim() === '') {
                            input.classList.add('is-invalid');
                            // Auto set error message using label text
                            const label = form.querySelector("label[for='" + input.id +
                                "']");
                            const feedback = input.nextElementSibling;

                            if (label && feedback && feedback.classList.contains(
                                    'invalid-feedback')) {
                                feedback.textContent = label.textContent.trim() +
                                    " is required";
                            }

                            if (isValid) input.focus();
                            isValid = false;
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                    }

                });

            });

        });
    </script>
@endsection
