@extends('layout.roles.organization')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Dashboard</h1>
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
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Organizations</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10 d-flex justify-content-center">
                <!--begin::Col-->
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <!--begin::Row-->
                    <div class="row g-lg-5 g-xl-10">
                        <!--begin::Col-->
                        <div class="col-md-4 col-xl-4 mb-xl-10">
                            <!--begin::Engage widget 1-->
                            <div class="card h-md-100" dir="ltr">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $shipments }}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Shipments</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column flex-center">
                                    <!--begin::Chart-->
                                    <div class="d-flex me-7">
                                        <div id="org_shipments_statuses" class="" style="height: 200px; width: 200px"
                                            data-kt-size="200" data-kt-line="33"></div>
                                    </div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column content-justify-start mt-3">
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Successful shipments
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
                                            <!--end::Separator-->
                                            <!--begin::Stats-->
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">45%</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-1">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Failed shipments
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
                                            <!--end::Separator-->
                                            <!--begin::Stats-->
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">21%</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-start">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Cancelled shipments
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
                                            <!--end::Separator-->
                                            <!--begin::Stats-->
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">34%</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Engage widget 1-->
                        </div>
                        <!--end::Col-->
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 col-xl-4 mb-xl-10">
                            <!--begin::Card widget 12-->
                            <div class="card overflow-hidden mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Value-->
                                            <span
                                                class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $brokers }}</span>
                                            <!--end::Value-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-semibold text-gray-400">Total Brokers</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="brokers_chart" class="min-h-auto" style="height: 125px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 12-->
                            <!--begin::Card widget 12-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Value-->
                                            <span
                                                class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $drivers }}</span>
                                            <!--end::Value-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-semibold text-gray-400">Total Drivers</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="drivers_chart" class="min-h-auto" style="height: 125px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 12-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-4 col-xl-4 mb-5 mb-xl-10">
                            <!--begin::Card widget 12-->
                            <div class="card overflow-hidden mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0 mb-5">
                                    <!--begin::Statistics-->
                                    <div class="px-9 mb-5">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Value-->
                                            <span
                                                class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $vehicles }}</span>
                                            <!--end::Value-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-semibold text-gray-400">Total Vehicles</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="vehicles_chart" class="min-h-auto" style="height: 110px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 12-->
                            <!--begin::Card widget 12-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Value-->
                                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">GHC 0</span>
                                            <!--end::Value-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-semibold text-gray-400">Total Earnings</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="earnings_chart" class="" style="height: 110px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 12-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Chart widget 17-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Shipments per month</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">Displaying number of shipments per month
                                for this year</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1 text-gray-300 me-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Remove</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Mute</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Chart container-->
                        <div id="org_shipments_pm_chart" class="w-100 h-350px"></div>
                        <!--end::Chart container-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 17-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-12 mt-5">
                <!--begin::Chart widget 17-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Active Brokers per month</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">Displaying number of active drivers per month
                                for this year</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1 text-gray-300 me-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Remove</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Mute</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Chart container-->
                        <div id="org_brokers_pm_chart" class="w-100 h-350px"></div>
                        <!--end::Chart container-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 17-->
            </div>
            <!--end::Col-->
            <div class="col-xl-12 mt-5">
                <div class="card card-flush p-3">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Realtime shipments location</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">Displaying realtime locations of all active
                                shipments</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <h3 class="card-title align-items-end flex-column">
                                <span class="card-label fw-bold text-dark">{{ $active_shipments }} active shipments</span>
                            </h3>
                            <!--begin::Menu-->
                            {{-- <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1 text-gray-300 me-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button> --}}
                            <!--begin::Menu-->
                            {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Remove</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Mute</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" id="lnk" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div> --}}
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <div class="card-body">
                        <div id="googleMap" style="width:100%;height:100rem;"></div>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <script src="{{ asset('assets/js/organization.overview.js') }}"></script>
    <script>
        $('document').ready(function() {
            getOrgChartsData();
        });
    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&loading=async&callback=initMap"></script>
@endsection
