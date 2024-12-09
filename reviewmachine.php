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


                <div class="review">
                    <label for="review">
                        Name of Machine:
                        <textarea class="form-control" id="review" rows="4" placeholder="Please enter vending maching name here"></textarea>
                    </label>
                </div>

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
                    <input id="submit" type="button" class="btn btn-primary" value="Submit Review" onclick="window.location.reload();"/>
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