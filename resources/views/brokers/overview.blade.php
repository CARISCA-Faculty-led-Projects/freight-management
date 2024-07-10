@extends('layout.roles.broker')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Brokers</h1>
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
                            <span class="text-muted text-hover-primary">Broker</span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Overview</li>
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
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $loads }}</span>
                                        <!--end::Value-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Total assigned loads</span>
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
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $shipments }}</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Total shipments created</span>
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
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $completed_shipments }}</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Successful shipments</span>
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
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $pending_shipments }}</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Shipments pending delivery</span>
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
                                <span class="card-label fw-bold text-dark">Shipments created per month</span>
                                <span class="text-gray-400 pt-2 fw-semibold fs-6">Displaying all shipments created in a
                                    month</span>
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
                            <div id="broker_shipments_created_pm_chart" class="w-100 h-350px"></div>
                            <!--end::Chart container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 17-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
        <script>
            $('document').ready(function() {
                getBrokersChartsData();
            });
        </script>
    </div>
@endsection
