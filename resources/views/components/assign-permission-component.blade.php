<div class="modal fade" id="student{{ $student->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5 text-center w-100" id="exampleModalLabel">
                    {{ ucwords($student?->name ?? '') }} |
                    {{ ucfirst($student->roles()->pluck('name')->first() ?? 'No Role') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <label class="d-flex justify-content-center text-sm fw-semibold text-primary-light d-inline-block mt-2">
                Roles
            </label>
            <div class="modal-body">
                <form id="addRole" action="{{ route('permission.assign') }}" method="POST"class="d-flex flex-column">
                    <input type="hidden" name="studentId" value="{{ $student->id }}" id="studentId">
                    @csrf

                    <div class="row g-3 ">
                        <div class="col-sm-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input selectAllCbForR" name="roles[]" type="checkbox"
                                    value="all">
                                <label class="form-check-label" for="selectAll">&nbsp;
                                    All Roles
                                </label>
                            </div>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input singleCheckboxForR mt-2"
                                            name="roles[]" value="{{ $role->name }}"
                                            {{ in_array($role->name, old('roles', $student->roles->pluck('name')->toArray())) ? 'checked' : '' }}>
                                        &nbsp;<label class="form-check-label" for="role{{ $role->id }}">
                                            {{ ucwords($role->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <label
                            class=" d-flex justify-content-center text-sm fw-semibold text-primary-light d-inline-block mt-2">
                            Permissions
                        </label>
                        <div class="col-sm-12">
                            <div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input selectAllCb" name="permissions[]" type="checkbox"
                                        value="all" id="selectAllCb">
                                    <label class="form-check-label" for="selectAll">&nbsp;
                                        All Permissions
                                    </label>
                                </div>
                                <div class="d-flex flex-wrap gap-3 mt-2">
                                    @foreach ($groupedPermissions as $group => $permissions)
                                        <div class="col-12 mb-2">
                                            <span class="fw-bold text-primary">{{ ucfirst($group) }}
                                                Permissions</span>
                                            <div class="d-flex flex-wrap gap-3">
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input singleCheckbox mt-2"
                                                            name="permissions[]" value="{{ $permission->name }}"
                                                            {{ in_array($permission->name, old('permissions', $student->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>
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
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                                <button type="button" data-bs-dismiss="modal"
                                    class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8 max-w-156-px w-100">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        function handleSelectAll(selectAllClass, singleClass) {
            const selectAll = document.querySelector(selectAllClass);
            const singles = document.querySelectorAll(singleClass);

            if (!selectAll) return;

            selectAll.addEventListener("change", function() {
                singles.forEach(cb => cb.checked = this.checked);
            });

            singles.forEach(cb => {
                cb.addEventListener("change", function() {
                    if (!this.checked) {
                        selectAll.checked = false;
                    }
                });
            });
        }

        handleSelectAll('.selectAllCb', '.singleCheckbox');
        handleSelectAll('.selectAllCbForR', '.singleCheckboxForR');

    });
</script>
