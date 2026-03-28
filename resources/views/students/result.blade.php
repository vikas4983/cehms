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
        @forelse ($data as $count => $student)
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
                    <a href="{{ route('students.show', $student?->id ?? '') }}" style="color:rgb(9, 146, 112)">
                        {{ $student?->name ?? '' }}</a>
                </td>
                <td>
                    {{ $student?->email ?? '' }}
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">
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
                        <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">
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
                        <x-assign-permission-component :groupedPermissions="$groupedPermissions" :student="$student" :roles="$roles" />
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
