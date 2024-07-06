 <!--begin::Modal - Vehicles - Add-->
 <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-650px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Form-->
             <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="/apps/customers/list">
                 <!--begin::Modal header-->
                 <div class="modal-header" id="kt_modal_add_customer_header">
                     <!--begin::Modal title-->
                     <h2 class="fw-bold">Quick Add Vehicle</h2>
                     <!--end::Modal title-->
                     <!--begin::Close-->
                     <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                         <i class="ki-duotone ki-cross fs-1">
                             <span class="path1"></span>
                             <span class="path2"></span>
                         </i>
                     </div>
                     <!--end::Close-->
                 </div>
                 <!--end::Modal header-->
                 <!--begin::Modal body-->
                 <div class="modal-body py-10 px-lg-17">
                     <!--begin::Scroll-->
                     <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                         data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                         <!--begin::Input group-->
                         <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="fs-6 fw-semibold mb-2">
                                     <span class="required">Organization</span>
                                     <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                         <i class="ki-duotone ki-information fs-7">
                                             <span class="path1"></span>
                                             <span class="path2"></span>
                                             <span class="path3"></span>
                                         </i>
                                     </span>
                                 </label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <select name="country" aria-label="Select a Country" data-control="select2"
                                     data-placeholder="Select an organization..."
                                     data-dropdown-parent="#kt_modal_add_customer"
                                     class="form-select form-select-solid fw-bold">
                                     <option value="">Select an organization...</option>
                                     <option value="AF">Jess Fleet Management Inc</option>
                                     <option value="AX">TopTier Trucks</option>
                                     <option value="AL">RiverDale Fleet</option>
                                 </select>
                                 <!--end::Input-->
                             </div>
                             <!--end::Input group-->
                         <!--begin::Input group-->
                         <!--begin::Input group-->
                         <div class="row g-9 mb-7">
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Make</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" placeholder="" name="state"
                                         value="Victoria" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Model</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" placeholder="" name="postcode"
                                         value="" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                             </div>
                             <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="row g-9 mb-7">
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Manufacture Year</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" placeholder="" name="state"
                                         value="" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Licence Number</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" placeholder="" name="postcode"
                                         value="" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                             </div>
                             <!--end::Input group-->
                         <div class="fv-row mb-7">
                             <!--begin::Label-->
                             <label class="required fs-6 fw-semibold mb-2">Max Load (KG)</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <input type="number" class="form-control form-control-solid" placeholder="" name="name"
                                 value="Sean Bean" />
                             <!--end::Input-->
                         </div>
                         
                         <!--end::Input group-->
                         
                         <!--begin::Billing toggle-->
                         <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                             href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                             aria-controls="kt_customer_view_details">Driver Information
                             <span class="ms-2 rotate-180">
                                 <i class="ki-duotone ki-down fs-3"></i>
                             </span></div>
                         <!--end::Billing toggle-->
                         <!--begin::Billing form-->
                         <div id="kt_modal_add_customer_billing_info" class="collapse show">
                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Name</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" placeholder="" name="address1"
                                     value="" />
                                 <!--end::Input-->
                             </div>
                             <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Full Name</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" placeholder="" name="address2"
                                     value="" />
                                 <!--end::Input-->
                             </div>
                             <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Email</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" placeholder="" name="city"
                                     value="" />
                                 <!--end::Input-->
                             </div>
                             <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="row g-9 mb-7">
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Phone number</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" placeholder="" name="state"
                                         value="" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                                 <!--begin::Col-->
                                 <div class="col-md-6 fv-row">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">DOB</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input class="form-control form-control-solid" type="date" placeholder="" name="postcode"
                                         value="3000" />
                                     <!--end::Input-->
                                 </div>
                                 <!--end::Col-->
                             </div>
                             <!--end::Input group-->
                             
                             <!--begin::Input group-->
                             <div class="fv-row mb-7">
                                 <!--begin::Wrapper-->
                                 <div class="d-flex flex-stack">
                                     <!--begin::Label-->
                                     <div class="me-5">
                                         <!--begin::Label-->
                                         <label class="fs-6 fw-semibold">Agree to our terms and Conditions?</label>
                                         <!--end::Label-->
                                         <!--begin::Input-->
                                         <div class="fs-7 fw-semibold text-muted">If you need more info, please
                                             check vehicle terms & conditions</div>
                                         <!--end::Input-->
                                     </div>
                                     <!--end::Label-->
                                     <!--begin::Switch-->
                                     <label class="form-check form-switch form-check-custom form-check-solid">
                                         <!--begin::Input-->
                                         <input class="form-check-input" name="billing" type="checkbox" value="1"
                                             id="kt_modal_add_customer_billing" checked="checked" />
                                         <!--end::Input-->
                                         <!--begin::Label-->
                                         <span class="form-check-label fw-semibold text-muted"
                                             for="kt_modal_add_customer_billing">Yes</span>
                                         <!--end::Label-->
                                     </label>
                                     <!--end::Switch-->
                                 </div>
                                 <!--begin::Wrapper-->
                             </div>
                             <!--end::Input group-->
                         </div>
                         <!--end::Billing form-->
                     </div>
                     <!--end::Scroll-->
                 </div>
                 <!--end::Modal body-->
                 <!--begin::Modal footer-->
                 <div class="modal-footer flex-center">
                     <!--begin::Button-->
                     <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                     <!--end::Button-->
                     <!--begin::Button-->
                     <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                         <span class="indicator-label">Submit</span>
                         <span class="indicator-progress">Please wait...
                             <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                     </button>
                     <!--end::Button-->
                 </div>
                 <!--end::Modal footer-->
             </form>
             <!--end::Form-->
         </div>
     </div>
 </div>
 <!--end::Modal - Vehicles - Add-->
