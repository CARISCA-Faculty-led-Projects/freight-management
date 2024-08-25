<div class="">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Create Shipment :: Assign Driver</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted text-hover-primary">Home</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted text-hover-primary">Shipment</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Assign Driver</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>

            <!--begin::Primary button-->
            {{-- <a href="/shipments/list" class="btn btn-sm fw-bold btn-primary">Shipment Board</a> --}}
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form class="d-flex flex-column flex-lg-row" method="POST"
                action="{{ route(whichUser()->getTable() == 'brokers' ? 'broker.shipment.save' : 'org.shipment.save') }}">
                @csrf
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Supported Loads</label>
                                <!--end::Label-->
                                <!--begin::Table-->
                                <div class="" style="height: 200px; overflow:auto;">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                                        id="kt_ecommerce_sales_table">
                                        <thead>
                                            <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">

                                                <th class="min-w-50px">#</th>
                                                <th class="min-w-50px">Category</th>
                                                <th class="text-end min-w-70px">Status</th>
                                                <th class="text-end min-w-70px">Size</th>
                                                <th class="text-end min-w-70px">Pickup</th>
                                                <th class="text-end min-w-70px">Dropoff</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @foreach ($this->supported as $load)
                                                <tr>
                                                    <input type="hidden" name="loads[]" value="{{ $load['mask'] }}">
                                                    <td>{{ $load['mask'] }}</td>
                                                    <td>{{ $load['load_type'] }}</td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Badges-->
                                                        <div
                                                            class="badge @if ($load['status'] == 'Approved') badge-light-primary
                                                        @elseif($load['status'] == 'Pending')
                                                        badge-light-warning
                                                        @elseif($load['status'] == 'Rejected')
                                                        badge-light-danger
                                                        @elseif($load['status'] == 'Paid')
                                                        badge-light-success
                                                        @else
                                                        badge-light-primary @endif">
                                                            {{ $load['status'] }}</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="fw-bold">{{ $load['quantity'] }},
                                                            {{ $load['weight'] }} KG,
                                                            {{ $load['length'] }}*{{ $load['breadth'] }}*{{ $load['height'] }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['pickup_address'])->name }}</td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['dropoff_address'])->name }}</td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Unupported Loads</label>
                                <!--end::Label-->
                                <!--begin::Table-->
                                <div class="" style="height: 200px; overflow:auto;">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                                        id="kt_ecommerce_sales_table">
                                        <thead>
                                            <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">

                                                <th class="min-w-50px">#</th>
                                                <th class="min-w-50px">Category</th>
                                                <th class="text-end min-w-70px">Status</th>
                                                <th class="text-end min-w-70px">Size</th>
                                                <th class="text-end min-w-70px">Pickup</th>
                                                <th class="text-end min-w-70px">Dropoff</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @foreach ($this->unsupported as $load)
                                                <tr>
                                                    <input type="hidden" name="loads[]" value="{{ $load['mask'] }}">
                                                    <td>{{ $load['mask'] }}</td>
                                                    <td>{{ $load['load_type'] }}</td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Badges-->
                                                        <div
                                                            class="badge @if ($load['status'] == 'Approved') badge-light-primary
                                                        @elseif($load['status'] == 'Pending')
                                                        badge-light-warning
                                                        @elseif($load['status'] == 'Rejected')
                                                        badge-light-danger
                                                        @elseif($load['status'] == 'Paid')
                                                        badge-light-success
                                                        @else
                                                        badge-light-primary @endif">
                                                            {{ $load['status'] }}</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="fw-bold">{{ $load['quantity'] }},
                                                            {{ $load['weight'] }} KG,
                                                            {{ $load['length'] }}*{{ $load['breadth'] }}*{{ $load['height'] }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['pickup_address'])->name }}</td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['dropoff_address'])->name }}</td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">

                        <!--begin::Automation-->
                        <div class="card card-flush py-4">

                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Available drivers</h2> <a wire:click="check"
                                        class="btn btn-sm btn-primary ms-3">Look
                                        up</a>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">Assign Organization</label>
                                    <!--end::Label-->
                                    <!--begin::Select2-->
                                    <select
                                        class="form-select mb-2 @error('organization_id')border-danger @enderror basic-select2"
                                        name="organization_id" id="org" data-shipment-id="{{ $this->shipment }}"
                                        data-placeholder="Select an organization">
                                        <option value="">--select--</option>
                                        @foreach ($this->getOrgs() as $org)
                                            <option value="{{ $org->mask }}">
                                                {{ $org->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('organization_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <div class="mb-10 py-4">
                                    <!--begin::Label-->
                                    <label class="required form-label">Driver</label>
                                    <!--end::Label-->
                                    <!--begin::Select2-->
                                    <select
                                        class="form-select basic-select2 mb-2 @error('driver_id')border-danger @enderror"
                                        name="driver_id" data-hide-search="true" id="drivers"
                                        data-placeholder="Select a driver">
                                        <option></option>

                                    </select>
                                    @error('driver_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!--end::Select2-->
                                    {{-- <div class="">
                                        <input type="checkbox" class="mt-3" name="no_driver" id=""
                                            value="true">
                                        <label for="">&nbsp;Assign driver later</label>
                                    </div> --}}
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Automation-->

                        <div class="d-flex justify-content-end me-5">
                            <!--begin::Button-->
                            <a href="" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                <span class="indicator-progress" wire:loading>Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
</div>
<!--end::Scrolltop-->
</div>

<script>
    $('document').ready(function() {

        function getDrivers(org, shipment) {
            $.ajax({
                url: 'api/v1/get-shipment-load-drivers',
                method: "POST",
                data: {
                    organization: org,
                    shipment_id: shipment
                },
                success: function(res) {
                    $('#drivers').empty();
                    $('#drivers').append(`<option></option>`);

                    res.forEach(element => {
                        var el = `<option value="${element.mask}">${element.name}</option>`;
                        $('#drivers').append(el);
                    });
                }
            })
        }
        $('#org').on('change', function(event) {
            getDrivers(event.target.value, $(this).data('shipment-id'));
        });

    });
</script>
