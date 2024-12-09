<?php
include('header.php');
?>

        <div class="content">
            <!--Map/Home screen-->
            <div class="map-container">
              <gmp-map center="40.424, -86.921" zoom="15" map-id="map" style="border: solid 5px #cccccc;">
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
                <?php
              if(isset($_SESSION["useruid"])){
                echo "<div class='add-button'>";
                echo "<a id='add-button' href='addmachine.php' class='btn btn-primary add-button'>Add a Vending Machine</a>";
                echo "<a id='add-button' href='reviewmachine.php' class='btn btn-primary add-button'>Review a Vending Machine</a>";
                echo "</div>";
              }
              else{
                echo "<p class='alert alert-primary' role='alert'>Please log in to Review or add new vending machines</p>";
              }
              ?>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MuQAvsFqfGdHorn9lFD18tgf3CM_LFI&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2" defer></script>
</body>
</html>