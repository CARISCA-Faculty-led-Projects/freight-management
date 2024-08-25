<!--begin::Modal - New Target-->
<div class="modal fade" id="calculator_modal" tabindex="-1" aria-hidden="true">
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
                        <h1 class="mb-3">Calculate Load Pricing</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Enter amount below to know the estimate for a load
                            <a href="#" class="fw-bold link-primary"></a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row text-center">
                        <h1 class="mb-3 mt-3">Overall total (GHC)</h1>
                        <h1 class="mb-3 mt-3">43</h1>
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Organization amount (GHC)</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" name="" id="org_amount" class="form-control form-control-solid"
                            disabled>

                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Driver amount (GHC)</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" name="" id="driver_amount" class="form-control form-control-solid"
                            disabled>

                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Broker amount (GHC)</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" name="" id="broker_amount" class="form-control form-control-solid"
                            disabled>

                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">System amount (GHC)</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" name="" id="sys_amount" class="form-control form-control-solid"
                            disabled>

                    </div>
                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                        <!--end::Input group-->
                        <div class="mb-10 flex-row-fluid position-relative">
                            <!--begin::Label-->
                            <label class="form-label">Enter Distance(KM)</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" id="load_distance" min="1" class="form-control mb-2"
                                name="breadth" placeholder="60" />
                            <!--end::Input-->
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="mb-10 flex-row-fluid position-relative">
                            <!--begin::Label-->
                            <label class="form-label">Enter amount to pay (GHC)</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" id="load_amount" class="form-control mb-2" name="height"
                                placeholder="60" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Input group-->

                    <!--end::Notice-->
                    <!--begin::Actions-->
                    {{-- <div class="text-center">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-modal-action-type="cancel">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div> --}}
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
    <script>
        $('document').ready(function() {
            let perc_Broker, perc_Org, perc_System, price_per_km = 0;
            $.ajax({
                url: '/broker/load/get-pricing-settings',
                type: "GET",
                success: function(res) {
                    console.log(res.data);
                    perc_Broker = res.data.brokers_percentage_pl;
                    perc_Org = res.data.organizations_percentage_pl;
                    perc_System = res.data.system_percentage_pl;
                    price_per_km = res.data.price_per_km;

                }
            })

            function calcPercentage(element, percentage, amount) {
                let total = Math.floor((percentage / 100) * amount);
                total == null ? 0 : total;
                $(element).val(total);
            }
            if ({{ $load->distance }}) {
                var dist = {{ $load->distance }}
                var total = dist * price_per_km;
                console.log(total);
                $('#driver_amount').val();
            }


            $('#load_amount').on('keyup', function() {
                calcPercentage('#broker_amount', perc_Broker, parseInt($(this).val()))
                calcPercentage('#org_amount', perc_Org, parseInt($(this).val()))
                calcPercentage('#sys_amount', perc_System, parseInt($(this).val()))

            })

            $('#load_distance').on('keyup', function() {
                $('#driver_amount').val($(this).val()* price_per_km);
            })
        })
    </script>
</div>
<!--end::Modal - New Target-->
