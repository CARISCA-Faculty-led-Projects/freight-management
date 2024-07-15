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

async function getMapData() {
    var res = "nu";
    await $.ajax({
        url: "organization/map-activity",
        success: function (data) {
            var results = [];
            // data.data.forEach((element) => {
            //     var loc = element.split(",");
            //     results.push({
            //         lat: loc[0],
            //         lng: loc[1],
            //     });
            // });
            res = data.data;
        },
    });
    return res;
}
// Initialize and add the map
// let map;

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
    var mapData = await getMapData();
    // const locations = JSON.parse({{ json_encode($locations) }});
    var mapDataKeys = Object.keys(mapData);
    mapDataKeys.forEach((option) => {
        const markers = [];
        console.log(mapData[option]);
        if (option == 'loads') {
            const markers = mapData[option].map((load) => {
                const ltn = load.pickup_address.location;
                const img = document.createElement("img");
                img.src = "/assets/media/icons/boxes.png";

                // priceTag.className = "price-tag";
                // priceTag.textContent = load.mask;

                const marker = new google.maps.marker.AdvancedMarkerElement({
                    position: {
                        lat: ltn.lat,
                        lng: ltn.lng
                    },
                    content: img,
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

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        } else if (option == 'drivers') {
            const markers = mapData[option].map((driver) => {
                const ltn = driver.last_location;
                const img = document.createElement("img");
                img.src = 'assets/media/icons/driver.png';

                // priceTag.className = "price-tag";
                // priceTag.textContent = driver.name;

                const marker = new google.maps.marker.AdvancedMarkerElement({
                    position: {
                        lat: ltn.lat,
                        lng: ltn.lng
                    },
                    content: img,
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

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        } else if (option == 'vehicles') {
            const markers = mapData[option].map((vehicle) => {
                const ltn = vehicle.last_location;
                const img = document.createElement("img");
                img.src = "/assets/media/icons/3d-truck.png";
                // img.className = "price-tag";
                // img.style = "width:10px";
                // priceTag.textContent = vehicle.make;

                const marker = new google.maps.marker.AdvancedMarkerElement({
                    position: {
                        lat: ltn.lat,
                        lng: ltn.lng
                    },
                    content: img,
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

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        } 
        // else if (option == 'vehicles') {

        // }
        return markers;
    });
    // ((options, i) => {


    // });


}



// async function initMap() {
//     // The location of Uluru
//     const main = {
//         lat: 8.342275,
//         lng: -1.183324,
//     };
//     // Request needed libraries.
//     //@ts-ignore
//     const { Map } = await google.maps.importLibrary("maps");
//     const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

//     // The map, centered at Uluru
//     map = new Map(document.getElementById("googleMap"), {
//         zoom: 8,
//         center: main,
//         mapId: "Loc",
//     });

//     // get data 
//     const mapData = await getMapData();

//     // Add some markers to the map.
//     function addShipmentMarker() {

//     }

//     // function addLoadMarker(loads) {
//     const markers = mapData.loads.map((load, i) => {
//         const ltn = load.pickup_address.location;
//         const pinGlyph = new google.maps.marker.PinElement({
//             glyph: load.name,
//             glyphColor: "black",
//         });
//         const priceTag = document.createElement("div");

//         priceTag.className = "price-tag";
//         // priceTag.textContent = position.label;
//         priceTag.classList.add('bg-white')

//         // console.log({ lat: ltn.lat, lng: ltn.lng });
//         const marker = new google.maps.marker.AdvancedMarkerElement({
//             position: { lat: ltn.lat, lng: ltn.lng },
//             content: pinGlyph.element,
//         });

//         // markers can only be keyboard focusable when they have click listeners
//         // open info window when marker is clicked
//         // marker.addListener("click", () => {
//         //     infoWindow.setContent(ltn.lat + ", " + ltn.lng);
//         //     infoWindow.open(map, marker);
//         // });
//         return marker;
//     });

//     // Add a marker clusterer to manage the markers.
//     new markerClusterer.MarkerClusterer({
//         markers,
//         map
//     });
//     // }

//     function addDriverMarker() {

//     }

//     // console.log(locations);

//     // const markers = locations.map((position, i) => {
//     //     const ltn = position;
//     //     const pinGlyph = new google.maps.marker.PinElement({
//     //         glyph: "position.label",
//     //         glyphColor: "black",
//     //     });
//     //     const priceTag = document.createElement("div");

//     //     priceTag.className = "price-tag";
//     //     // priceTag.textContent = position.label;
//     //     priceTag.classList.add('bg-white')

//     //     console.log({ lat: ltn.lat.parseFloat(), lng: ltn.lng.parseFloat() });
//     //     const marker = new google.maps.marker.AdvancedMarkerElement({
//     //         position: { lat: ltn.lat.parseInt, lng: ltn.lng.parseInt },
//     //         content: pinGlyph.element,
//     //     });

//     //     // markers can only be keyboard focusable when they have click listeners
//     //     // open info window when marker is clicked
//     //     marker.addListener("click", () => {
//     //         infoWindow.setContent(ltn.lat + ", " + ltn.lng);
//     //         infoWindow.open(map, marker);
//     //     });
//     //     return marker;
//     // });

//     // // Add a marker clusterer to manage the markers.
//     // new markerClusterer.MarkerClusterer({
//     //     markers,
//     //     map
//     // });
// }
