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
    <link rel="stylesheet" href="patient.css">
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
                <li><a href="A_Payments.php"><i class="bi bi-journal-plus"></i>&nbsp;&nbsp;Payments</a></li>
                <li><a href="A_setting.php"><i class="bi bi-gear"></i>&nbsp;&nbsp;Setting</a></li>
                <li><a href="Logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
             </ul>
        </div>
        <div class="main">

        
            <div class="card " style="width:1000px;height:auto;">
                <div class="card-header text-center">
                   Patient List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone no</th>
                            <th>Age</th>
                           

                          </tr>
                        </thead>
                        <tbody>

<?php
include 'connection.php';


$query1 = "SELECT * FROM `p_register`";

$result1 = mysqli_query($connection, $query1);

if (mysqli_num_rows($result1) > 0) {
  $counter = 1;
    while ($row1 = mysqli_fetch_assoc($result1)) {
      ?>


                          <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo''. $row1["p_FullName"];?></td>
                            <td><?php echo''. $row1["p_Email"];?></td>
                            <td><?php echo''. $row1["p_PhoneNumber"];?></td>
                            <td><?php echo''. $row1["p_age"];?></td>
                            
                            </tr>
  <?php
  $counter++;
}
} else {
    echo "No records found";
}

mysqli_close($connection); // Close the database connection
?>
                         
                        </tbody>
                      </table>
                  
                </div>
              
              </div>
        </div>
    </div>
    
</body>
</html>