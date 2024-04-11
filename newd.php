
<?php
session_start()
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="css/p.css" /> -->
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">
    


    <title>Patient Login</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mx-0 px-0 fixed-top p-0">
        <div class="container-fluid mx-0 px-0">
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
        </div>
    </nav>
    <div class="position-absolute" style="width: 100%; height: 100vh; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/bacg1.jpeg'); background-size: cover; background-position: center; position: fixed;">
    <?php if (!empty($_SESSION['pmsg'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show  text-center fw-bolder fs-4 " role="alert" style="position: absolute; top: 40px; left: 50%; transform: translateX(-50%);">
                <strong><?php echo $_SESSION['pmsg']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['pmsg']); ?>
        <?php endif; ?>
    

            <div class=" mx-auto position-absolute top-50 start-50 translate-middle doc text-center ">
        <h1>Patient Login</h1>
        
        <form action="p_login_auth.php" method="post">

        <input  class="form-control p-2 mx-auto  mt-4 " type="text" placeholder="Enter UserName" name="p_username"/>
        <input  class="form-control p-2 mx-auto  mt-3 mb-2 " type="password" placeholder="Enter password" name="p_password"/>
        
        <button name="p_login" class="mx-auto " id="log">Login</button>
        </form>
        <p class="p-1">Forget password ?</p>
        <p>
          Not Registered? <span><a href="pregistration.html"> Sign Up</a></span>
        </p>
        <p>
          Not a Patient? <span><a href="index.html"> GO Back</a></span>
        </p>
      </div>
    </div>
    </div>

    <script src="bs-5/bootstrap.bundle.min.js"></script>

  </body>
</html>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/p.css" />

    <title>Patient Login</title>
  </head>
  <body>
    <div class="logo">
      <a href="index.html"> <img src="images/logo.png" alt="" /></a>
    </div>
    <?php if (!empty($_SESSION['pmsg'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert" style="position: absolute; top: 40px; left: 50%; transform: translateX(-50%);">
                <strong><?php echo $_SESSION['pmsg']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['pmsg']); ?>
        <?php endif; ?>
    <div class="contain">
      <div class="text">
        <h1>Patient Login</h1>
        <form action="p_login_auth.php" method="post">

        <input class="inp1" type="text" placeholder="Enter UserName" name="p_username"/>
        <input class="inp2" type="password" placeholder="Enter password" name="p_password"/>
        <p>Forget password ?</p>
        <button name="p_login">Login</button>
        </form>
        <p>
          Not Registered? <span><a href="pregistration.html"> Sign Up</a></span>
        </p>
        <p>
          Not a Patient? <span><a href="index.html"> GO Back</a></span>
        </p>
      </div>
    </div>
  </body>
</html>