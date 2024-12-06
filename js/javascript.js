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
    initHardCodedMarkers();

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

function initHardCodedMarkers() {
    let walcMachine = new google.maps.Marker({
        position: {
            lat: 40.428082,
            lng: -86.913757,
        },
        map: map,
        icon: {
            url: 'images/vending_clipart.png',
            scaledSize: new google.maps.Size(25, 25),
        },
    });

    let walcContent = `
                <div>
                    <h1>WALC Snack Vending Machine</h1>
                    <div>
                        <p>Snack vending machine in the Purdue Wilmeth Active Learning Center.</p>
                        <p>Machine type: <b>Snacks</b></p>
                    </div>
                </div>`;

    google.maps.event.addListener(walcMachine, 'click', () => {
        infoWindow.setContent(walcContent);
        infoWindow.open(map, walcMachine);
    });

    let corecMachine = new google.maps.Marker({
        position: {
            lat: 40.428329,
            lng: -86.922423,
        },
        map: map,
        icon: {
            url: 'images/vending_clipart.png',
            scaledSize: new google.maps.Size(25, 25),
        },
    });

    let corecContent = `
                <div>
                    <h1>Co-Rec Drink Vending Machine</h1>
                    <div>
                        <p>Sports drink vending machine in the France A. Cordova Recreational Center.</p>
                        <p>Machine type: <b>Drinks</b></p>
                    </div>
                </div>`;

    google.maps.event.addListener(corecMachine, 'click', () => {
        infoWindow.setContent(corecContent);
        infoWindow.open(map, corecMachine);
    });

    let fordMachine = new google.maps.Marker({
        position: {
            lat: 40.432209,
            lng: -86.919563,
        },
        map: map,
        icon: {
            url: 'images/vending_clipart.png',
            scaledSize: new google.maps.Size(25, 25),
        },
    });

    let fordContent = `
                <div>
                    <h1>Ford Dining Hall Pharmacy Vending Machine</h1>
                    <div>
                        <p>Pharmacy vending machine in the lobby of the Ford Dining Hall.</p>
                        <p>Machine type: <b>Pharmacy</b></p>
                    </div>
                </div>`;
    
    google.maps.event.addListener(fordMachine, 'click', () => {
        infoWindow.setContent(fordContent);
        infoWindow.open(map, fordMachine);
    });

    let lwsnMachine = new google.maps.Marker({
        position: {
            lat: 40.427782,
            lng: -86.917122,
        },
        map: map,
        icon: {
            url: 'images/vending_clipart.png',
            scaledSize: new google.maps.Size(25, 25),
        },
    });

    let lswnContent = `
                <div>
                    <h1>Lawson Basement Vending Machine</h1>
                    <div>
                        <p>Drink vending machine in the basement of the Lawson Computer Science building.</p>
                        <p>Machine type: <b>Drinks</b></p>
                    </div>
                </div>`;

    google.maps.event.addListener(lwsnMachine, 'click', () => {
        infoWindow.setContent(lswnContent);
        infoWindow.open(map, lwsnMachine);
    });
}

// Initialize the map when the page loads
window.initMap = initMap;