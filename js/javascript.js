let map, infoWindow;
let machineName, machineDescription, machineType, machineCoords;
let contentString;
let markers = [];

//Initializes the map and awaits button inputs
async function initMap() {
    const geocoder = new google.maps.Geocoder();

    map = document.querySelector('gmp-map').innerMap;
    infoWindow = new google.maps.InfoWindow({
        content: contentString,
    });

    // When the Add a Machine button is clicked
    document.getElementById('submit').addEventListener('click', () => {

        machineName = document.getElementById('machine-name').value;
        machineDescription = document.getElementById('machine-description').value;
        machineType = document.getElementById('machine-type').value;
        machineCoords = document.getElementById('latlng').value;

        // Makes sure both input fields are filled out
        if (!machineName || !machineDescription) {
            alert('Please fill out both the Title and Description fields.');
            return;
        }

        // Makes sure the coordinates field is filled out
        if (!machineCoords) {
            alert('Please provide the latitude and longitude coordinates.');
            return;
        }

        // What the infoWindow will display, with the input values interpolated
        contentString =
            `<div>
                    <h1>${machineName}</h1>
                <div>
                    <p>
                        ${machineDescription}
                    </p>
                    <p>
                        Machine type: <b>${machineType}</b>
                    </p>
                </div>
            </div>`;

        geocodeLatLng(geocoder, map, infoWindow);
    });
}

async function geocodeLatLng(geocoder, map, infoWindow) {
    const latlngStr = machineCoords.split(',', 2);
    const latlng = {
        lat: parseFloat(latlngStr[0]),
        lng: parseFloat(latlngStr[1]),
    };

    try {
        const response = await geocoder.geocode({ location: latlng });
        const marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: {
                url: 'images/vending_clipart.png',
                scaledSize: new google.maps.Size(25, 25),
            },
        });

        // Adds the marker to an array of all the markers.
        markers.push(marker);

        const markerContent = (contentString + response.results[0].formatted_address);
        google.maps.event.addListener(marker, 'click', () => {
            infoWindow.setContent(markerContent);
            infoWindow.open(map, marker);
        });
    } catch (e) {
        window.alert(`Geocoder failed due to: ${e}`);
    }
}

window.initMap = initMap;