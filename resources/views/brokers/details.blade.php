@extends( auth()->guard()->name == 'organizations' ?'layout.roles.organization' : 'layout.roles.broker')
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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Broker
                    Details</h1>
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
                    <li class="breadcrumb-item text-muted">
                        <a href="/brokers/list" class="text-muted text-hover-primary">Brokers</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/brokers/list" class="text-muted text-hover-primary">#6565</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Details</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Filter</a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                        id="kt_menu_641ac428c120d">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select option" data-dropdown-parent="#kt_menu_641ac428c120d"
                                        data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications"
                                        checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>
                <!--end::Filter menu-->
                <!--begin::Secondary button-->
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="/brokers/add" class="btn btn-sm fw-bold btn-primary">Add Broker</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body pt-15">
                        <!--begin::Summary-->
                        <div class="d-flex flex-center flex-column mb-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="assets/media/avatars/300-1.jpg" alt="image" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$broker->name}}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="fs-5 fw-semibold text-muted mb-6">Broker</div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-75px">6,900</span>
                                        <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="fw-semibold text-muted">Earnings</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-50px">130</span>
                                        <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="fw-semibold text-muted">Shipments</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <!-- <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-50px">5</span>
                                        <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="fw-semibold text-muted">Organizations</div>
                                </div> -->
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_customer_view_details" role="button" aria-expanded="false"
                                aria-controls="kt_customer_view_details">Details
                                <span class="ms-2 rotate-180">
                                    <i class="ki-duotone ki-down fs-3"></i>
                                </span></div>
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit broker details">
                                <a href="{{route('broker.edit',$broker->mask)}}" class="btn btn-sm btn-light-primary">Edit</a>
                            </span>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Details content-->
                        <div id="kt_customer_view_details" class="collapse show">
                            <div class="py-5 fs-6">
                                <!--begin::Badge-->
                                <div class="badge badge-light-info d-inline">Premium user</div>
                                <div class="badge badge-success d-inline">Approved</div>
                                <div class="badge badge-danger d-inline">Offline</div>
                                <!--begin::Badge-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Account ID</div>
                                <div class="text-gray-600">ID-45453423</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$broker->email}}</a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Physical Address</div>
                                <div class="text-gray-600">{{$broker->address}}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Phone</div>
                                <div class="text-gray-600">{{$broker->phone}}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Upcoming Invoice</div>
                                <div class="text-gray-600">Ghana</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Preferred Load</div>
                                <div class="text-gray-600">Refrigerated Goods, General Goods</div>
                                <!--begin::Details item-->
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_customer_view_overview_tab">Overview</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <!-- <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_customer_view_overview_events_and_logs_tab">Brokage history</a>
                    </li> -->
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_customer_view_overview_statements">Billing & Payment</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <!-- <li class="nav-item ms-auto">
                        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                            <i class="ki-duotone ki-down fs-2 me-0"></i></a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                            data-kt-menu="true">
                            <div class="menu-item px-5">
                                <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                            </div>

                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5">Create invoice</a>
                            </div>

                            <div class="menu-item px-5">
                                <a href="#" class="menu-link flex-stack px-5">Create payments
                                    <span class="ms-2" data-bs-toggle="tooltip"
                                        title="Specify a target name for future usage and reference">
                                        <i class="ki-duotone ki-information fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span></a>
                            </div>

                            <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="left-start">
                                <a href="#" class="menu-link px-5">
                                    <span class="menu-title">Subscription</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">Apps</a>
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">Billing</a>
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">Statements</a>
                                    </div>

                                    <div class="separator my-2"></div>

                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3">
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value=""
                                                    name="notifications" checked="checked"
                                                    id="kt_user_menu_notifications" />
                                                <span class="form-check-label text-muted fs-6"
                                                    for="kt_user_menu_notifications">Notifications</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator my-3"></div>

                            <div class="menu-item px-5">
                                <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                            </div>

                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5">Reports</a>
                            </div>

                            <div class="menu-item px-5 my-1">
                                <a href="#" class="menu-link px-5">Account Settings</a>
                            </div>

                            <div class="menu-item px-5">
                                <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                            </div>
                        </div>

                    </li> -->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        {{-- Condition to check if current user is super admin --}}
                        @if (false)
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bold">Assigned Organization</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_reassign_broker">
                                        <i class="ki-duotone ki-pencil fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Reassign Broker</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="fw-bold fs-2">Jess Fleet Mangement Inc
                                    <span class="text-muted fs-4 fw-semibold">#6565</span>
                                    <div class="fs-7 fw-normal text-muted">Broker has been assigned to this organization
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        @endif
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Shipment History</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">
                                        <i class="ki-duotone ki-plus-square fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>New Shipment</button>
                                    <!--end::Filter-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 pb-5">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                    <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-100px">Shipment #</th>
                                            <th>Delivery Status</th>
                                            <th>Sender</th>
                                            <th>Carrier</th>
                                            <th>Load</th>
                                            <th>Payment status</th>
                                            <th>Commission</th>
                                            <th class="min-w-100px">Date</th>
                                            <th class="text-end min-w-100px pe-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">8185-3962</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-success">Delivered</span>
                                            </td>
                                            <td>#65653</td>
                                            <td>#45454</td>
                                            <td>#9909</td>
                                            <td>
                                                <span class="badge badge-light-success">Paid</span>
                                            </td>

                                            <td>GHS 440.00</td>
                                            <td>14 Dec 2020, 8:43 pm</td>
                                            <td class="pe-0 text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-light image.png btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="/apps/customers/view" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">7452-1234</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-warning">On route</span>
                                            </td>
                                            <td>#87878</td>
                                            <td>#34343</td>
                                            <td>#1122</td>
                                            <td>
                                                <span class="badge badge-light-danger">Unpaid</span>
                                            </td>
                                            <td>GHS 550.00</td>
                                            <td>21 Jan 2021, 3:15 pm</td>
                                            <td class="pe-0 text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-light image.png btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="/apps/customers/view" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">9801-5678</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-success">Delivered</span>
                                            </td>
                                            <td>#98765</td>
                                            <td>#87654</td>
                                            <td>#3456</td>
                                            <td>
                                                <span class="badge badge-light-success">Paid</span>
                                            </td>
                                            <td>GHS 680.00</td>
                                            <td>02 Mar 2021, 9:30 am</td>
                                            <td class="pe-0 text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-light image.png btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="/apps/customers/view" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">2345-6789</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-danger">Cancelled</span>
                                            </td>
                                            <td>#87654</td>
                                            <td>#76543</td>
                                            <td>#6543</td>
                                            <td>
                                                <span class="badge badge-light-danger">Unpaid</span>
                                            </td>
                                            <td>GHS 450.00</td>
                                            <td>15 Apr 2021, 1:45 pm</td>
                                            <td class="pe-0 text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-light image.png btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="/apps/customers/view" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>



                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bold">Payout Amount</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_payout_broker">
                                        <i class="ki-duotone ki-pencil fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Payout</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="fw-bold fs-2">GHS 32,487.57
                                    <span class="text-muted fs-4 fw-semibold">GHS</span>
                                    <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on the
                                        customer's next invoice.</div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold mb-0">Payment Methods</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_new_card">
                                            <i class="ki-duotone ki-plus-square fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>Add new method</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_1">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/mastercard.svg"
                                                    class="w-40px me-3" alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">Mastercard</div>
                                                        <div class="badge badge-light-primary ms-5">Primary</div>
                                                    </div>
                                                    <div class="text-muted">Expires Dec 2024</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Emma Smith</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 8322</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">12/2024</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">Mastercard credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">VICBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_4325df90sdf8</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">AU</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">Australia
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/australia.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Passed
                                                                <i class="ki-duotone ki-check-circle fs-2 text-success">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                    <div class="separator separator-dashed"></div>
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible collapsed rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_2">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3"
                                                    alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">Visa</div>
                                                    </div>
                                                    <div class="text-muted">Expires Feb 2022</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Melody Macy</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 5359</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">02/2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">Visa credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">ENBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_w2r84jdy723</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">UK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">United Kingdom
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-kingdom.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Passed
                                                                <i class="ki-duotone ki-check fs-2 text-success"></i>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                    <div class="separator separator-dashed"></div>
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible collapsed rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_3">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/american-express.svg"
                                                    class="w-40px me-3" alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">American Express</div>
                                                        <div class="badge badge-light-danger ms-5">Expired</div>
                                                    </div>
                                                    <div class="text-muted">Expires Aug 2021</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Max Smith</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 4437</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">08/2021</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">American express credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">USABANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_89457jcje63</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">US</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">United States of America
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-states.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Failed
                                                                <i class="ki-duotone ki-cross fs-2 text-danger">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Billing History-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header card-header-stretch border-bottom border-gray-200">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <h3 class="fw-bold m-0">Billing History</h3>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar m-0">
                                        <!--begin::Tab nav-->
                                        <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                            <!--begin::Tab nav item-->
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_billing_6months_tab"
                                                    class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab"
                                                    role="tab" href="#kt_billing_months">Month</a>
                                            </li>
                                            <!--end::Tab nav item-->
                                            <!--begin::Tab nav item-->
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3"
                                                    data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
                                            </li>
                                            <!--end::Tab nav item-->
                                            <!--begin::Tab nav item-->
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold"
                                                    data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
                                            </li>
                                            <!--end::Tab nav item-->
                                        </ul>
                                        <!--end::Tab nav-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Tab panel-->
                                    <div id="kt_billing_months" class="card-body p-0 tab-pane fade show active"
                                        role="tabpanel" aria-labelledby="kt_billing_months">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-bordered align-middle gy-4 gs-9">
                                                <thead
                                                    class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                                    <tr>
                                                        <td class="min-w-150px">Date</td>
                                                        <td class="min-w-250px">Description</td>
                                                        <td class="min-w-150px">Amount</td>
                                                        <td class="min-w-150px">Invoice</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Nov 01, 2020</td>
                                                        <td>
                                                            <a href="#">Invoice for Ocrober 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Oct 08, 2020</td>
                                                        <td>
                                                            <a href="#">Invoice for September 2023</a>
                                                        </td>
                                                        <td>$98.03</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 24, 2020</td>
                                                        <td>Paypal</td>
                                                        <td>$35.07</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 01, 2020</td>
                                                        <td>
                                                            <a href="#">Invoice for July 2023</a>
                                                        </td>
                                                        <td>$142.80</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jul 01, 2020</td>
                                                        <td>
                                                            <a href="#">Invoice for June 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jun 17, 2020</td>
                                                        <td>Paypal</td>
                                                        <td>$523.09</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jun 01, 2020</td>
                                                        <td>
                                                            <a href="#">Invoice for May 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tab panel-->
                                    <!--begin::Tab panel-->
                                    <div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel"
                                        aria-labelledby="kt_billing_year">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-bordered align-middle gy-4 gs-9">
                                                <thead
                                                    class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                                    <tr>
                                                        <td class="min-w-150px">Date</td>
                                                        <td class="min-w-250px">Description</td>
                                                        <td class="min-w-150px">Amount</td>
                                                        <td class="min-w-150px">Invoice</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Dec 01, 2021</td>
                                                        <td>
                                                            <a href="#">Billing for Ocrober 2023</a>
                                                        </td>
                                                        <td>$250.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Oct 08, 2021</td>
                                                        <td>
                                                            <a href="#">Statements for September 2023</a>
                                                        </td>
                                                        <td>$98.03</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 24, 2021</td>
                                                        <td>Paypal</td>
                                                        <td>$35.07</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 01, 2021</td>
                                                        <td>
                                                            <a href="#">Invoice for July 2023</a>
                                                        </td>
                                                        <td>$142.80</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jul 01, 2021</td>
                                                        <td>
                                                            <a href="#">Statements for June 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jun 17, 2021</td>
                                                        <td>Paypal</td>
                                                        <td>$23.09</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tab panel-->
                                    <!--begin::Tab panel-->
                                    <div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel"
                                        aria-labelledby="kt_billing_all">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-bordered align-middle gy-4 gs-9">
                                                <thead
                                                    class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                                    <tr>
                                                        <td class="min-w-150px">Date</td>
                                                        <td class="min-w-250px">Description</td>
                                                        <td class="min-w-150px">Amount</td>
                                                        <td class="min-w-150px">Invoice</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Nov 01, 2021</td>
                                                        <td>
                                                            <a href="#">Billing for Ocrober 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 10, 2021</td>
                                                        <td>Paypal</td>
                                                        <td>$35.07</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Aug 01, 2021</td>
                                                        <td>
                                                            <a href="#">Invoice for July 2023</a>
                                                        </td>
                                                        <td>$142.80</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jul 20, 2021</td>
                                                        <td>
                                                            <a href="#">Statements for June 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jun 17, 2021</td>
                                                        <td>Paypal</td>
                                                        <td>$23.09</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Jun 01, 2021</td>
                                                        <td>
                                                            <a href="#">Invoice for May 2023</a>
                                                        </td>
                                                        <td>$123.79</td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tab panel-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end::Billing Address-->

                        </div>
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
        <!--begin::Modals-->


        <!--end::Modals-->
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
@include('partials.modals.reassign_broker')
@include('partials.modals.add_shipment')
@include('partials.modals.payout_broker')
@include('partials.modals.add_payment_method')
@endsection
