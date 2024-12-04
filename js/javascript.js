let map, infoWindow;

async function initMap() {
    const contentString = `
    <div>
        <h1>Example</h1>
        <div>
            <p>
                This is an example vending machine.
            </p>
        </div>
    </div>`;

    const infoWindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "Example",
    });

    const marker = document.querySelector('gmp-advanced-marker');
    marker.addEventListener('gmp-click', () => {
        infoWindow.open({ anchor: marker });
    });

    const locationButton = document.createElement("button");

    const geocoder = new google.maps.Geocoder();

    const map = document.querySelector('gmp-map').innerMap;

    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(
        locationButton
    );
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }); 

    document.getElementById('submit').addEventListener('click', () => {
        geocodeLatLng(geocoder, map, infoWindow);
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}

async function geocodeLatLng(geocoder, map, infoWindow) {
    const input = document.getElementById('latlng').value;
    const latlngStr = input.split(',', 2);
    const latlng = {
        lat: parseFloat(latlngStr[0]),
        lng: parseFloat(latlngStr[1]),
    };

    try {
        const response = await geocoder.geocode({ location: latlng });
        const marker = document.querySelector('gmp-advanced-marker');

        map.setZoom(11);
        marker.position = latlng;
        infoWindow.setContent(response.results[0].formatted_address);
        infoWindow.open({ anchor: marker });
    } catch (e) {
        window.alert(`Geocoder failed due to: ${e}`);
    }
}

window.initMap = initMap;