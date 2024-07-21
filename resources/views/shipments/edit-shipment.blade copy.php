<div class="">
    @php
        $locations = [];
        foreach ($this->loadsDets as $load) {
            $pickup = json_decode($load['pickup_address'])->location;
            $dropoff = json_decode($load['dropoff_address'])->location;

            $pickLocation = [
                'label' => '#' . $load['mask'] . ' pickup',
                'position' => $pickup,
            ];
            array_push($locations, $pickLocation);

            $dropLocation = [
                'label' => '#' . $load['mask'] . ' dropoff',
                'position' => $dropoff,
            ];
            array_push($locations, $dropLocation);
        }
        // dd($locations);
        // json_encode($locations);
    @endphp
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Edit Shipment</h1>
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
                    <li class="breadcrumb-item text-muted">
                        <a href="/shipments/list" class="text-muted text-hover-primary">Shipment</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Edit</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>

            <!--begin::Primary button-->
            <a href="{{ route(whichUser()->getTable() == 'brokers' ? 'broker.shipments.list' : 'org.shipments.list') }}"
                class="btn btn-sm fw-bold btn-primary">Shipment Board</a>
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form class="d-flex flex-column flex-lg-row" method="POST"
                action="{{ route(whichUser()->getTable == 'brokers' ? 'broker.shipment.update' : 'org.shipment.update', $this->shipment['mask']) }}">
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
                                {{-- <!--begin::Select2-->
                                <select class="form-select mb-2" name="load_type" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a sender" id="kt_ecommerce_add_category_store_template">
                                    <option></option>
                                    @foreach ($loads as $load)
                                        <option value="{{ $load->mask }}">{{ $load->mask }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2--> --}}
                                <!--begin::Table-->
                                <div class="" style="height: 200px; overflow:auto;">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                                        id="kt_ecommerce_sales_table">
                                        <thead>
                                            <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                                            value="1" />
                                                    </div>
                                                </th>
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
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="loads[]" value="{{ $load['mask'] }}" checked />
                                                        </div>
                                                    </td>
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
                                <label class="form-label">Shipment Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea name="description" id="" cols="30" rows="4" class="form-control"
                                    value="{{ $this->shipment['description'] }}"></textarea>
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
                                <h2>Pickup & Dropoff Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <div id="googleMap" style="width:100%;height:100rem;"></div>

                        <!--begin::Card body-->
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
                                        <h2>Pickup Address <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"
                                                wire:loading></span></h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 ">

                                    <!--begin::Menu toggle-->
                                    <select name="pickup_address" id="pickup_address"
                                        class="form-control mt-2 @error('pickup_address')border-danger @enderror basic-select2"
                                        style="width: 40rem;">
                                        <option value="{{ $this->shipment['pickup_address'] }}" selected>
                                            {{ json_decode($this->shipment['pickup_address'])->name }}</option>
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
                                <div class="card-header text-center">
                                    <div class="card-title">
                                        <h2>Drop-off Address <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"
                                                wire:loading></span></h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <select name="dropoff_address" id="dropoff_address"
                                        class="form-control mt-2 @error('dropoff_address')border-danger @enderror basic-select2"
                                        style="width: 40rem;">
                                        <option value="{{ $this->shipment['dropoff_address'] }}" selected>
                                            {{ json_decode($this->shipment['dropoff_address'])->name }}</option>


                                    </select>
                                    <!--end::Card body-->
                                    @error('dropoff_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Shipping address-->
                            </div>
                        </div>
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
                                        class="form-select mb-2 @error('driver_id')border-danger @enderror basic-select2"
                                        name="driver_id" data-hide-search="true" data-placeholder="Select a sender"
                                        id="kt_ecommerce_add_category_store_template">
                                        <option value="{{ $this->driver['mask'] }}">{{ $this->driver['name'] }}
                                        </option>
                                        @foreach ($this->getDrivers() as $driver)
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
                                        <label for="">Assign driver later</label>
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
    <!--end::Content wrapper-->
    <!--end::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
</div>
<!--end::Scrolltop-->
<script>
    // Initialize and add the map
    // let map;
    // const locations = JSON.parse({{ json_encode($locations) }});
    const locations = document.getElementById('locs').innerText;
    const mapLocs = JSON.parse(locations)
    // mapLocs.map((position,i)=>{
    //     console.log(position.label+" "+position.position.lat);
    // })
    // console.log(mapLocs[0].position);

    async function initMap() {
        // The location of Uluru
        const main = {
            lat: 8.342275,
            lng: -1.183324
        };
        // Request needed libraries.
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
            const pinGlyph = new google.maps.marker.PinElement({
                glyph: position.label,
                glyphColor: "black",
            });
            const priceTag = document.createElement("div");

            priceTag.className = "price-tag";
            priceTag.textContent = position.label;
            priceTag.classList.add('bg-white')

            const marker = new google.maps.marker.AdvancedMarkerElement({
                position: ltn,
                content: priceTag,
            });

            // markers can only be keyboard focusable when they have click listeners
            // open info window when marker is clicked
            marker.addListener("click", () => {
                infoWindow.setContent(ltn.lat + ", " + ltn.lng);
                infoWindow.open(map, marker);
            });
            return marker;
        });

        // Add a marker clusterer to manage the markers.
        new markerClusterer.MarkerClusterer({
            markers,
            map
        });
    }

    // initMap();
</script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&loading=async&callback=initMap"></script>

</div>


{{-- <div role="dialog" tabindex="-1" class="gm-style-iw gm-style-iw-c" aria-label="DAK FARMS"
    style="padding-top: 0px; max-width: 648px; max-height: 1138px; min-width: 228px;">
    <div class="gm-style-iw-chr">
        <div class="gm-style-iw-ch" id="B67F8993-B82E-4D16-AFBA-CD6BE11830C2">
            <div dir="ltr" style="" jstcache="0">
                <div jstcache="37" class="transit-container">
                    <div jstcache="10">
                        <div jstcache="11" class="gm-title gm-full-width" jsan="7.gm-title,7.gm-full-width">DAK
                            FARMS</div>
                    </div>
                    <div jstcache="12" class="transit-title" style="display:none"> <span jstcache="13"></span>
                        <div aria-label=" Station is accessible " title=" Station is accessible " role="img"
                            jstcache="14" class="transit-wheelchair-icon" style="display:none"></div>
                    </div>
                </div>
            </div>
        </div><button
            style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; width: 48px; height: 48px;"
            draggable="false" aria-label="Close" title="Close" type="button" class="gm-ui-hover-effect"><span
                style="mask-image: url(&quot;data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22/%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3C/svg%3E&quot;); pointer-events: none; display: block; width: 24px; height: 24px; margin: 12px;"></span></button>
    </div>
    <div class="gm-style-iw-d" style="max-height: 1102px;">
        <div dir="ltr" style="" jstcache="0">
            <div jstcache="36" class="poi-info-window gm-style">
                <div jstcache="2">
                    <div jstcache="3" class="transit-container" style="display:none">
                        <div jstcache="10">
                            <div jstcache="11" class="gm-title gm-full-width" jsan="7.gm-title,7.gm-full-width">DAK
                                FARMS</div>
                        </div>
                        <div jstcache="12" class="transit-title" style="display:none"> <span jstcache="13"></span>
                            <div aria-label=" Station is accessible " title=" Station is accessible " role="img"
                                jstcache="14" class="transit-wheelchair-icon" style="display:none"></div>
                        </div>
                    </div>
                    <div class="address">
                        <div jstcache="4" jsinstance="0" class="address-line full-width"
                            jsan="7.address-line,7.full-width">Abesre</div>
                        <div jstcache="4" jsinstance="*1" class="address-line full-width"
                            jsan="7.address-line,7.full-width">Ghana</div>
                    </div>
                </div>
                <div jstcache="5" style="display:none"></div>
                <div class="view-link"> <a target="_blank" jstcache="6"
                        href="https://maps.google.com/maps?ll=6.463781,-0.254107&amp;z=16&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3&amp;cid=13376516282763094761"
                        tabindex="0"> <span> View on Google Maps </span> </a> </div>
            </div>
        </div>
    </div>
</div> --}}
