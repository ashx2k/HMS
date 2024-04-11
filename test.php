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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .image {
            background-image: url('images/12.jpeg');
            background-size: cover;
            background-position: center;
        }

        .navbar-brand {
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .main {
            padding: 20px;
        }
    </style>
</head>

<body class="image">

    <nav class="navbar navbar-expand-md navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">Doctor: <?php echo $for_doc_session ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-bold" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="d_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="d_appointment.php">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" href="logout.php"
                            onclick="return confirm('Are you sure you want to logout?');">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid main">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Notifications</h5>
                        <p class="card-text">You have <span class="badge bg-primary">3</span> new appointments.</p>
                        <a href="#" class="btn btn-primary">View Notifications</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Appointments</h5>
                        <p class="card-text">Here you can manage your appointments.</p>
                        <a href="d_appointment.php" class="btn btn-primary">View Appointments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    <h1>Welcome to Your Patient Dashboard</h1>
    
    <div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="assess_situation_image.jpg" class="card-img-top" alt="Assess the Situation">
        <div class="card-body">
          <h5 class="card-title">Assess the Situation</h5>
          <p class="card-text">Ensure the area is safe. Move the person to safety if necessary.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="check_responsiveness_image.jpg" class="card-img-top" alt="Check for Responsiveness">
        <div class="card-body">
          <h5 class="card-title">Check for Responsiveness</h5>
          <p class="card-text">Gently shake shoulders and ask if they're okay.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="abcs_image.jpg" class="card-img-top" alt="ABCs: Airway, Breathing, Circulation">
        <div class="card-body">
          <h5 class="card-title">ABCs: Airway, Breathing, Circulation</h5>
          <p class="card-text">Check airway, breathing, and circulation.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="control_bleeding_image.jpg" class="card-img-top" alt="Control Bleeding">
        <div class="card-body">
          <h5 class="card-title">Control Bleeding</h5>
          <p class="card-text">Apply direct pressure to the wound.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="immobilize_injuries_image.jpg" class="card-img-top" alt="Immobilize Injuries">
        <div class="card-body">
          <h5 class="card-title">Immobilize Injuries</h5>
          <p class="card-text">Do not move unless necessary.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="manage_shock_image.jpg" class="card-img-top" alt="Manage Shock">
        <div class="card-body">
          <h5 class="card-title">Manage Shock</h5>
          <p class="card-text">Keep them lying down and warm.</p>
        </div>
      </div>
    </div>
  </div>
</div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>




<?php
include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app_data_id = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data_id);
$app_row = mysqli_fetch_assoc($result_app);

if ($app_row) {
    $app_id = $app_row['app_ID']; 
    $prescription_query = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
    $result_prescription = mysqli_query($connection, $prescription_query);

    if ($result_prescription && mysqli_num_rows($result_prescription) > 0) {
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
         ?>

<div class="card" style="width: 30rem;">
  <img src="" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> Your Prescription by Dr <?php  echo $prescription_row['app_d_id']; ?></h5>
    <p class="card-text"> <?php  echo $prescription_row['app_id']; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Medicine :      <?php  echo $prescription_row['medicine_name']; ?></li>
    <li class="list-group-item">Dosage  :   <?php echo $prescription_row['dosage']; ?></li>
    <li class="list-group-item">Timings :    <?php echo $prescription_row['morning'];  ?> <?php echo' '. $prescription_row['afternoon'];  ?><?php echo' '. $prescription_row['evening'];  ?><?php echo' '. $prescription_row['night'];  ?></li>
    <li class="list-group-item">Days  :   <?php echo $prescription_row['days']; ?></li>
    <li class="list-group-item">Note  :   <?php echo $prescription_row['dosage']; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
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





<?php
include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app_data_id = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data_id);
$app_row = mysqli_fetch_assoc($result_app);

if ($app_row) {
    $app_id = $app_row['app_ID']; 
    $prescription_query = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
    $result_prescription = mysqli_query($connection, $prescription_query);

    if ($result_prescription && mysqli_num_rows($result_prescription) > 0) {
        // Initialize variables to store prescription details
        $medicine_names = '';
        $dosages = '';
        $timings = '';
        $days = '';
        $notes = '';

        // Loop through each prescription and concatenate details
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
            $medicine_names .= $prescription_row['medicine_name'] . ' , ';
            $dosages .= $prescription_row['dosage'] . ' , ';
            $timings .= 'Morning: ' . ($prescription_row['morning'] ? 'Yes' : 'No') . ', Afternoon: ' . ($prescription_row['afternoon'] ? 'Yes' : 'No') . ', Evening: ' . ($prescription_row['evening'] ? 'Yes' : 'No') . ', Night: ' . ($prescription_row['night'] ? 'Yes' : 'No') . '<br>';
            $days .= $prescription_row['days'] . ' , ';
            $notes .= $prescription_row['note'] . ' , ';
        }
        ?>

        <div class="card" style="width: 30rem;">
          <img src="" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> Your Prescription by Dr <?php echo $prescription_row['app_d_id']; ?></h5>
            <p class="card-text"> <?php echo $prescription_row['app_id']; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Medicine : <?php echo rtrim($medicine_names, ' , '); ?></li>
            <li class="list-group-item">Dosage  : <?php echo rtrim($dosages, ' , '); ?></li>
            <li class="list-group-item">Timings : <?php echo rtrim($timings, ' , '); ?></li>
            <li class="list-group-item">Days  : <?php echo rtrim($days, ' , '); ?></li>
            <li class="list-group-item">Note  : <?php echo rtrim($notes, ' , '); ?></li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>

        <?php
    } else {
        echo "No prescription found.";
    }
} else {
    echo "No appointment found for the patient.";
}
?>



<?php
include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app_data_id = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data_id);
$app_row = mysqli_fetch_assoc($result_app);

if ($app_row) {
    $app_id = $app_row['app_ID']; 
    $prescription_query = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
    $result_prescription = mysqli_query($connection, $prescription_query);

    if ($result_prescription && mysqli_num_rows($result_prescription) > 0) {
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
?>
<div class="card" style="width: 30rem;">
  <img src="" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> Your Prescription by Dr <?php  echo $prescription_row['app_d_id']; ?></h5>
    <p class="card-text"> <?php  echo $prescription_row['app_id']; ?></p>
  </div>
  <ul class="list-group list-group-flush" style="background-color: #f8f9fa;">
    <li class="list-group-item" style="background-color: #f8f9fa;">Medicine :      <?php  echo $prescription_row['medicine_name']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Dosage  :   <?php echo $prescription_row['dosage']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Timings :    
      <?php echo $prescription_row['morning'] ? 'Morning ' : ''; ?>
      <?php echo $prescription_row['afternoon'] ? 'Afternoon ' : ''; ?>
      <?php echo $prescription_row['evening'] ? 'Evening ' : ''; ?>
      <?php echo $prescription_row['night'] ? 'Night ' : ''; ?>
    </li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Days  :   <?php echo $prescription_row['days']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Note  :   <?php echo $prescription_row['note']; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
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





<?php
include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app_data_id = "SELECT * FROM `appointment_booking_update` WHERE `app_p_name`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data_id);
$app_row = mysqli_fetch_assoc($result_app);

if ($app_row) {
    $app_id = $app_row['app_ID']; 
    $prescription_query = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
    $result_prescription = mysqli_query($connection, $prescription_query);

    if ($result_prescription && mysqli_num_rows($result_prescription) > 0) {
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
?>
<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"> Prescription</h5>
  </div>
  <ul class="list-group list-group-flush" style="background-color: #f8f9fa;">
    <li class="list-group-item" style="background-color: #f8f9fa;">Medicine :      <?php  echo $prescription_row['medicine_name']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Dosage  :   <?php echo $prescription_row['dosage']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Timings :    
      <?php echo $prescription_row['morning'] ? 'Morning ' : ''; ?>
      <?php echo $prescription_row['afternoon'] ? 'Afternoon ' : ''; ?>
      <?php echo $prescription_row['evening'] ? 'Evening ' : ''; ?>
      <?php echo $prescription_row['night'] ? 'Night ' : ''; ?>
    </li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Days  :   <?php echo $prescription_row['days']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Note  :   <?php echo $prescription_row['note']; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
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
      $first_entry = true;
        while ($prescription_row = mysqli_fetch_assoc($result_prescription)) {
?>
<div class="card" style="width: 30rem;">
  <div class="card-body">
  <?php if($first_entry): ?>
    <h5 class="card-title text-center fs-2 "> Prescription</h5>
    <?php $first_entry = false; ?>
    <?php endif; ?>
    <?php if ($is_first_entry) { ?> <!-- Show only for the first entry -->
        <p class="card-text fs-4  ">Prescription by Dr <?php echo $prescription_row['app_d_id']; ?></p>
        <p class="card-text fs-5 ">Appointment ID: <?php echo $prescription_row['app_id']; ?></p>
    <?php } ?>
  </div>
  <ul class="list-group list-group-flush" style="background-color: #f8f9fa;">
    <li class="list-group-item" style="background-color: #f8f9fa;">Medicine :      <?php  echo $prescription_row['medicine_name']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Dosage  :   <?php echo $prescription_row['dosage']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Timings :    
      <?php echo $prescription_row['morning'] ? 'Morning ' : ''; ?>
      <?php echo $prescription_row['afternoon'] ? 'Afternoon ' : ''; ?>
      <?php echo $prescription_row['evening'] ? 'Evening ' : ''; ?>
      <?php echo $prescription_row['night'] ? 'Night ' : ''; ?>
    </li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Days  :   <?php echo $prescription_row['days']; ?></li>
    <li class="list-group-item" style="background-color: #f8f9fa;">Note  :   <?php echo $prescription_row['note']; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<?php
            $is_first_entry = false; // Set to false after the first entry
        }
    } else {
        echo "No prescription found.";
    }
} else {
    echo "No appointment found for the patient.";
}
?>