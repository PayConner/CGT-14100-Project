<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending Network</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/master.css">
    <script src="js/javascript.js"></script>
    <script>loadMarkersFromStorage(map, infoWindow);</script>
</head>
<body>
    <div id="container">

        <!-- Navbar Bootstrap -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Vending Network</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <?php
              if(isset($_SESSION["useruid"])){
                echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout</a></li>";
              }
              else{
                echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='signup.php'>Sign Up</a></li>";
              }
              ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="aboutus.php">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>