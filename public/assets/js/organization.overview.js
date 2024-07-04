async function getShipments() {
    var res = "nu";
 await $.ajax({
        url: "organization/active-shipment-coordinates",
        data: function (params) {
            var query = {
                search: params.term,
            };
            return query;
        },
        success: function (data) {
            var results = [];
            data.data.forEach((element) => {
                var loc = element.split(",");
                results.push({
                    lat: loc[0],
                    lng: loc[1],
                });
            });
            res = results;
        },
    });
    return res;
}
// Initialize and add the map
// let map;
// const locations = JSON.parse({{ json_encode($locations) }});
// const locations = document.getElementById('locs').innerText;
// const mapLocs = JSON.parse(locations)
// mapLocs.map((position,i)=>{
//     console.log(position.label+" "+position.position.lat);
// })
// console.log(mapLocs[0].position);

$("document").ready(function () {
    getShipments();
});

async function initMap() {
    // The location of Uluru
    const main = {
        lat: 8.342275,
        lng: -1.183324,
    };
    // Request needed libraries.
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    // The map, centered at Uluru
    map = new Map(document.getElementById("googleMap"), {
        zoom: 8,
        center: main,
        mapId: "Loc",
    });
    // Add some markers to the map.
    
    const locations = await getShipments();
    console.log(locations);

    const markers = locations.map((position, i) => {
        const ltn = position;
        const pinGlyph = new google.maps.marker.PinElement({
            glyph: "position.label",
            glyphColor: "black",
        });
        const priceTag = document.createElement("div");

        priceTag.className = "price-tag";
        // priceTag.textContent = position.label;
        priceTag.classList.add('bg-white')

        console.log({lat:ltn.lat.parseFloat(),lng:ltn.lng.parseFloat()});
        const marker = new google.maps.marker.AdvancedMarkerElement({
            position: {lat:ltn.lat.parseInt,lng:ltn.lng.parseInt},
            content: pinGlyph.element,
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

// initMap();>
