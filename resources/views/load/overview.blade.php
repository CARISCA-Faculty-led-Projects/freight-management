@extends('layout.roles.organization')

@section('content')
    <div class="">
        @php
            $locations = [];
            foreach ($loads as $load) {
                // dd($load);
                $pickup = json_decode($load->pickup_address);
                $dropoff = json_decode($load->dropoff_address);

                $pickLocation = [
                    'label' => $pickup->name,
                    'position' => $pickup->location,
                ];
                array_push($locations, $pickLocation);

                // $dropLocation = [
                //     'label' => $dropoff->name,
                //     'position' => $dropoff->location,
                // ];
                // array_push($locations, $dropLocation);
                // dd($locations)
            }
        @endphp
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        All loads</h1>
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
                            <span class="text-muted text-hover-primary">Loads</span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">View</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>

                <!--begin::Primary button-->
                <a href="/shipments/list" class="btn btn-sm fw-bold btn-primary">Shipment Board</a>
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
                <div class="card">

                    <div class="card-header">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Showing all load pickup points</h1>
                    </div>
                    <div class="card-body">
                        <div id="googleMap" style="width:100%;height:100rem;"></div>
                    </div>
                </div>
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
    <span class="d-none" id="locs">{{ json_encode($locations) }}</span>
    <!--end::Scrolltop-->
    </div>
    <script src="{{ asset('assets/js/org.load.overview.js') }}"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap" defer>
    </script>
@endsection
