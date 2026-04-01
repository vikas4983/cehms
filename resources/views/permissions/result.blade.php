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
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $count => $permission)
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
                        {{ $permission->created_at->format('d M Y') }}
                    </td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @if ($permission->status == '1')
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
                                @can('edit-permission')
                                    <li>
                                        <x-button.edit-button-component :route="route('permissions.edit', $permission->id)" />

                                    </li>
                                @endcan
                                @can('delete-permission')
                                    <li>
                                        <x-button.delete-button-component :route="route('permissions.destroy', $permission->id)" :id="$permission->id" />
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
