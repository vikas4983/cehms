@extends('layouts.app')
@section('title', 'Unpublish - Add')
@section('content')
    <style>
        table.dataTable {
            width: 100% !important;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Unpublish Book List</h1>
                <div class="">
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                    <a href="javascript:void(0)" class="text-secondary-light hover-text-primary hover-underline d-none"> /
                        Book</a>
                    <span class="text-secondary-light">/ Unpublish Book List</span>
                </div>
            </div>
            @can('create book')
                <a href="{{ route('books.create') }}" class="btn btn-primary-600 d-flex align-items-center gap-6 ">
                    <span class="d-flex text-md">
                        <i class="ri-add-large-line"></i>
                    </span>
                    Add Book
                </a>
            @endcan
        </div>

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
                    @include('alerts.alert')
                    <div class="p-0">
                        <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>
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
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">View Book</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $count => $book)
                                    <tr>
                                        <td>
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    {{ (int) $count + 1 }}
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $book?->name ?? '' }}</td>
                                        <td>{{ $book?->publisher ?? '' }}</td>
                                        <td>
                                            @can('view-book')
                                                @if (!empty($book->pdf))
                                                    <a href="{{ route('book.view', ['path' => $book->pdf]) }}"
                                                        target="_blank">View
                                                        Book</a>
                                                @endif
                                            @endcan
                                        </td>
                                        <td>
                                            @if ($book?->status ?? '' == '1')
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
                                                    data-bs-toggle="dropdown" data-bs-display="static"
                                                    aria-expanded="false">
                                                    <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                    @can('edit-book')
                                                        <li>
                                                            <x-button.edit-button-component :route="route('books.edit', $book->id)" />
                                                        </li>
                                                    @endcan
                                                    @can('delete-book')
                                                        <li>
                                                            <x-button.delete-button-component :route="route('books.destroy', $book?->id ?? '')"
                                                                :id="$book->id" />
                                                        </li>
                                                    @endcan
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
    <!-- Modal Delete Event start -->
    <x-button.confirm-delete-component />

@endsection
