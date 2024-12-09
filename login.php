<?php
include('header.php');
?>
    <div class="container d-flex align-items-start justify-content-center min-vh-50 min-vw-100 mt-5">
        <div class="bg-white p-4 shadow-lg rounded-3" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form action="includes/login.inc.php" method="post">
                <div class="mt-2">
                    <label for="user-name" class="form-label">User name</label>
                    <input type="user-name" class="form-control" name="uid" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pwd" required>
                </div>
                <div class="mb-3">
                <button type="submit" name ="submit" class="form-control" id="submit" required>Log In</button>
                </div>
            </form>
            <?php
            if(isset($_GET["error"])){
            if($_GET["error"] == "stmtfailed"){
              echo "<p class='alert alert-primary' role='alert'>Something when wrong, try again!</p>";
            } else if($_GET["error"] == "wronglogin"){
              echo "<p class='alert alert-primary' role='alert'>Incorrect Username or Password</p>";
          }
        }

          ?>
        </div>
    </div>

</body>
</html>