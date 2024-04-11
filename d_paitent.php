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
</head>


<body class="image">
 <div class="container-fluid p-0  img-fluid  sticky-top  ">
  <!-- <img src="images/12.jpeg" alt="" class="position-absolute w-100 h-auto "> -->
  <nav class="navbar navbar-expand-md bg-dark-subtle shadow-lg position-relative ">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="#">Doctor :<?php echo"".$for_doc_session ?></a>

  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hide"
                aria-controls="hide" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fw-bold " id="hide">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link " href="d_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="d_paitent.php">Paitent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_appointment.php">Appointment</a>
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
 <div class="d-flex justify-content-center align-items-center h-auto m-0">
    <h1 class="bg-dark-subtle text-center rounded-4 rounded-top-0 border-0 w-75">Patient</h1>
</div>

 <div class="container ">
 <table class="table table-hover table-bordered border-primary">
   <tr class="text-center">
       <th>ID</th>
       <th>Name</th>
       <th>Age</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Reports</th>
   </tr>
 

 <?php
include 'connection.php';

$sql1 = "SELECT DISTINCT `app_p_name` FROM `appointment_booking_update` WHERE `app_d_name`='$for_doc_session'";
$query1 = mysqli_query($connection, $sql1);

if(mysqli_num_rows($query1) > 0) {
    while($row = mysqli_fetch_assoc($query1)) {
        $p_uname = $row['app_p_name'];
 
        $sql2 = "SELECT * FROM `p_register` WHERE `p_UserName`='$p_uname'";
        $query2 = mysqli_query($connection, $sql2);

        if(mysqli_num_rows($query2) > 0) {
            while($p_data = mysqli_fetch_assoc($query2)) {
?>

<tr>
    <td><?php echo $p_data['ID'] ?></td>
    <td><?php echo $p_data['p_FullName'] ?></td>
    <td><?php echo $p_data['p_age'] ?></td>
    <td><?php echo $p_data['p_PhoneNumber'] ?></td>
    <td><?php echo $p_data['p_Email'] ?></td>
    <td>
        <div class="text-center">
            <button type="button" class="btn btn-primary align-self-center" 
            data-bs-toggle="modal" 
            data-bs-target="#modal_<?php echo $p_data['ID']; ?>">View Report</button>
        </div>

        <div class="modal fade" id="modal_<?php echo $p_data['ID']; ?>" tabindex="-1" 
aria-labelledby="modal_<?php echo $p_data['ID']; ?>_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_<?php echo $p_data['ID']; ?>_label">Patient Reports</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <table class="table table-responsive border-1">
                    <tr class="bg-danger text-center">
                        <th class="border-2">File Name</th>
                        <th class="border-2">Upload Date</th>
                        <th class="border-2">Action</th>
                    </tr>
                    <?php
                   
                    $rep = "SELECT * FROM `report_upload` WHERE `p_id`='$p_uname'";
                    $query_rep = mysqli_query($connection, $rep);
                    while ($row_r = mysqli_fetch_assoc($query_rep)) {
                    ?>
                    <tr>
                        <td class="border-2"><?php echo $row_r['file_name']?></td>
                        <td class="border-2"><?php echo $row_r['upload_date'] ?></td>
                        <td class="border-2 text-center"><a href="d__report.php?p_id=<?php echo $row_r['id'] ?>" class="btn btn-primary align-self-center">Download</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    </td>
</tr>



<?php
            }
        } else {
            echo "No patient data found for username: $p_uname <br>";
        }
    }
} else {
    echo "<script>
    window.alert('No Patient found for the doctor: $for_doc_session');
    </script>";
}

mysqli_close($connection);
?>













 </div>


 <script src="bs-5/bootstrap.min.js"></script>

</body>

</html>