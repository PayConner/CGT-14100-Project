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

                <div class="name">
                    <label for="machine-name">
                        <input name="machine-name" id="machine-name" type="text" placeholder="Machine Name" />
                    </label>
                </div>

                <div class="description">
                    <label for="machine-description">
                        <input name="machine-description" id="machine-description" type="text" placeholder="Description" />
                    </label>
                </div>

                <div class="new-machine-type-dropdown">
                    <label for="new-machine-type">
                        Select the machine's type:
                        <select name="new-machine-type" id="machine-type">
                            <option value="Snacks">Snacks</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Pharmacy">Pharmacy</option>
                        </select>
                    </label>
                </div>

                <div class="coordinates">
                    <label for="latlng">
                        New machine's coordinates:
                        <input id="latlng" name="coordinates" placeholder="10.0000,10.0000"/>
                    </label>
                </div>

                <div class="submit">
                    <input id="submit" type="submit" class="btn btn-primary" value="Add to Network" />
                </div>

            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MuQAvsFqfGdHorn9lFD18tgf3CM_LFI&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2" defer></script>
</body>
</html>