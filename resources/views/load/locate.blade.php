@extends('layout.roles.all')
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
                        Locate Load</h1>
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
                            <a href="/fleet/loads" class="text-muted text-hover-primary">Load</a>
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
                {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="{{ route('org.load.board') }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load
                        Board</a>
                    <!--end::Secondary button-->
                    <!--begin::Secondary button-->
                    <a href="{{ route('load.edit', $load->mask) }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Edit load</a>
                    <!--end::Secondary button-->
                    <!--begin::Secondary button-->
                    <a href="{{ route('loads') }}"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">View loads    </a>
                    <!--end::Secondary button-->
                    <!--begin::Secondary button-->
                    <a data-bs-toggle="modal" data-bs-target="#kt_modal_users_search"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Reassign Load</a>
                    <!--end::Secondary button-->
                </div> --}}
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
                        <div class="card-body pt-5">
                            <!--begin::Details toggle-->
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Go back</a>
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">Load Details</div>
                                <!--begin::Badge-->
                                {{-- <div class="badge badge-success d-inline">Approved</div> --}}
                                <!--begin::Badge-->
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">ID</div>
                                <div class="text-gray-600">{{ $load->mask }}</div>
                                <!--end::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Pickup</div>
                                <div class="text-gray-600">{{ json_decode($load->pickup_address)->name }}</div>
                                <!--end::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Dropoff</div>
                                <div class="text-gray-600">{{ json_decode($load->dropoff_address)->name }}</div>
                                <!--end::Details item-->

                                <div class="d-flex flex-stack fs-4 py-3 mt-5">
                                    <div class="fw-bold">Sender Details</div>
                                    <!--begin::Badge-->
                                    {{-- <div class="badge badge-success d-inline">Approved</div> --}}
                                    <!--begin::Badge-->
                                </div>
                                <div class="separator separator-dashed my-3"></div>

                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Name</div>
                                <div class="text-gray-600">{{ $sender->name }}</div>
                                <!--end::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600">{{ $sender->email }}</div>
                                <!--end::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">PHone</div>
                                <div class="text-gray-600">{{ $sender->phone }}</div>
                                <!--end::Details item-->
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
                        <span class="d-none" id="last_location">{{ $load->pickup_address }}</span>
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
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap" defer></script>
    <script>
        // Initialize and add the map
        const addr = document.getElementById('last_location').innerText;

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

            // The map, centered at Ghana
            map = new Map(document.getElementById("googleMap"), {
                zoom: 7,
                center: main,
                mapId: "Loc",
            });
            // Add markers to the map.
            const ltn = JSON.parse(addr).location;

            const content = document.createElement("div");
            content.classList.add("property");
            content.innerHTML = `<div class="icon">
                    <img style="width:40px;height:40px" src="/assets/media/icons/boxes.png"/>
                        </div>`;

            const marker = new google.maps.marker.AdvancedMarkerElement({
                position: {
                    lat: parseFloat(ltn.lat),
                    lng: parseFloat(ltn.lng)
                },
                content: content,
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

@endsection
