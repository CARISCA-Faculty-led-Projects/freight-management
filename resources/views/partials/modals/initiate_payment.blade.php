  <!--begin::Modal - Adjust Balance-->
  <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <h2 class="fw-bold">Initiate Payment</h2>
                  <!--end::Modal title-->
                  <!--begin::Close-->
                  <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                  <div class="d-flex text-center mb-9">
                      <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                          <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance</div>
                          <div class="fs-2 fw-bold" kt-modal-adjust-balance="current_balance">US$ 32,487.57</div>
                      </div>
                      <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                          <div class="fs-6 fw-semibold mb-2 text-muted">New Balance
                              <span class="ms-2" data-bs-toggle="tooltip"
                                  title="Enter an amount to preview the new balance.">
                                  <i class="ki-duotone ki-information fs-7">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                      <span class="path3"></span>
                                  </i>
                              </span></div>
                          <div class="fs-2 fw-bold" kt-modal-adjust-balance="new_balance">--</div>
                      </div>
                  </div>
                  <!--end::Balance preview-->
                  <!--begin::Form-->
                  <form id="kt_modal_adjust_balance_form" class="form" action="#">
                      <!--begin::Input group-->
                      <div class="fv-row mb-7">
                          <!--begin::Label-->
                          <label class="required fs-6 fw-semibold form-label mb-2">Adjustment type</label>
                          <!--end::Label-->
                          <!--begin::Dropdown-->
                          <select class="form-select form-select-solid fw-bold" name="adjustment"
                              aria-label="Select an option" data-control="select2"
                              data-dropdown-parent="#kt_modal_adjust_balance" data-placeholder="Select an option"
                              data-hide-search="true">
                              <option></option>
                              <option value="1">Credit</option>
                              <option value="2">Debit</option>
                          </select>
                          <!--end::Dropdown-->
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-7">
                          <!--begin::Label-->
                          <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <input id="kt_modal_inputmask" type="text" class="form-control form-control-solid"
                              name="amount" value="" />
                          <!--end::Input-->
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-7">
                          <!--begin::Label-->
                          <label class="fs-6 fw-semibold form-label mb-2">Add adjustment note</label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                          <!--end::Input-->
                      </div>
                      <!--end::Input group-->
                      <!--begin::Disclaimer-->
                      <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be
                          audited by the financial team every fortnight. Please maintain your invoices and
                          receipts until then. Thank you.</div>
                      <!--end::Disclaimer-->
                      <!--begin::Actions-->
                      <div class="text-center">
                          <button type="reset" id="kt_modal_adjust_balance_cancel"
                              class="btn btn-light me-3">Discard</button>
                          <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
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
