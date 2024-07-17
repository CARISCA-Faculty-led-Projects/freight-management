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
            });

            // Add a marker clusterer to manage the markers.
            new markerClusterer.MarkerClusterer({
                markers,
                map
            });
        } else if (option == 'drivers') {
            const markers = mapData[option].map((driver) => {
                const ltn = driver.last_location;
                if (ltn.lat != null && ltn.lng != null) {

                    const marker = new google.maps.marker.AdvancedMarkerElement({
                        position: {
                            lat: ltn.lat,
                            lng: ltn.lng
                        },
                        content: buildDriverContent(driver),
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
        } else if (option == 'vehicles') {
            const markers = mapData[option].map((vehicle) => {
                const ltn = vehicle.last_location;
                if (ltn.lat != null && ltn.lng != null) {
                    const marker = new google.maps.marker.AdvancedMarkerElement({
                        position: {
                            lat: ltn.lat,
                            lng: ltn.lng
                        },
                        content: buildVehicleContent(vehicle),
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
        } else if (option == 'shipments') {
            const markers = mapData[option].map((shipment) => {
                const ltn = shipment.shipment_location;

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

function buildLoadContent(load) {
    const content = document.createElement("div");
    content.classList.add("property");
    content.innerHTML = `
      <div class="icon">
      <img src="/assets/media/icons/boxes.png"/>
      </div>
      <div class="details mt-2">
          <div class="price">Load #${load.mask}</div>
          <div class="price">Sender name: ${load.sender}</div>
          <div class="address mb-3">Sender phone: ${load.sender_phone}</div>
          <div class="price">Load dropoff: ${load.dropoff_address.name}</div>

            </div>
      `;
    return content;
}

function buildDriverContent(driver) {
    const content = document.createElement("div");
    content.classList.add("property");
    content.innerHTML = `
      <div class="icon">
      <img src="/assets/media/icons/driver.png"/>
      </div>
      <div class="details mt-2">
          <div class="price">Driver name: ${driver.name}</div>
          <div class="price mt-2">Driver phone: ${driver.phone}</div>
          <div class="address">Last login: ${driver.last_login}</div>
     </div>
      `;
    return content;
}

function buildVehicleContent(vehicle) {
    const content = document.createElement("div");
    content.classList.add("property");
    content.innerHTML = `
      <div class="icon">
      <img src="/assets/media/icons/3d-truck.png"/>
      </div>
      <div class="details mt-2">
          <div class="price">${vehicle.make} ${vehicle.model}</div>
          <div class="price mt-2 mb-3">Reg Number: ${vehicle.number}</div>

          <div class="price">Driver name: ${vehicle.driver_id != null ? vehicle.driver : 'Unassigned'}</div>
          <div class="price mt-2">Driver contact: ${vehicle.driver_id != null ? vehicle.driver_phone : 'Unassigned'}</div>
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
          <div class="address mt-2">Driver - <strong>${shipment.driver}</strong></div>
          <div class="address mt-2">Driver contact- <strong>${shipment.driver_contact}</strong></div>
          
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
