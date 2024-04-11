<?php
session_start();
$for_p_session = $_SESSION['p_UserName'];
if($for_p_session == true)
{ }
else
{
header ('location:plogin.php');
}
?>
<?php


?>

<!-- for booking -->
<?php
include 'connection.php';
$app_data = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session' ";
$result_app = mysqli_query($connection , $app_data);
$connection -> close();
?>

<?php
//  include "connection.php";
 
//  $sql = "SELECT * FROM `p_register` WHERE `p_UserName` = '$for_p_session'";
//  $result = mysqli_query($connection, $sql);
//  if ($result && mysqli_num_rows($result) > 0) {
//      $p_row = mysqli_fetch_assoc($result);
//  } else {
//      echo "";
//  }
//  $connection->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
    
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary-subtle     border-bottom sticky-top ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Hello <?php echo " : " .$for_p_session ?></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center  " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1 ">
        <li class="nav-item">
          <a class="nav-link " href="p_dashborad.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pshowdoc.php">Doctor's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_prescription.php">My Prescripton</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="p_my_appointment.php">My Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_report.php">Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_bill.php">Bills</a>
        </li>
        
        
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
     
      
        <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
      
    </div>
  </div>
</nav>
<div class="container-fluid  " id="main">

<div class="row mt-3 row-cols-lg-3   justify-content-evenly">
<?php
        // if ($result_app && mysqli_num_rows($result_app) > 0) {
            while ($app_row = mysqli_fetch_assoc($result_app)) {
                ?>

<div class="card p-2 m-2 " style="width: 24rem;">
  <img src="images\13.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo" Date : ". $app_row ['app_date']?>  </h5>
    <h5 class="card-title"><?php echo" Time : ". $app_row ['app_time'] ?> </h5>

    <p class="card-text">Your appointment with Doctor <?php echo" : ".$app_row ['app_d_name'] ?></p>
    <div class="row">
        <div class="col-6">
          <form action="app_edit.php" method="post">
            <button class="btn btn-primary w-100 " name="app_edit" 
            value="<?php echo $app_row ['app_ID'] ?>">EDIT</button>
            </form>
          </div>
                <div class="col-6">
                <form action="p_app_del.php" method="post">
    <button class="btn btn-primary w-100" name="app_delete" 
    value="<?php echo $app_row['app_ID']; ?>" 
    onclick="return confirm('Are you sure you want to Cancel this appointment?');">CANCEL</button>
</form>

    </div>
    </div>
  </div>
</div>
<?php
            }
       
        ?>




</div>



</div>
    <script src="bs-5/bootstrap.bundle.min.js"></script>
    <!-- <script src="bs-5/bootstrap.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>