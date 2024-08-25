<!--begin::Modal - New Target-->
<div class="modal fade" id="show_mileage_calculator_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_add_maintenance_schedule_form" class="form" action="#">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add Maintenance Schedule</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Vehicles undergoing maintenance should be made known to us for planning and load distribution, please check
                            <a href="#" class="fw-bold link-primary">Maintenance Guidelines</a>.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Organization</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an organization" name="currency_type">
                            <option value=""></option>
                            <option value="dollar" selected="selected">Jess Fleet Mangement Inc</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Vehicle</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an organization" name="currency_type">
                            <option value=""></option>
                            <option value="dollar" selected="selected">#8990</option>
                            <option value="crypto">#8899</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Status</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an organization" name="currency_type">
                            <option value=""></option>
                            <option value="dollar" selected="selected">Scheduled</option>
                            <option value="crypto">In progress</option>
                            <option value="crypto">Completed</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Select a service provider</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an organization" name="currency_type">
                            <option value="">Craftman Mechanics</option>
                            <option value="dollar" selected="selected">	AutoPro Services</option>
                        </select>
                        <!--end::Select2-->
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Select a frequency</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an organization" name="currency_type">
                            <option value="">Unplanned</option>
                            <option value="dollar" selected="selected">Every week</option>
                            <option value="dollar" selected="selected">Every 2 weeks</option>
                            <option value="dollar" selected="selected">Every month</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--end::Input group-->
                    <!--end::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Scheduled Date</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Specify the bid amount to place in.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->

                        <input type="date" class="form-control form-control-solid" placeholder="Enter Bid Amount"
                            name="bid_amount" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Notice-->

                    <!--end::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Amount</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Specify the bid amount to place in.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->

                        <input type="text" class="form-control form-control-solid" placeholder="2000"
                            name="bid_amount" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Notice-->
                    <!-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-wallet fs-2tx text-primary me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>

                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Top up funds</h4>
                                <div class="fs-6 text-gray-700">Not enough funds in your wallet?
                                    <a href="/utilities/modals/wizards/top-up-wallet" class="text-bolder">Top up
                                        wallet</a>.</div>
                            </div>
                        </div>
                    </div> -->
                    <!--end::Notice-->
                    <!--end::Notice-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-modal-action-type="cancel">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
