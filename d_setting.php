<?php 
session_start();

$for_doc_session = $_SESSION['username'];
if($for_doc_session == true)
{ }
else
{
header ('location:dlogin.php');
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Docter dashboard</title>
  <link rel="stylesheet" href="bs-5/bootstrap.min.css">
  <style>
    /* Hide the change password form initially */
    #changePasswordForm {
      display: none;
    }
  </style>
</head>


<body class="image">
 <div class="container-fluid p-0  img-fluid  sticky-top  ">
  <!-- <img src="images/12.jpeg" alt="" class="position-absolute w-100 h-auto "> -->
  <nav class="navbar navbar-expand-md navbar-light bg-dark-subtle shadow-lg position-relative ">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="#">Doctor :<?php echo"".$for_doc_session ?></a>

  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hide"
                aria-controls="hide" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fw-bold " id="hide">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="d_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_paitent.php">Paitent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="d_setting.php">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ext</a>
                </li>
            </ul>
            

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" class="ps-3 pe-3 btn btn-info  " href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 </div>

 <div class="container-fluid m-0  " >

<div class="container d-flex justify-content-center bg-info-subtle">
<h1 >Account Settings</h1>
</div>

<div class="container mt-5" style="width: 600px;">
  <div class="row">
    <div class="col">
      <button class="btn btn-primary" onclick="toggleChangePassword()">Password Setting</button>
    </div>
  </div>
  <div class="row mt-3" id="changePasswordForm">
    <div class="col">

      <form action="d_change.php" method="post">
        
        <div class="form-group m-2 ">
          <label for="currentPassword" class="pb-1 fs-6 ">Current Password:</label>
          <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group m-2 ">
          <label for="newPassword" class="pb-1 fs-6 ">New Password:</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group m-2 ">
          <label for="confirmNewPassword" class="pb-1 fs-6 ">Confirm New Password:</label>
          <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
        </div>
        <div class=" pt-4 p-2  d-flex justify-content-center ">  
            <button type="submit" class="btn btn-primary w-75 "> Change Password </button>
        </div>
       
      </form>
      
    </div>
  </div>
</div>










 </div>

















 <script src="bs-5/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


 <script>
// Function to toggle the visibility of the change password form
function toggleChangePassword() {
  var changePasswordForm = document.getElementById("changePasswordForm");
  if (changePasswordForm.style.display === "none") {
    changePasswordForm.style.display = "block";
  } else {
    changePasswordForm.style.display = "none";
  }
}

// Hide the change password form by default
document.addEventListener("DOMContentLoaded", function() {
  var changePasswordForm = document.getElementById("changePasswordForm");
  changePasswordForm.style.display = "none";
});
</script>
</body>

</html>