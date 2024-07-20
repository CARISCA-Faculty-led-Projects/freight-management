<!--begin::Modal - New Target-->
<div class="modal fade" id="view_load_location_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-1000px">
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
                <span class="hidden"></span>
                <!--begin:Form-->
                <div id="googleMap" style="width:100%;height:50rem;"></div>

                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->
    <script>
        async function initMap() {
            var marker = null;
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
            // Add a marker to the map and push to the array.
            // Add some markers to the map.
            const pinGlyph = new google.maps.marker.PinElement({
                glyph: 'load.name',
                glyphColor: "black",
            });

            //    map.clearOverlays();
            $('.menu #locateBtn').on('click', function() {
                marker.setMap(null);
                const pickup = $(this).data('pickup-address');
                const load = $(this).data('load');
                const ltn = pickup.location;
                //    $('#view_load_location_modal #loadAddress').val(pickup);
                //    $('#view_load_location_modal').modal('show');


                if (ltn.lat != null && ltn.lng != null) {
                    const marker = new google.maps.marker.AdvancedMarkerElement({
                        position: {
                            lat: ltn.lat,
                            lng: ltn.lng
                        },
                        //    content: pinGlyph.element,
                        content: buildLoadContent(load),

                    });

                    // markers can only be keyboard focusable when they have click listeners
                    // open info window when marker is clicked
                    marker.addListener("click", () => {
                        toggleHighlight(marker);
                    });
                    //    return marker;
                    marker.setMap(map);
                }
            });
        }

        function toggleHighlight(markerView, property) {
            if (markerView.content.classList.contains("highlight")) {
                markerView.content.classList.remove("highlight");
                markerView.zIndex = null;
            } else {
                markerView.content.classList.add("highlight");
                markerView.zIndex = 1;
            }
        }

        function buildLoadContent(load) {
            const content = document.createElement("div");
            content.classList.add("property");
            content.innerHTML = `<
             div class = "icon" >
             <
             img src = "/assets/media/icons/boxes.png" / >
             <
             /div> <
             div class = "details mt-2" >
             <
             div class = "price" > Load #$ {
                 load.mask
             } < /div> <
             div class = "price" > Sender name: $ {
                 load.sender
             } < /div> <
             div class = "address mb-3" > Sender phone: $ {
                 load.sender_phone
             } < /div> <
             div class = "price" > Load dropoff: $ {
                 load.dropoff_address.name
             } < /div>

             <
             /div>`;
            return content;

        }
    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaquW_WUJP20HZnftmUWYGEXdNUqGoai0&loading=async&callback=initMap">
    </script>
    <!--end::Content container-->
</div>
