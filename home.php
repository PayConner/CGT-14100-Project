<?php
include('header.php');
?>

        <div class="content">
            <!--Map/Home screen-->
            <div class="google-map">
                <gmp-map center="40.424, -86.921" zoom="15" map-id="map" style=" margins:auto; width: 50%; ;border: solid 5px #cccccc;">
                </gmp-map>
            </div>

            <div class="interaction">
                <p id="content-label">Search the Vending Network</p>

                <div class="search-bar">
                    <label for="search-bar">
                        <input id="search" name="search-bar" type="text" placeholder="Search by name..."/>
                    </label>
                    <input id="search" type="button" class="btn-search" value="Search"/>
                </div>

                <div class="machine-type-dropdown">
                    <label for="machine-type">
                        Select a machine type:
                        <select name="machine-type" id="machine-type">
                            <option value="snacks">Snacks</option>
                            <option value="drinks">Drinks</option>
                            <option value="pharmacy">Pharmacy</option>
                        </select>
                    </label>
                </div>

                <div class="add-button">
                    <a id="add-button" href="addmachine.php" class="btn btn-primary">Add a Vending Machine</a>
                </div>
                <div class="add-button">
                  <a id="add-button" href="addmachine.php" class="btn btn-primary">Review a Vending Machine</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MuQAvsFqfGdHorn9lFD18tgf3CM_LFI&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2" defer></script>
</body>
</html>