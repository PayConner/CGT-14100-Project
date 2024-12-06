async function initMap() {
    const map = document.querySelector('gmp-map').innerMap;
    const infoWindow = new google.maps.InfoWindow();

    initHardCodedMarkers();

    // Load existing markers
    loadMarkersFromStorage(map, infoWindow);
}

window.initMap = initMap;

function initHardCodedMarkers() {
    const walcString = `
    <div>
      <h1>WALC Snack Vending Machine</h1>
      <div>
        <p>
          
        </p>
        <p>
          Machine type: <b>Snacks<b>
        </p>
      </div>
    </div>`;
    const infoWindow = new google.maps.InfoWindow({
        content: walcString,
        icon: marker.icon,
    });

    const marker = document.querySelector('gmp-advanced-marker');
    marker.addEventListener('gmp-click', () => {
        infoWindow.open({ anchor: marker });
    });
}