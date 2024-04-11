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
        <div class="nav">
        <nav class="d-flex justify-content-between align-items-center  ">
      <h2>Dashboard</h2>
      <div class="d-flex align-content-center ">
        <h6 class="text-center pe-3 align-content-center m-0 ">WELCOME :
          <?php echo ' ' . $for_admin_sesson ?>
        </h6>
      </div>
    </nav>
           
        </div>
        <div class="sidebar">
            <div class="brand-name">
              
                <h1>HOSPITAL</h1>
         
             </div>
             <ul>
                <li><a href=""><i class="bi bi-person"></i>&nbsp;&nbsp;Patients</a></li>
                <li><a href="A_appointments.php"><i class="bi bi-journal"></i>&nbsp;&nbsp;Appoinments</a></li>
                <li><a href="A_Staff.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Staff</a></li>
                <li><a href="A_Payments.php"><i class="bi bi-journal-plus"></i>&nbsp;&nbsp;Paytments</a></li>
                <li><a href="A_setting.php"><i class="bi bi-gear"></i>&nbsp;&nbsp;Setting</a></li>
                <li><a href="Logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
             </ul>
        </div>
        <div class="main">

        
            <div class="card " style="width:1000px;height:auto;">
                <div class="card-header text-center">
                   Bills
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                           

                          </tr>
                        </thead>
                        <tbody>
<?php
include 'connection.php';
$bill = "SELECT * FROM `prescriptions`";
$run = mysqli_query($connection, $bill);
if (mysqli_num_rows($run) > 0) {
  // Output data of each row
  while ($b_row = mysqli_fetch_assoc($run)) {
?>




                          <tr>
                            <td><?php echo $b_row['id']?></td>
                            <td><?php echo $b_row['app_p_name']?></td>
                            <td><?php echo $b_row['created_at']?></td>
                            <td><?php echo $b_row['charges']?></td>
                            <td><?php echo $b_row['status']?></td>
                              <td class="d-flex justify-content-evenly   ">
                                <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $b_row['id']?>">
                                <button name="paid"  value="paid" class="btn btn-primary m-2 " >Paid</button>
                              
                              </form>
                              </td>
                            </tr>
                            <?php
}
} else {
    echo "No records found";
}

mysqli_close($connection); // Close the database connection
?>
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['paid'])) {

        $id = mysqli_real_escape_string($connection, $_POST['id']);

        $insertQuery = "UPDATE `prescriptions` SET `status` = 'paid' WHERE `id` = '$id'";
        $insertResult = mysqli_query($connection, $insertQuery);
        if ($insertResult) {
          echo "<script>
          window.alert('Data updated successfully.'); window.location.href = 'A_Payments.php';</script>
          </script>";
        } else {
            echo "Error updating data: " . mysqli_error($connection);
        }
    } else {
        echo "Invalid request.";
    }
}
?>

                         
                        </tbody>
                      </table>
                  
                </div>
              
              </div>
        </div>
    </div>


    

    <script src="js/bootstrap.min.js"></script>
</body>
</html>