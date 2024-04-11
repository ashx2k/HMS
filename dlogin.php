<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS</title>
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <style>
        .doc {
    transition: width 0.6s ease-in-out;
}
@media (min-width: 1040px) and (max-width: 4000px){
    .doc  {
        width: 23%;
       
    }
}
    @media (min-width: 992px) and (max-width: 1040px){
    .doc  {
        width: 30%;
       
    }
}
@media (min-width: 768px)and (max-width: 991px) {
    .doc  {
        width: 45%;
       
    }
}
@media (min-width: 576px) and (max-width: 767px) {
    .doc  {
        width: 75%;
       
    }
}
@media (min-width: 0px) and (max-width: 575px) {
    .doc  {
        width: 96%;
       
    }
}
.doc
{
    background-color: rgba(255, 255, 255, 0.8);
    /* background-color: rgba(21, 21, 21, 1); */
    padding: .375rem .75rem;
    box-sizing: border-box;
    border-radius: 5px;
}@media (min-width: 992px) {
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

    </style>
    
</head>
<body class="overflow-hidden">
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
        <?php if (!empty($_SESSION['msg'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert" style="position: absolute; top: 40px; left: 50%; transform: translateX(-50%);">
                <strong><?php echo $_SESSION['msg']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>
        <!-- <div class="position-absolute top-50 start-50 translate-middle "> -->
            <div class=" mx-auto position-absolute top-50 start-50 translate-middle doc ">
                <h1 class="text-center p-3 fw-bold  ">Doctor Login</h1>
                <form action="d_log_auth.php" method="post">
                    <div class="mb-3 outline-danger ">
                        <input type="text" class="form-control" placeholder="Enter Username" name="doc_username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Enter Password" name="doc_password">
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary fw-bold fs-5 w-100" name="login_doctor">Login</button>
                </form>
                <p class="text-center pt-1 "><a href="#">Forget password?</a></p>
                <p class="text-center">Doctor Register <a href="doc_register.php">Sign Up</a></p>
                <p class="text-center">Not a Doctor? <a href="index.html">Go Back</a></p>
            </div>
        <!-- </div> -->
    </div>
    <script src="bs-5/bootstrap.bundle.min.js"></script>
</body>
</html>