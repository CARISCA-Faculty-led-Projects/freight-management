@extends(whichUser()->getTable() == 'brokers' ? 'layout.roles.broker' : 'layout.roles.organization')
@section('content')
    <!--begin::Content-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Locate Vehicle</h1>
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
                            <a href="/fleet/vehicles" class="text-muted text-hover-primary">Vehicle</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Locate</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="{{ route('org.load.board') }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load
                        Board</a>
                    <!--end::Secondary button-->
                    <!--begin::Secondary button-->
                    <a href="{{ route('vehicle.edit', $vehicle->mask) }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Edit Vehicle</a>
                    <!--end::Secondary button-->
                    <!--begin::Secondary button-->
                    <a href="{{ route('vehicles') }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">View Vehicles    </a>
                    <!--end::Secondary button-->
                    {{-- <!--begin::Secondary button-->
                    <a data-bs-toggle="modal" data-bs-target="#kt_modal_users_search"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Reassign Load</a>
                    <!--end::Secondary button--> --}}
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
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
                                {{-- <div class="symbol symbol-150px symbol-circle mb-7">
															<img src="assets/media/avatars/300-1.jpg" alt="image" />
														</div> --}}
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                {{-- <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">#{{ $vehicle->mask }}</a> --}}
                                <!--end::Name-->
                                <!--begin::Email-->
                                <a href="#"
                                    class="fs-3 text-dark fw-semibold text-hover-primary mb-6">{{ $org->name }}</a>
                                <!--end::Email-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">Vehicle Details</div>
                                <!--begin::Badge-->
                                {{-- <div class="badge badge-success d-inline">Approved</div> --}}
                                <!--begin::Badge-->
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Vehicle Number</div>
                                <div class="text-gray-600">{{ $vehicle->number }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Assignment Status</div>
                                <div
                                    class="badge @if ($vehicle->driver_id == 'Assigned') badge-light-success
                                    @elseif($vehicle->driver_id == 'Unassigned')
                                    badge-light-danger
                                    @else
                                    badge-light-primary @endif">
                                    {{ $vehicle->driver_id != null ? 'Assigned' : 'Unassigned' }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                {{-- <div class="fw-bold mt-5">Shipment Status</div>
                            <div
                            class="badge @if ($vehicle->driver_id == 'Assigned')  badge-light-success
                                    @elseif($vehicle->driver_id == 'Unassigned')
                                    badge-light-danger
                                    @else
                                    badge-light-primary @endif">
                                    {{ $vehicle->driver_id != null ? "Assigned" : "Unassigned" }}</div> --}}
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Category</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{ $vehicle->category }}</a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Sub Category</div>
                                <div class="text-gray-600">
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary">{{ $vehicle->subcategory }}</a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3 pt-10">
                                    <div class="fw-bold">Assigned Organization Details</div>
                                    <!--begin::Badge-->
                                    {{-- <div class="badge badge-success d-inline">Approved</div> --}}
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>

                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Assigned Driver</div>
                                @if ($driver)
                                <div class="text-gray-600">
                                    <a href="{{ route('drivers.view',$driver->mask) }}"
                                        class="text-gray-600 text-hover-primary">{{ $driver->name }}</a>
                                </div>
                                <!--begin::Details item-->

                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Driver Phone</div>
                                <div class="text-gray-600">{{ $driver->phone }}</div>
                                <!--begin::Details item-->
                                @else
                                    <span class="badge badge-warning">Unassigned</span>
                                @endif
                              
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
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <span class="d-none" id="last_location">{{ $vehicle->last_location }}</span>
                        <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <div id="googleMap" style="width:100%;height:800px;"></div>

                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
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

    <script>
        // Initialize and add the map
        // let map;
        const loc = document.getElementById('last_location').innerText;

        async function initMap() {
            // The location of GH
            const main = {
                lat: 8.342275,
                lng: -1.183324
            };
            // Request needed libraries.
            //@ts-ignore
            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");

            // The map, centered at Uluru
            map = new Map(document.getElementById("googleMap"), {
                zoom: 7,
                center: main,
                mapId: "Loc",
            });
            // Add markers to the map.

            const ltn = JSON.parse(loc);

            const priceTag = document.createElement("div");

            priceTag.className = "price-tag";
            priceTag.textContent ="{{ $vehicle->number }}";

            const marker = new google.maps.marker.AdvancedMarkerElement({
                position: {
                    lat: parseFloat(ltn.lat),
                    lng: parseFloat(ltn.lng)
                },
                content: priceTag,
            });

            // markers can only be keyboard focusable when they have click listeners
            // open info window when marker is clicked
            // marker.addListener("click", () => {
            //     // infoWindow.setContent(ltn.lat + ", " + ltn.lng);
            //     // infoWindow.open(map, marker);
            //     addPos({
            //         lat: parseFloat(ltn.lat),
            //         lng: parseFloat(ltn.lng)
            //     });
            // });
            
            // Add a marker clusterer to manage the markers.
           marker.setMap(map);
        }

    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&loading=async&callback=initMap"></script>
@endsection
