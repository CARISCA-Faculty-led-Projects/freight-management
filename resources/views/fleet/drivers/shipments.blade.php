@extends('layout.roles.driver')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Shipment Board</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/index" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Shipments</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">List</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        {{-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-ecommerce-order-filter="search"
                            class="form-control form-control-solid w-250px ps-12" placeholder="Search Shipments" />
                    </div> --}}
                        <!--end::Search-->
                        <!--begin::Export buttons-->
                        <div id="kt_ecommerce_report_shipping_export" class="d-none"></div>
                        <!--end::Export buttons-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    {{-- <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Daterangepicker-->
                    <input class="form-control form-control-solid w-100 mw-250px" placeholder="Pick date range"
                        id="kt_ecommerce_report_shipping_daterangepicker" />
                    <!--end::Daterangepicker-->
                    <!--begin::Filter-->
                    <div class="w-150px">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                            <option></option>
                            <option value="all">All</option>
                            <option value="Completed">Completed</option>
                            <option value="In Transit">In Transit</option>
                            <option value="Pending">Pending</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--end::Filter-->
                    <!--begin::Export dropdown-->
                    <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-exit-up fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Export Report</button>
                    <!--begin::Menu-->
                    <div id="kt_ecommerce_report_shipping_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to clipboard</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Export dropdown-->
                </div> --}}
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_shipping_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-100px">Shipment ID</th>
                                <th class="text-end min-w-100px">Status</th>
                                <th class="text-end min-w-100px">Starting point</th>
                                <th class="text-end min-w-100px">Destination</th>
                                <th class="text-end min-w-100px">Loads Delivered</th>
                                {{-- <th class="text-end min-w-75px">Pickup date</th> --}}
                                {{-- <th class="text-end min-w-100px">Delivery date</th> --}}
                                <th class="text-end min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" />
                                        </div>
                                    </td>
                                    <td data-kt-ecommerce-order-filter="order_id">
                                        <a href="/apps/ecommerce/sales/details"
                                            class="text-gray-800 text-hover-primary fw-bold">{{ $shipment->mask }}</a>
                                    </td>
                                    <td class="text-end pe-0">
                                        {{-- @php
                                dd($shipment)
                            @endphp --}}
                                        <!--begin::Badges-->
                                        <div
                                            class="badge @if ($shipment->shipment_status == 'On route') badge-light-warning
                                            @elseif($shipment->shipment_status == 'Assigned')
                                            badge-light-primary
                                            @elseif($shipment->shipment_status == 'Cancelled')
                                            badge-light-danger
                                            @elseif($shipment->shipment_status == 'Delivered')
                                            badge-light-success
                                            @else
                                            badge-light-primary @endif">
                                            {{ $shipment->shipment_status }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">{{ $shipment->starting_point}}</td>
                                    <td class="text-end">{{ $shipment->destination }}</td>
                                    <td class="text-end">
                                        {{ $shipment->load_delivered }}/{{ count(json_decode($shipment->loads)) }}</td>


                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('driver.shipment.loads.view', $shipment->mask) }}"
                                                    class="menu-link px-3">View loads</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/load/create-invoice" class="menu-link px-3">Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            {{-- <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_users_search">Reassign</a>
                                    </div>
                                    <!--end::Menu item--> --}}
                                            @if ($shipment->shipment_status == 'On route')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    @if ($shipment->load_delivered != count(json_decode($shipment->loads)))
                                                        <a href="{{ route('driver.cancel-delivery', $shipment->mask) }}"
                                                            onclick="return confirm('Confirm you are about to cancel delivery?')"
                                                            class="menu-link px-3">Cancel delivery</a>
                                                    @else
                                                        <a href="{{ route('driver.end-delivery', $shipment->mask) }}"
                                                            onclick="return confirm('Confirm you are about to end delivery?')"
                                                            class="menu-link px-3">End delivery</a>
                                                    @endif
                                                </div>
                                                <!--end::Menu item-->
                                            @else
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('driver.start-delivery', $shipment->mask) }}"
                                                        onclick="return confirm('Confirm you are about to start delivery?')"
                                                        class="menu-link px-3">Start delivery</a>
                                                </div>
                                                <!--end::Menu item-->
                                            @endif

                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    @include('partials.modals.bid')
    @include('partials.modals.add_shipment')
@endsection
