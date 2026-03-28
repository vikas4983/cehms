<div
    class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
    <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
        <h5 class="text-lg mb-0">Add Banner</h5>
        <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
            <i class="ri-close-large-line"></i>
        </button>
    </div>
    <form id="addBanner" action="{{ route('banners.store') }}" method="POST"class="d-flex flex-column p-20"
        enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-sm-4">
                <div>
                    <label for="banner" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                        Upload Banner
                    </label>

                    <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror"
                        id="banner">

                    @error('banner')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <label for="order" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                        Banner Order
                    </label>

                    <input type="text" name="order" value="{{ old('order') }}" placeholder="Enter order number"
                        class="form-control @error('order') is-invalid @enderror" id="order">

                    @error('order')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            @can('change-banner-status')
                <div class="col-sm-4">
                    <div>
                        <label for="status" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Status
                        </label>

                        <select id="status" name="status"
                            class="form-control form-select @error('status') is-invalid @enderror">
                            <option disabled>Select One</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endcan
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
