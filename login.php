﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/master.css">
    <script src="js/javascript.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">Vending Network</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="aboutus.html">About Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="container d-flex align-items-start justify-content-center min-vh-50 min-vw-100 mt-5">
        <div class="bg-white p-4 shadow-lg rounded-3" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form action="includes/login.inc.php" method="post">
                <div class="mt-2">
                    <label for="user-name" class="form-label">User name</label>
                    <input type="user-name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                <button type="submit" name ="submit" class="form-control" id="submit" required>Log In</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>