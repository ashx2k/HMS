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
          <a class="nav-link active"  href="p_dashborad.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pshowdoc.php">Doctor's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="my_prescription.php">My Prescripton</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_my_appointment.php">My Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_report.php">Reports</a>
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

<div class="container-fluid main">
<div class="d-flex justify-content-center align-items-center h-auto m-0 ">
       <h1 class="bg-primary-subtle  text-center rounded-4 rounded-top-0 border-0  w-75 ">Prescription</h1> 
       </div>
<div class="container-fluid position-relative  mt-1 mb-5 ">
  
<div class="w-100 d-flex justify-content-evenly  align-content-center  row row-cols-3 ">

<?php
include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app_data_id = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data_id);
$app_row = mysqli_fetch_assoc($result_app);

$is_first_entry = true; // Variable to track if it's the first entry

if ($app_row) {
    $app_id = $app_row['app_ID']; 
    $prescription_query = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
    $result_prescription = mysqli_query($connection, $prescription_query);

    if ($result_prescription && mysqli_num_rows($result_prescription) > 0) {
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
?>
<div class="card shadow m-1 " style="width: 30rem;">
  <div class="card-body">
   
        <h5 class="card-title text-center fs-2"></h5>
        <p class="card-text fs-4">Prescription by Dr <?php echo $prescription_row['app_d_id']; ?></p>
        <p class="card-text fs-5">Appointment ID: <?php echo $prescription_row['app_id']; ?></p>
        
  </div>
  <ul class="list-group list-group-flush " style="background-color: #f8f9fa;">
    <li class="list-group-item row d-flex  m-0" style="background-color: #f8f9fa;"><div class="col-3  p-0   ">Medicine <span class=" float-end ">:</span></div> <div class="col-9  "><?php  echo $prescription_row['medicine_name']; ?> </div> </li>
    <li class="list-group-item row d-flex  m-0" style="background-color: #f8f9fa;"><div class="col-3  p-0  ">Dosage<span class=" float-end ">:</span></div> <div class="col-6  "><?php  echo $prescription_row['dosage']; ?> </div></li>
    <li class="list-group-item row d-flex m-0" style="background-color: #f8f9fa;"><div class="col-3  p-0  ">Timings<span class=" float-end ">:</span></div> 
    <div class="col-9"> 
      <?php echo $prescription_row['morning'] ? 'Morning ' : ''; ?>
      <?php echo $prescription_row['afternoon'] ? 'Afternoon ' : ''; ?>
      <?php echo $prescription_row['evening'] ? 'Evening ' : ''; ?>
      <?php echo $prescription_row['night'] ? 'Night ' : ''; ?>
     </div> 
    </li>
    <li class="list-group-item row d-flex m-0" style="background-color: #f8f9fa;"><div class="col-3  p-0  ">Days<span class=" float-end ">:</span></div> <div class="col-6  "><?php  echo $prescription_row['days']; ?> </div></li>
    <li class="list-group-item row d-flex m-0" style="background-color: #f8f9fa;"><div class="col-3  p-0  ">Note<span class=" float-end ">:</span></div> <div class="col-6  "><?php  echo $prescription_row['note']; ?> </div></li>
  </ul>
  <div class="card-body justify-content-center d-flex ">
    <a href="#" class="card-link btn btn-primary w-75  fs-5 fw-bold ">Feedback</a>
   
  </div>
</div>
<?php
        }
    } else {
        echo "No prescription found.";
    }
} else {
    echo "No appointment found for the patient.";
}
?>






</div>

   
    </div>




</div>

    <script src="bs-5/bootstrap.bundle.min.js"></script>
    <!-- <script src="bs-5/bootstrap.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
