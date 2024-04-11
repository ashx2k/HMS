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

<?php
include "connection.php";

$sql1 = "SELECT * FROM `d_register` WHERE `username`='$for_doc_session' ";
$d_data = mysqli_query($connection, $sql1);
if($d_data && mysqli_num_rows($d_data) > 0) {
    $d_row=mysqli_fetch_assoc($d_data);
    // echo "hello " . $d_row['UserName'];   
 } else {
  echo "No results found or query failed.";
}
 $connection->close();
?>

<?php
// include "connection.php";

// $sql2 = "SELECT * FROM `appointment_booking_update` WHERE `app_d_id`='$d_row[ID]' ";
// $app_data = mysqli_query($connection, $sql2);
// if($app_data && mysqli_num_rows($app_data) > 0) {
//     $app_row=mysqli_fetch_assoc($app_data);
//     echo "<script>
//   window.alert(YOU HAVE APPOINTMENT);
//   </script> ";
    
//  } else {
//   echo "<script>
//   window.alert(YOU HAVE NO APPOINTMENT);
//   </script> ";
// }

//  $connection->close();
?>





<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Docter dashboard</title>
  <link rel="stylesheet" href="bs-5/bootstrap.min.css">
</head>

<body class="image">

 <div class="container-fluid p-0  img-fluid sticky-top ">
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
                    <a class="nav-link active" aria-current="page" href="d_appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_setting.php">Setting</a>
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

 <div class="container-fluid main ">
<div class="container-fluid d-flex justify-content-evenly  align-content-center row row-cols-lg-3 row-cols-md-3 row-cols-md-1  m-0 p-0   ">

<?php
include "connection.php";

$sql2 = "SELECT * FROM `appointment_booking_update` WHERE `app_d_id`='$d_row[ID]' ";
$app_data = mysqli_query($connection, $sql2);
if($app_data && mysqli_num_rows($app_data) > 0) {
    echo "<script>
    window.alert('YOU HAVE AN APPOINTMENT');
    </script>";
    
    while ($app_row=mysqli_fetch_assoc($app_data)) {
?>
<div class="card p-2 m-3 " style="width: 22rem;">
    <img src="images\card2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title mb-3 ">Patient Name : <?php echo $app_row['app_p_real_name'] ?></h5>
        <p class="card-text mb-1 ">Appointment date : <?php echo $app_row['app_date'] ?></p>
        <p class="card-text  mb-1 ">Appointment date : <?php echo $app_row['app_time'] ?></p>
        <p class="card-text  mb-1 ">etc : <?php echo $app_row['app_time'] ?></p>
        <form action="d_prescription.php" method="post">
    <input type="hidden" name="app_id" value="<?php echo $app_row['app_ID'] ?>">
    <input type="hidden" name="app_d_id" value="<?php echo $app_row['app_d_id'] ?>">
    <input type="hidden" name="app_p_name" value="<?php echo $app_row['app_p_name'] ?>">
    <input type="hidden" name="charge" value="<?php echo $app_row['charges'] ?>">
    <div class="align-content-center d-flex justify-content-center mt-3">
    <button type="submit" name="prescription" class="btn btn-primary w-75">Write Prescription</button>
    </div>
</form>
</div>
</div>
<?php
    }
} else {
    echo "<script>
    window.alert('YOU HAVE NO APPOINTMENT TODAY');
    </script>";
}
$connection->close();
?>
 













 </div>

 <!-- <script src="bs-5/bootstrap.min.js"></script> -->

</body>

</html>

<!-- <p id="demo"></p> -->
<!-- <script> window.alert( <div class="alert alert-info">You have an appointment!</div>);
</script> -->

