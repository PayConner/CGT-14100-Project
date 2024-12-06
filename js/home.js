async function initMap() {
    const map = document.querySelector('gmp-map').innerMap;
    const infoWindow = new google.maps.InfoWindow();

    // Load existing markers
    loadMarkersFromStorage(map, infoWindow);
}

window.initMap = initMap;