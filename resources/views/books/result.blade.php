<div class="p-0">
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
                <th scope="col">Publisher</th>
                <th scope="col">Image</th>
                <th scope="col">Book</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $count => $book)
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
                        {{ $book->name }}
                    </td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                        @if (!empty($book->image))
                            <a href="{{ asset('storage/' . $book->image) }}" target="_blank">
                                View
                            </a>
                        @endif
                    </td>
                    <td>
                        @if (!empty($book->pdf))
                            <a href="{{ route('book.view', ['path' => $book->pdf]) }}" target="_blank">Download
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($book->status == '1')
                            <span
                                class="bg-success-100 text-success-600 px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                        @else
                            <span
                                class="bg-danger-100 text-danger-600 px-24 py-4 radius-4 fw-medium text-sm">Inactive</span>
                        @endif
                    </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">
                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                               @can('edit book')
                                <li>
                                    <x-button.edit-button-component :route="route('books.edit', $book->id)" />

                                </li>
                               @endcan
                               @can('delete book')
                                <li>
                                    <x-button.delete-button-component :route="route('books.destroy', $book->id)" :id="$book->id" />
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
    <div class="row text-right">
        {{ $data->links() }}
    </div>
</div>
