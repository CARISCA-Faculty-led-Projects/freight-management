async function getLoadData() {
    var res = "nu";
    await $.ajax({
        url: "organization/load/overview-map-data",
        success: function (data) {
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
    var mapData = await getLoadData();
    // const locations = JSON.parse({{ json_encode($locations) }});
    const markers = mapData.map((load) => {
        // console.log(load);.
        const ltn = load.pickup_address.location;

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
            toggleHighlight(marker);
        });
        return marker;
    });

    // Add a marker clusterer to manage the markers.
    new markerClusterer.MarkerClusterer({
        markers,
        map
    });

}

function toggleHighlight(markerView) {
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