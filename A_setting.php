<?php
session_start();
$for_admin_sesson = $_SESSION['UserName'];
if ($for_admin_sesson == true) {
} else {
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="g.css">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-1">

    <nav class="d-flex justify-content-between align-items-center nav ">
      <h2>Dashboard</h2>
      <div class="d-flex align-content-center ">
        <h6 class="text-center pe-3 align-content-center m-0 ">WELCOME :
          <?php echo ' ' . $for_admin_sesson ?>
        </h6>
      </div>
    </nav>
        <div class="sidebar">
            <div class="brand-name">
              
                <h1>HOSPITAL</h1>
             </div>
             <ul>
                <li><a href="A_Patients.php"><i class="bi bi-person"></i>&nbsp;&nbsp;Patients</a></li>
                <li><a href="A_appointments.php"><i class="bi bi-journal"></i>&nbsp;&nbsp;Appoinments</a></li>
                <li><a href="A_Staff.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Staff</a></li>
                <li><a href="A_Payments.php"><i class="bi bi-journal-plus"></i>&nbsp;&nbsp;Paytments</a></li>
                <li><a href="A_setting.php"><i class="bi bi-gear"></i>&nbsp;&nbsp;Setting</a></li>
                <li><a href="Logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
             </ul>
        </div>


        <div class="main">

         <div class="container-fluid p-0 m-0 ">

         <div class="container mt-5 bg-info-subtle " style="width: 600px;">
  <div class="row">
    <div class="col">
      <button class="btn btn-primary" onclick="toggleChangePassword()">Password Setting</button>
    </div>
  </div>
  <div class="row mt-3" id="changePasswordForm">
    <div class="col">

      <form action="A_change.php" method="post">
        
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