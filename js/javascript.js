async function initMap() {
    const contentString = `
          <div>
            <h1>Example Vending Machine</h1>
            <div>
              <p>
                This is an example Vending Machine.
              </p>
            </div>
          </div>`;

    const infoWindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "",
    });

    const marker = document.querySelector('gmp-advanced-marker');
    marker.addEventListener('gmp-click', () => {
        infoWindow.open({anchor: marker});
    });
}

window.initMap = initMap;