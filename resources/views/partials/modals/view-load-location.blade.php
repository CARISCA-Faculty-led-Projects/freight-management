<!--begin::Modal - New Target-->
<div class="modal fade" id="view_load_location_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
                    data-bs-target="#password_reset_modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <div id="googleMap" style="width:100%;height:100rem;"></div>

                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
        <script>
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
                if (ltn.lat != null && ltn.lng != null) {
                    const marker = new google.maps.marker.AdvancedMarkerElement({
                        position: {
                            lat: ltn.lat,
                            lng: ltn.lng
                        },
                        content: buildLoadContent(load),
                    });

                    // markers can only be keyboard focusable when they have click listeners
                    // open info window when marker is clicked
                    marker.addListener("click", () => {
                        toggleHighlight(marker, option);
                    });
                    return marker;
                }

                // Add a marker clusterer to manage the markers.
                new markerClusterer.MarkerClusterer({
                    markers,
                    map
                });
            }
        </script>
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap">
        </script>
    </div>
    <!--end::Modal - New Target-->
