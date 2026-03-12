 <div class="modal fade" id="confirmDownloadModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog modal-dialog-centered max-w-340-px">
         <div class="modal-content radius-16 bg-base">
             <div class="modal-body pt-32 px-36 pb-24 text-center">
                 <span class="mb-16 fs-1 line-height-1 text-danger">
                     <iconify-icon icon="fluent:arrow-download-24-regular" class="menu-icon text-success"></iconify-icon>
                 </span>
                 <h6 class="text-lg fw-semibold text-primary-light mb-0">Are your sure you want to download file
                 </h6>
                 <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                     <button type="reset"
                         class="flex-grow-1 border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-24 py-11 radius-8"
                         data-bs-dismiss="modal">
                         Cancel
                     </button>
                     <form id="download-form" method="POST">
                         @csrf
                         <button type="submit"
                             class="flex-grow-1 btn btn-primary-600 border border-primary-600 text-md px-16 py-12 radius-8">
                             Yes, Download
                         </button>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const deleteModal = document.getElementById('confirmDownloadModal');
         const deleteForm = document.getElementById('download-form');
         deleteModal.addEventListener('show.bs.modal', function(event) {
             const button = event.relatedTarget;
             const url = button.getAttribute('data-url');
             deleteForm.action = url;

         });
     });
 </script>
