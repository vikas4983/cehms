<button type="button"
    class=" dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
    data-bs-toggle="modal" data-url="{{ $route }}" data-bs-target="#deleteModal"
    onclick="setDeleteId({{ $id }})"><i class="ri-delete-bin-6-line"></i>Delete</button>
 