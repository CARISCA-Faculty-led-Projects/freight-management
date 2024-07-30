async function getShipments() {
    var res = "nu";
    await $.ajax({
        url: "driver/active-shipment-coordinates",
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
        url: "driver/map-activity",
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
    var mapDataKeys = Object.keys(mapData);
    mapDataKeys.forEach((option) => {
        const markers = [];
        // console.log(mapData[option]);
            if (option == 'shipments') {
            const markers = mapData[option].map((shipment) => {
                const ltn = shipment.shipment_location;  //pickup address from backend is shipment_location here
                if (ltn !=null && ltn.lat != null && ltn.lng != null) {

                const marker = new google.maps.marker.AdvancedMarkerElement({
                    position: {
                        lat: ltn.lat,
                        lng: ltn.lng
                    },
                    content: buildShipmentContent(shipment),
                });

                // markers can only be keyboard focusable when they have click listeners
                // open info window when marker is clicked
                marker.addListener("click", () => {
                    toggleHighlight(marker, option);
                });
                return marker;
            }
            });

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        }
        return markers;
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

function buildContent(property) {
    const content = document.createElement("div");

    content.classList.add("property");
    content.innerHTML = `
      <div class="icon">
          <i aria-hidden="true" class="bg-dark fa fa-icon fa-property.type}" title="property.type}"></i>
          <span class="fa-sr-only">property.type</span>
      </div>
      <div class="details">
          <div class="price">property.price}</div>
          <div class="address">property.address}</div>
          <div class="features">
          <div>
              <i aria-hidden="true" class="fa fa-bed fa-lg bed" title="bedroom"></i>
              <span class="fa-sr-only">bedroom</span>
              <span>property.bed}</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-bath fa-lg bath" title="bathroom"></i>
              <span class="fa-sr-only">bathroom</span>
              <span>$roperty.bath}</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-ruler fa-lg size" title="size"></i>
              <span class="fa-sr-only">size</span>
              <span>property.size} ft<sup>2</sup></span>
          </div>
          </div>
      </div>
      `;
    return content;
}


function buildShipmentContent(shipment) {
    const content = document.createElement("div");

    content.classList.add("property");
    content.innerHTML = `
      <div class="icon">
         <img src="/assets/media/icons/shipment.png"/>
      </div>
      <div class="details">
          <div class="price">Shipment #${shipment.shipment}</div>
          <div class="address mt-2">Starting point:  <strong>${shipment.starting_point}</strong></div>
          <div class="address mt-2">Destination:- <strong>${shipment.destination}</strong></div>
      </div>
      `;
    return content;
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
