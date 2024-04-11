<?php
session_start();
$for_p_session = $_SESSION['p_UserName'];
if(!$for_p_session) {
    header('location:plogin.php');
    exit(); // Stop further execution
}

include 'connection.php';

// Fetch patient data
$app_data = "SELECT * FROM `p_register` WHERE `p_UserName`='$for_p_session'";
$result_app = mysqli_query($connection, $app_data);
$app_row = mysqli_fetch_assoc($result_app);

// Fetch unique appointment IDs for the patient
$app_id_query = "SELECT DISTINCT app_id FROM `prescriptions` WHERE `app_p_name`='$for_p_session'";
$app_id_result = mysqli_query($connection, $app_id_query);


?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bill</title>
            <link rel="stylesheet" href="bs-5/bootstrap.min.css">
        </head>
        <body>


        <nav class="navbar navbar-expand-lg bg-primary-subtle border-bottom sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hello <?php echo " : " .$for_p_session ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link" href="p_dashborad.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pshowdoc.php">Doctor's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_prescription.php">My Prescription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p_my_appointment.php">My Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p_report.php">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="p_bill.php">Bills</a>
                </li>
            </ul>
            <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
        </div>
    </div>
</nav>

<div class="d-flex justify-content-center align-items-center h-auto m-0">
    <h1 class="bg-primary-subtle text-center rounded-4 rounded-top-0 border-0 w-75">BILLS</h1>
</div>
<?php
while ($row = mysqli_fetch_assoc($app_id_result)) {
    $appointment_id = $row['app_id'];
    
    // Fetch prescriptions for the current appointment ID
    $prescription_data = "SELECT * FROM `prescriptions` WHERE `app_p_name`='$for_p_session' AND `app_id`='$appointment_id'";
    $result_prescriptions = mysqli_query($connection, $prescription_data);
if (mysqli_num_rows($result_prescriptions) > 0) {
        ?>
        <?php while ($prescription_row = mysqli_fetch_assoc($result_prescriptions)): ?>
            <div class="container card mb-2">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>Hospital Management</h2>
                    </div>
                    <div class="container-fluid d-flex row m-1 p-1">
                        <h3 class="card-title text-center pt-2">Patient Details</h3>
                        <div class="card-body col-10">
                            <div class="card-text row">
                                <div class="col-2">Name <span class="float-end">:</span></div>
                                <div class="col-10"><?php echo $app_row['p_FullName']; ?></div>
                            </div>
                            <div class="card-text row">
                                <div class="col-2">Age <span class="float-end">:</span></div>
                                <div class="col-10"><?php echo $app_row['p_age']; ?></div>
                            </div>
                            <div class="card-text row">
                                <div class="col-2">Email <span class="float-end">:</span></div>
                                <div class="col-10"><?php echo $app_row['p_Email']; ?></div>
                            </div>
                            <div class="card-text row">
                                <div class="col-2">Gender <span class="float-end">:</span></div>
                                <div class="col-10"><?php echo $app_row['p_gender']; ?></div>
                            </div>
                        </div>
                        <div class="col-2">
                            <p class="card-text">Date: <?php echo $prescription_row['created_at'];?></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center ">Doctor Details</h3>
                        <div class="card-text row d-flex ">
                                <div class="col-2">Doctor id  <span class="float-end">:</span></div>
                                <div class="col-9"><?php echo $prescription_row['app_d_id']; ?></div>
                            </div>
                            <div class="card-text row d-flex ">
                                <div class="col-2">Appointment id  <span class="float-end">:</span></div>
                                <div class="col-9"><?php echo $prescription_row['app_id']; ?></div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Bill</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead> 
                            <tbody>
                               
                                    <tr>
                                        <td>Consultation</td>
                                        <td> <?php echo $prescription_row['charges']; ?> </td>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end mb-3">
                    <h3>Total: <?php echo $prescription_row['charges']; ?>.00 RS</h3>
                </div>
            </div>
            <?php endwhile; ?>
            <?php
    }
}

$connection->close();
?>
        </body>
        </html>
     
