let map, infoWindow;
let machineName, machineDescription, machineType, machineCoords;
let markers = [];

// Initialize the map and set up event listeners
async function initMap() {
    const geocoder = new google.maps.Geocoder();

    // Ensure the map is properly initialized (assuming the custom tag is working)
    const mapElement = document.querySelector('gmp-map');
    if (mapElement && mapElement.innerMap) {
        map = mapElement.innerMap;
    } else {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 40.424, lng: -86.921 },
            zoom: 15,
        });
    }

    infoWindow = new google.maps.InfoWindow();

    // Load markers from localStorage when the page loads
    loadMarkersFromStorage(map, infoWindow);

    // Only on addmachine.html: Set up the event listener to add new machine
    if (document.getElementById('submit')) {
        document.getElementById('submit').addEventListener('click', () => {
            machineName = document.getElementById('machine-name').value;
            machineDescription = document.getElementById('machine-description').value;
            machineType = document.getElementById('machine-type').value;
            machineCoords = document.getElementById('latlng').value;

            // Ensure the necessary fields are filled out
            if (!machineName || !machineDescription || !machineCoords) {
                alert('Please fill out all fields.');
                return;
            }

            // Validate latlng format
            const latlngStr = machineCoords.split(',');
            if (latlngStr.length !== 2 || isNaN(latlngStr[0]) || isNaN(latlngStr[1])) {
                alert('Please enter valid coordinates in the format "lat,lng".');
                return;
            }

            // Prepare content for the info window
            const contentString = `
                <div>
                    <h1>${machineName}</h1>
                    <div>
                        <p>${machineDescription}</p>
                        <p>Machine type: <b>${machineType}</b></p>
                    </div>
                </div>
            `;

            // Geocode and add marker
            geocodeLatLng(geocoder, map, infoWindow, contentString, latlngStr);
        });
    }
}

// Function to geocode coordinates and place marker on the map
async function geocodeLatLng(geocoder, map, infoWindow, contentString, latlngStr) {
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

        // Add content to the info window
        google.maps.event.addListener(marker, 'click', () => {
            infoWindow.setContent(contentString);
            infoWindow.open(map, marker);
        });

        // Save the new marker data
        const newMarkerData = {
            position: {
                lat: marker.getPosition().lat(),
                lng: marker.getPosition().lng(),
            },
            icon: 'images/vending_clipart.png',
            contentString, // Save the HTML content for the infoWindow
        };

        // Add to markers array
        markers.push(newMarkerData);

        // Save the updated markers array to localStorage
        saveMarkersToStorage();

    } catch (e) {
        window.alert(`Geocoder failed due to: ${e}`);
    }
}

// Load markers from localStorage and place them on the map
function loadMarkersFromStorage(map, infoWindow) {
    const storedMarkers = JSON.parse(localStorage.getItem('markers')) || [];

    storedMarkers.forEach(markerData => {
        const marker = new google.maps.Marker({
            position: markerData.position,
            map: map,
            icon: {
                url: markerData.icon || 'images/vending_clipart.png',
                scaledSize: new google.maps.Size(25, 25),
            },
        });

        google.maps.event.addListener(marker, 'click', () => {
            infoWindow.setContent(markerData.contentString);
            infoWindow.open(map, marker);
        });

        // Add marker to the markers array
        markers.push(markerData);
    });
}

// Save the markers array to localStorage
function saveMarkersToStorage() {
    // Save markers as plain objects (without methods)
    const markersToSave = markers.map(marker => ({
        position: {
            lat: marker.position.lat,
            lng: marker.position.lng,
        },
        icon: marker.icon,
        contentString: marker.contentString,
    }));

    localStorage.setItem('markers', JSON.stringify(markersToSave));
}

// Initialize the map when the page loads
window.initMap = initMap;
loadMarkersFromStorage(map, infoWindow);
