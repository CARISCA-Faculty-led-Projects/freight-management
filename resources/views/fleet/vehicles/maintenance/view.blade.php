@extends('layout.app')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Maintenance Schedule</h1>
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
                            <a href="/fleet/drivers" class="text-muted text-hover-primary">Maintenance Schedule</a>
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
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="/apps/customers/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load Board</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="/organization/add" class="btn btn-sm fw-bold btn-primary">Fleet Mangement</a>
                    <!--end::Primary button-->
                    <!--begin::Secondary button-->
                    <a href="/organization/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Browse
                        Organizations</a>
                    <!--end::Secondary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content container-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
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
                            <input type="text" data-kt-ecommerce-order-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Search Report" />
                        </div>
                        <!--end::Search-->
                        <!--begin::Export buttons-->
                        <div id="kt_ecommerce_report_shipping_export" class="d-none"></div>
                        <!--end::Export buttons-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
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
                            <a href="{{route('vehicle.maintenance.add',$vehicle)}}" class="btn btn-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-timer fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Add Schedule</a>
                        <!--begin::Menu-->
                        <div id="kt_ecommerce_report_shipping_export_menu"
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to
                                    clipboard</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as
                                    Excel</a>
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
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_shipping_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">Maintenance Task</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Scheduled Date</th>
                                <th class="min-w-100px">Provider</th>
                                <th class="min-w-100px">Cost</th>
                                <th class="text-end min-w-75px">Next Scheduled Date</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <tr>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#ORG-0049053</a>
                                </td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#VEH-454542</a>
                                </td>
                                <td>
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-primary">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td>Oil Change</td>
                                <td>Dec 20, 2023 -> Dec 20, 2023</td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details" class="text-dark text-hover-primary">Craftman
                                        Mechanics</a>
                                </td>
                                <td>GHS 300.00</td>
                                <td class="text-end">Jun 20, 2024</td>
                            </tr>
                            <!-- Row 2 -->
                            <tr>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#ORG-0051208</a>
                                </td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#VEH-876231</a>
                                </td>
                                <td>
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-warning">In Progress</div>
                                    <!--end::Badges-->
                                </td>
                                <td>Tire Rotation</td>
                                <td>Jan 15, 2024 -> Jan 15, 2024</td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details" class="text-dark text-hover-primary">AutoPro
                                        Services</a>
                                </td>
                                <td>GHS 150.00</td>
                                <td class="text-end">Feb 10, 2024</td>
                            </tr>

                            <!-- Row 3 -->
                            <tr>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#ORG-0052356</a>
                                </td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#VEH-332211</a>
                                </td>
                                <td>
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-danger">Overdue</div>
                                    <!--end::Badges-->
                                </td>
                                <td>Brake Inspection</td>
                                <td>Feb 5, 2024 -> Feb 5, 2024</td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details" class="text-dark text-hover-primary">QuickFix
                                        Auto Care</a>
                                </td>
                                <td>GHS 200.00</td>
                                <td class="text-end">Mar 1, 2024</td>
                            </tr>

                            <!-- Row 4 -->
                            <tr>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#ORG-0053612</a>
                                </td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#VEH-998877</a>
                                </td>
                                <td>
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td>Air Filter Replacement</td>
                                <td>Mar 10, 2024 -> Mar 10, 2024</td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details" class="text-dark text-hover-primary">MaxTune
                                        Auto Solutions</a>
                                </td>
                                <td>GHS 120.00</td>
                                <td class="text-end">Apr 5, 2024</td>
                            </tr>

                            <!-- Row 5 -->
                            <tr>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#ORG-0054823</a>
                                </td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details"
                                        class="text-dark text-hover-primary">#VEH-765432</a>
                                </td>
                                <td>
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-warning">In Progress</div>
                                    <!--end::Badges-->
                                </td>
                                <td>Spark Plug Replacement</td>
                                <td>Apr 2, 2024 -> Apr 2, 2024</td>
                                <td>
                                    <a href="/apps/ecommerce/sales/details" class="text-dark text-hover-primary">ProAuto
                                        Garage</a>
                                </td>
                                <td>GHS 180.00</td>
                                <td class="text-end">May 1, 2024</td>
                            </tr>

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

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
@endsection
