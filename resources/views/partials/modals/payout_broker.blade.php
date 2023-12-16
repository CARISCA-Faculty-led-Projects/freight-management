 <!--begin::Modal - Adjust Balance-->
 <div class="modal fade" id="kt_modal_payout_broker" tabindex="-1" aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-650px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Modal header-->
             <div class="modal-header">
                 <!--begin::Modal title-->
                 <h2 class="fw-bold">Payout</h2>
                 <!--end::Modal title-->
                 <!--begin::Close-->
                 <div id="kt_modal_payout_broker_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                     <i class="ki-duotone ki-cross fs-1">
                         <span class="path1"></span>
                         <span class="path2"></span>
                     </i>
                 </div>
                 <!--end::Close-->
             </div>
             <!--end::Modal header-->
             <!--begin::Modal body-->
             <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                 <!--begin::Balance preview-->
                 <div class="col">
                     <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                         <span class="fs-4 fw-semibold text-info pb-1 px-2">Payout Amount</span>
                         <span class="fs-lg-2tx fw-bold d-flex justify-content-center">GHS
                             <span>3000</span></span>
                     </div>
                 </div>

                 <!--end::Balance preview-->
                 <!--begin::Form-->
                 <form id="kt_modal_payout_broker_form" class="form" action="#">


                     <!--begin::Input group-->
                     <div class="fv-row mb-7 mt-10">
                         <!--begin::Label-->
                         <label class="fs-6 fw-semibold form-label mb-2">Add payout note</label>
                         <!--end::Label-->
                         <!--begin::Input-->
                         <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                         <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Disclaimer-->
                     <!-- <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be
                         audited by the financial team every fortnight. Please maintain your invoices and
                         receipts until then. Thank you.</div> -->
                     <!--end::Disclaimer-->
                     <!--begin::Actions-->
                     <div class="text-center">
                         <button type="reset" id="kt_modal_payout_broker_cancel"
                             class="btn btn-light me-3">Discard</button>
                         <button type="submit" id="kt_modal_payout_broker_submit" class="btn btn-primary">
                             <span class="indicator-label">Submit</span>
                             <span class="indicator-progress">Please wait...
                                 <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                         </button>
                     </div>
                     <!--end::Actions-->
                 </form>
                 <!--end::Form-->
             </div>
             <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
     </div>
     <!--end::Modal dialog-->
 </div>
 <!--end::Modal - New Card-->
