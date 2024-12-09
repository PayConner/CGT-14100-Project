<?php
include('header.php');
?>

        <div class="content">
            <!--Map/Home screen-->
            <div class="google-map">
                <gmp-map center="40.424, -86.921" zoom="15" map-id="example-map" style=" margins:auto; width: 50%; ;border: solid 5px #cccccc;">
                    <gmp-advanced-marker position="40.424, -86.921" title="Example" gmp-clickable>
                        <img class="vending-icon" src="images/vending_clipart.png" />
                    </gmp-advanced-marker>

                </gmp-map>
            </div>

            <div class="interaction">
                <p id="content-label">Placeholder Machine Name</p>
                <p id="content-label" class="text-muted"><small>Placeholder Description</small></p>

                <div class="review">
                    <label for="review">
                        Review:
                        <textarea class="form-control" id="review" rows="4" placeholder="Please enter review here"></textarea>
                    </label>
                </div>

                <div class="star-rating">
                    <i class="bi bi-star" num=1></i>
                    <i class="bi bi-star" num=2></i>
                    <i class="bi bi-star" num=3></i>
                    <i class="bi bi-star" num=4></i>
                    <i class="bi bi-star" num=5></i>
                </div>

                <div class="submit">
                    <input id="submit" type="button" class="btn btn-primary" value="Submit Review" onclick="submitScore()"/>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.star-rating .bi-star').forEach(star => {
        star.addEventListener('click', function() {
            score = this.getAttribute('num');
            updateScore(score);
        });
    });

    function updateScore(score) {
        let stars = document.querySelectorAll('.star-rating .bi-star, .star-rating .bi-star-fill');
            
        for (let i = 0; i < score; i++) {
            stars[i].classList.remove('bi-star');
            stars[i].classList.add('bi-star-fill');
        }
        for (let i = score; i < stars.length; i++) {
            stars[i].classList.remove('bi-star-fill');
            stars[i].classList.add('bi-star');
        }
    }

    function submitScore() {
        let score = document.querySelectorAll('.star-rating .bi-star-fill').length;
        // TODO add to database
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MuQAvsFqfGdHorn9lFD18tgf3CM_LFI&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2" defer></script>
</body>
</html>