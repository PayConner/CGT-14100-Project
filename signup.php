<?php
include('header.php');
?>
    <div class="container d-flex align-items-start justify-content-center min-vh-50 min-vw-100 mt-5">
        <div class="bg-white p-4 shadow-lg rounded-3" style="max-width: 400px;">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form action="includes/signup.inc.php" method="post">
            <div class="mt-2">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mt-2">
                    <label for="user-name" class="form-label">User name</label>
                    <input type="text" class="form-control" name="uid" required>
                </div>
                <div class="mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pwd" required>
                </div>
                <div class="mb-3"> 
                    <button type="submit" name ="submit" class="form-control" id="submit" required>Sign Up</button>
                </div>
            </form>
            <?php
          if(isset($_GET["error"])){
            if($_GET["error"] == "stmtfailed"){
              echo "<p class='alert alert-primary' role='alert'>Something when wrong, try again!</p>";
            } else if($_GET["error"] == "usernametaken"){
              echo "<p class='alert alert-primary' role='alert'>Username already taken!</p>";
            } else if($_GET["error"] == "none"){
              echo "<p class='alert alert-primary' role='alert'>You have signed up!</p>";
            }
          }

          ?>
        </div>


    </div>



</body>
</html>