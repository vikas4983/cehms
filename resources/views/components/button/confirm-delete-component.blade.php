 <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog modal-dialog-centered max-w-340-px">
         <div class="modal-content radius-16 bg-base">
             <div class="modal-body pt-32 px-36 pb-24 text-center">

                 @if ($route == 'trash-student')
                     <span class="mb-16 fs-1 line-height-1 text-danger">
                         <iconify-icon icon="mdi:delete-forever" class="menu-icon"></iconify-icon>
                     </span>
                     <h6 class="text-lg fw-semibold text-primary-light mb-0">Are you sure you want to delete permanently
                         ?
                     </h6>
                 @else
                     <span class="mb-16 fs-1 line-height-1 text-danger">
                         <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                     </span>
                     <h6 class="text-lg fw-semibold text-primary-light mb-0">Are you sure you want to delete ?
                     </h6>
                 @endif
                 <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                     <button type="reset"
                         class="flex-grow-1 border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-24 py-11 radius-8"
                         data-bs-dismiss="modal">
                         Cancel
                     </button>
                     <form id="delete-form" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit"
                             class="flex-grow-1 btn btn-primary-600 border border-primary-600 text-md px-16 py-12 radius-8">
                             @if ($route == 'trash-student')
                                 Yes, Delete
                             @else
                                 Yes, Delete
                             @endif
                         </button>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const deleteModal = document.getElementById('deleteModal');
         const deleteForm = document.getElementById('delete-form');
         deleteModal.addEventListener('show.bs.modal', function(event) {
             const button = event.relatedTarget;
             const url = button.getAttribute('data-url');
             deleteForm.action = url;

         });
     });
 </script>
