@extends('layout.roles.all')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Load List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/fleet/drivers" class="text-muted text-hover-primary">Loads</a>
                        </li>
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
        <!--begin::Content container-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="loadSearch" class="form-control form-control-solid w-250px ps-12"
                                placeholder="Search Load" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Flatpickr-->
                        <div class="input-group w-250px">
                            <input class="form-control form-control-solid rounded rounded-end-0"
                                placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                            <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                        </div>
                        <!--end::Flatpickr-->
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-hide-search="true" data-placeholder="Status"
                                data-kt-ecommerce-order-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                                <option value="Denied">Denied</option>
                                <option value="Expired">Expired</option>
                                <option value="Failed">Failed</option>
                                <option value="Pending">Pending</option>
                                <option value="Processing">Processing</option>
                                <option value="Refunded">Refunded</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Delivering">Delivering</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="{{ route('sender.load.add') }}" class="btn btn-primary">Add Load</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="loads_table">
                        <thead>
                            <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-105px">Load #</th>
                                <th class="min-w-105px">Category</th>
                                <th class="text-end min-w-70px">Status</th>
                                <th class="text-end min-w-70px">Payment status</th>
                                <th class="text-end min-w-70px">Shipment status</th>
                                <th class="text-end min-w-100px">Size</th>
                                <th class="text-end min-w-100px">Pickup</th>
                                <th class="text-end min-w-100px">Dropoff</th>
                                <th class="text-end min-w-100px">Handling</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($loads as $load)
                                <tr>
                                    <td>{{ $load->mask }}</td>
                                    <td>{{ $load->load_type }}</td>
                                    <td class="text-end pe-0">
                                        <!--begin::Badges-->
                                        <div
                                            class="badge @if ($load->status == 'Approved') badge-light-primary
                                                    @elseif($load->status == 'Pending')
                                                    badge-light-warning
                                                    @elseif($load->status == 'Rejected')
                                                    badge-light-danger
                                                    @elseif($load->status == 'Paid')
                                                    badge-light-success
                                                    @else
                                                    badge-light-primary @endif">
                                            {{ $load->status }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Badges-->
                                        <div
                                            class="badge @if ($load->payment_status == 'Unpaid') badge-light-danger
                                                    @elseif($load->payment_status == 'Paid')
                                                    badge-light-success @endif">
                                            {{ $load->payment_status }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    {{-- shipment status --}}
                                    <td class="text-end pe-0">
                                        <!--begin::Badges-->
                                        <div
                                            class="badge @if ($load->shipment_status == 'Unassigned') badge-light-danger
                                                @elseif($load->shipment_status == 'Onroute')
                                                badge-light-warning
                                                @elseif($load->shipment_status == 'Delivered')
                                                badge-light-success
                                                @elseif($load->shipment_status == 'Paid')
                                                badge-light-success
                                                @else
                                                badge-light-primary @endif">
                                            {{ $load->shipment_status }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold">{{ $load->quantity }}, {{ $load->weight }} KG,
                                            {{ $load->length }}*{{ $load->breadth }}*{{ $load->height }}</span>
                                    </td>

                                    {{-- <td class="text-end">{{ $load->pickup_address == null? '' : json_decode($load->pickup_address)->name }}</td>
                                    <td class="text-end">{{ $load->dropoff_address == null? '' :json_decode($load->dropoff_address)->name }}</td> --}}
                                    <td class="text-end">
                                        {{ $load->pickup_address == null ? '' : json_decode($load->pickup_address)->name }}
                                    </td>
                                    <td class="text-end">
                                        {{ $load->dropoff_address == null ? '' : json_decode($load->dropoff_address)->name }}
                                    </td>
                                    <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                                        @php
                                            $handling = explode(',', $load->handling);
                                        @endphp
                                        @foreach ($handling as $item)
                                            <span class="badge badge-dark">{{ $item }}</span>
                                        @endforeach
                                    </td>
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
                                                <a href="{{ route('sender.loads.details', $load->mask) }}"
                                                    class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            @if ($load->completed != 1)
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('sender.load.edit', $load->mask) }}"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a onclick="return confirm('Comfirming that the load details are complete?')"
                                                        href="{{ route('sender.loads.complete', $load->mask) }}"
                                                        class="menu-link px-3">Publish</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('sender.loads.delete', $load->mask) }}"
                                                        onclick="return confirm('Confirm you want to delete load and subloads?')"
                                                        class="menu-link px-3">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            @endif
                                            <!--end::Menu item-->
                                            @if ($load->recipient_status == 'No')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('sender.loads.received', $load->mask) }}" onclick="return confirm('Confirm you have received load and subloads?')" class="menu-link px-3">Confirm receipt</a>
                                                </div>
                                                <!--end::Menu item-->
                                            @endif
                                            @if ($load->status == 'Completed')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/load/invoices/view" class="menu-link px-3">Invoice</a>
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
    @include('partials.modals.bid')
    @include('partials.modals.assign_load_to_driver')
@endsection
