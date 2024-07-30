@extends('layout.roles.driver')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Welcome, {{whichUser()->name}}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Home</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
        <!--begin::Content container-->
    </div>
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Row-->
            <div class="row g-lg-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-md-4 col-xl-3 mb-5 mb-xl-10">
                    <!--begin::Card widget 12-->
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $all }}</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Total Shipments</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 12-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 13-->
                    <div class="card overflow-hidden  mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $delivered }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Successful Shipments</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 13-->

                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 13-->
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $failed }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Failed Shipments</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 13-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 13-->
                    <div class="card overflow-hidden  mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $pending }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Loads pending shipment</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Chart widget 17-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Shipments Assigned per month</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">All loads to you for shipping</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button
                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
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
                        <div id="driver_shipments_assigned" class="w-100 h-350px"></div>
                        <!--end::Chart container-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 17-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <div class="col-xl-12 mt-5">
            <div class="card card-flush p-3">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Assigned shipments</span>
                        <span class="text-gray-400 pt-2 fw-semibold fs-6">Displaying locations of all assigned
                            shipments</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <h3 class="card-title align-items-end flex-column">
                            {{-- <span class="card-label fw-bold text-dark">{{ $active_shipments }} assigned shipments</span> --}}
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
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap" defer></script>
    <script src="{{ asset('assets/js/driver.overview.js') }}"></script>
    <script>
        $('document').ready(function() {
            getDriverChartsData();

        });
    </script>

</div>
@endsection
