<div class="">
    @php
        $locations = [];
        foreach ($this->loadsDets as $load) {
            $pickup = json_decode($load['pickup_address']);
            $dropoff = json_decode($load['dropoff_address']);

            $pickLocation = [
                'label' => $pickup->name,
                'position' => $pickup->location,
            ];
            array_push($locations, $pickLocation);

            $dropLocation = [
                'label' => $dropoff->name,
                'position' => $dropoff->location,
            ];
            array_push($locations, $dropLocation);
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
                    Create Shipment</h1>
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
                        <span class="text-muted text-hover-primary">Shipment</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
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
            <form class="d-flex flex-column flex-lg-row" method="POST"
                action="{{ route(whichUser()->getTable() == 'brokers' ? 'broker.shipment.save' : 'org.shipment.save') }}">
                @csrf
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Selected Loads</label>
                                <!--end::Label-->
                                <input type="hidden" name="organization_id" value="{{ $this->organization['mask'] }}">
                                <!--begin::Table-->
                                <div class="" style="height: 200px; overflow:auto;">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                                        id="kt_ecommerce_sales_table">
                                        <thead>
                                            <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">

                                                <th class="min-w-50px">#</th>
                                                <th class="min-w-50px">Category</th>
                                                <th class="text-end min-w-70px">Status</th>
                                                <th class="text-end min-w-70px">Size</th>
                                                <th class="text-end min-w-70px">Pickup</th>
                                                <th class="text-end min-w-70px">Dropoff</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @foreach ($this->loadsDets as $load)
                                                <tr>
                                                    <input type="hidden" name="loads[]" value="{{ $load['mask'] }}">
                                                    <td>{{ $load['mask'] }}</td>
                                                    <td>{{ $load['load_type'] }}</td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Badges-->
                                                        <div
                                                            class="badge @if ($load['status'] == 'Approved') badge-light-primary
                                                        @elseif($load['status'] == 'Pending')
                                                        badge-light-warning
                                                        @elseif($load['status'] == 'Rejected')
                                                        badge-light-danger
                                                        @elseif($load['status'] == 'Paid')
                                                        badge-light-success
                                                        @else
                                                        badge-light-primary @endif">
                                                            {{ $load['status'] }}</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="fw-bold">{{ $load['quantity'] }},
                                                            {{ $load['weight'] }} KG,
                                                            {{ $load['length'] }}*{{ $load['breadth'] }}*{{ $load['height'] }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['pickup_address'])->name }}</td>
                                                    <td class="text-end">
                                                        {{ json_decode($load['dropoff_address'])->name }}</td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Assigned Organization</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select
                                    class="form-select mb-2 @error('organization_id')border-danger @enderror basic-select2"
                                    name="organization_id" data-hide-search="true" data-placeholder="Select an organization">
                                    @foreach ($this->getOrgs() as $org)
                                        <option value="{{ $org->mask }}" {{ $this->organization['mask'] == $org->mask ? "selected" : '' }}>{{ $org->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('organization_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Shipment Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the category for
                                    better visibility.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Pickups & Dropoffs Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                            <!--begin::Payment address-->
                            <div class="card card-flush py-4 flex-row-fluid position-relative">
                                <!--begin::Background-->
                                <div
                                    class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                    <i class="ki-solid ki-delivery" style="font-size: 14em"></i>
                                </div>
                                <!--end::Background-->
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Pick a starting point</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 ">
                                    <!--begin::Menu toggle-->
                                    <select name="pickup_address" id="start" required
                                        class="form-control mt-2 @error('pickup_address')border-danger @enderror"
                                        style="width: 40rem;">
                                        <option value="">--select location--</option>
                                        @foreach ($locations as $index => $location)
                                            <option value="{{ $index }}">
                                                {{ $location['label'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('pickup_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Payment address-->

                            <!--begin::Shipping address-->
                            <div class="card card-flush py-4 flex-row-fluid position-relative">
                                <!--begin::Background-->
                                <div
                                    class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                    <i class="ki-solid ki-delivery" style="font-size: 13em"></i>
                                </div>
                                <!--end::Background-->
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Pick a destination<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"
                                                wire:loading></span></h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <select name="dropoff_address" id="end" required
                                        class="form-control mt-2 @error('dropoff_address')border-danger @enderror"
                                        style="width: 40rem;">
                                        <option value="">--select location--</option>
                                        @foreach ($locations as $index => $location)
                                            <option value="{{ $index }}">
                                                {{ $location['label'] }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Card body-->
                                    @error('dropoff_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Shipping address-->
                            </div>
                        </div>
                        <input type="text" name="route" class="d-none" id="route">
                        <input type="text" name="starting_point" class="d-none" id="starting">
                        <input type="text" name="destination" class="d-none" id="dest">
                        <input type="text" name="starting_addr" class="d-none" id="startingAdr">
                        <input type="text" name="destination_addr" class="d-none" id="destAdr">
                        <div id="googleMap" style="width:100%;height:100rem;"></div>
                        <div id="sidebar"></div>
                        <div id="floating-panel"></div>

                        <!--begin::Card body-->

                        <!--end::Meta options-->
                        <!--begin::Automation-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Available drivers</h2> <a wire:click="check"
                                        class="btn btn-sm btn-primary ms-3">Look
                                        up</a>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 py-4">
                                    <!--begin::Label-->
                                    <label class="required form-label">Driver</label>
                                    <!--end::Label-->
                                    <!--begin::Select2-->
                                    <select
                                        class="form-select basic-select2 mb-2 @error('driver_id')border-danger @enderror"
                                        name="driver_id" data-hide-search="true" data-placeholder="Select a driver"
                                        id="kt_ecommerce_add_category_store_template">
                                        <option></option>
                                        @foreach ($this->drivers as $driver)
                                            <option value="{{ $driver->mask }}">{{ $driver->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('driver_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!--end::Select2-->
                                    <div class="">
                                        <input type="checkbox" class="mt-3" name="no_driver" id=""
                                            value="true">
                                        <label for="">&nbsp;Assign driver later</label>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Automation-->

                        <div class="d-flex justify-content-end me-5">
                            <!--begin::Button-->
                            <a href="/apps/ecommerce/catalog/products" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                <span class="indicator-progress" wire:loading>Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
            </form>
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

    function initMap() {
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const directionsService = new google.maps.DirectionsService();
        const map = new google.maps.Map(document.getElementById("googleMap"), {
            zoom: 8,
            center: {
                lat: 8.342275,
                lng: -1.183324
            },
            disableDefaultUI: true,
        });

        directionsRenderer.setMap(map);
        // directionsRenderer.setPanel(document/.getElementById("sidebar"));

        // const control = document.getElementById("floating-panel");

        // map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        const onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        };

        document.getElementById("start").addEventListener("change", onChangeHandler);
        document.getElementById("end").addEventListener("change", onChangeHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        const start = document.getElementById("start").value;
        const end = document.getElementById("end").value;
        // const route = document.getElementById("route").value;

        if (start != '' && end != '') {
            document.getElementById("starting").value = mapLocs[start].label;
            document.getElementById("dest").value = mapLocs[end].label;
            document.getElementById("startingAdr").value = JSON.stringify(mapLocs[start].position);
            document.getElementById("destAdr").value = JSON.stringify(mapLocs[end].position);

            var wayPts = [];
            mapLocs.forEach((element, i) => {

                if (i != start && i != end) {
                    wayPts.push({
                        location: element.position,
                        stopover: true
                    });
                }
            });
            directionsService
                .route({
                    origin: mapLocs[start].position,
                    destination: mapLocs[end].position,
                    travelMode: google.maps.TravelMode.DRIVING,
                    waypoints: wayPts,
                    optimizeWaypoints: true,
                    provideRouteAlternatives: true,

                })
                .then((response) => {
                    var allroute = [];
                    directionsRenderer.setDirections(response);
                    response.routes[0].waypoint_order.forEach((element) => {
                        allroute.push(wayPts[element].location);
                    });
                    document.getElementById("route").value = JSON.stringify(allroute);

                })
                .catch((e) => window.alert("Directions request failed due to " + e));
        }
    }

    // window.initMap = initMap;
    $('document').ready(function() {

        initMap();
    });
</script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap"></script>
