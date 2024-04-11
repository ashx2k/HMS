<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
  <link  href="bs-5/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 40px;
    }
    @media (min-width: 992px) {
    .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute;
        left: -70%;
    }
}
@media (min-width: 350px) {
    .navbar-expand-lg .navbar-nav .dropdown-menu{
      min-width: 100%;
    }
}
@media (min-width: 992px) {
    .dropdown-menu{
      min-width: 9rem;
    }
}

@media (min-width: 350px) {
    .dropdown-menu{
        text-align: center;
    }
}
.form-group{
    margin-bottom: 1rem;
}
label {

    margin-bottom: .5rem;
}

  </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-0 px-0 fixed-top p-0">
            <a class="navbar-brand ms-3 text-center" href="index.html"><h4 class="m-0">HMS</h4></a>
            <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3 me-5 mx-0" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emergency.php">EMERGENCY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="admin.php">Admin Login</a></li>
                            <li><a class="dropdown-item" href="dlogin.php">Doctor Login</a></li>
                            <li><a class="dropdown-item" href="plogin.php">Patient Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="position-absolute overflow-y-hidden " style="width: 100%; height: 100svh; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/bacg1.jpeg'); background-size: cover; background-position: center; position: fixed;">
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto ">

    <?php if (!empty($_SESSION['pmsg'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show text-center  fs-5 m-0 " role="alert" style="position: absolute; top: 40px; left: 50%; transform: translateX(-50%); width: 400px;" >
            <strong class="texy-dark"><?php echo $_SESSION['pmsg']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['pmsg']); ?>
      <?php endif; ?>

      <div class="login-container">
        <h2 class="text-center mb-4">Patient Login</h2>
        <form action="p_login_auth.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="p_username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="p_password">
          </div>
          <button type="submit" name="p_login" class="btn btn-primary w-100">Login</button>

        </form>
        <div class="text-center mt-3">
          <a href="#">Forgot password?</a>
        </div>
        <div class="text-center mt-3">
          <p>Don't have an account? <a href="pregistration.html">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Bootstrap JS -->
<script src="bs-5/bootstrap.bundle.min.js"></script>

</body>
</html>