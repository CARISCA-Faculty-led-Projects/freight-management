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
            // json_encode($locations);
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

    <script>
        // Initialize and add the map
        const locations = document.getElementById('locs').innerText;
        const mapLocs = JSON.parse(locations);

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
                zoom: 8,
                center: main,
                mapId: "Loc",
            });
            // Add some markers to the map.
            // const locations = JSON.parse({{ json_encode($locations) }});

            const markers = mapLocs.map((position, i) => {
                const ltn = position.position;
                const priceTag = document.createElement("div");

                priceTag.className = "price-tag";
                priceTag.textContent = position.label;

                const marker = new google.maps.marker.AdvancedMarkerElement({
                    position: {
                        lat: parseFloat(ltn.lat),
                        lng: parseFloat(ltn.lng)
                    },
                    content: priceTag,
                });

                // markers can only be keyboard focusable when they have click listeners
                // open info window when marker is clicked
                marker.addListener("click", () => {
                    // infoWindow.setContent(ltn.lat + ", " + ltn.lng);
                    // infoWindow.open(map, marker);
                    // addPos({
                    //     lat: parseFloat(ltn.lat),
                    //     lng: parseFloat(ltn.lng)
                    // });
                });
                return marker;
            });

            function addPos(location) {

                flightPathCoordinates.push(location);
                console.log(flightPathCoordinates);

                flightPath = new google.maps.Polyline({
                    path: flightPathCoordinates,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });

                flightPath.setMap(map);
            }

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        }
    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&loading=async&callback=initMap"></script>
@endsection
