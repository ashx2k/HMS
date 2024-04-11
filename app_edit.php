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


<!-- patient data -->

<?php
 include "connection.php";

 $sql = "SELECT * FROM `p_register` WHERE `p_UserName` = '$for_p_session'";
 $result = mysqli_query($connection, $sql);
 if ($result && mysqli_num_rows($result) > 0) {
     $p_row = mysqli_fetch_assoc($result);
  
 } else {
     echo "";
 }
 $connection->close();
?>

<!-- app data  -->
<?php
include 'connection.php';
if (isset($_POST['app_edit'])) {
$appo_id = $_POST['app_edit'];
$app_data = "SELECT * FROM `appointment_booking_update` WHERE `app_ID`='$appo_id' ";
$result_app = mysqli_query($connection , $app_data);
$app_row = mysqli_fetch_assoc($result_app);
}
else{

}
$connection -> close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="bs-5/bootstrap.bundle.min.js"></script>
    <style>
        .time-slot {
            cursor: pointer;
        }

        .selected-slot {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-primary-subtle     border-0   sticky-top ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Hello <?php echo " : ".$for_p_session ?></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span ><i class="bi bi-list"></i></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center  " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1 ">
        <li class="nav-item">
        <a class="nav-link " href="p_dashborad.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active "aria-current="page" href="pshowdoc.php">Doctor's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_prescription.php">My Prescripton</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_my_appointment.php">My Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_report.php">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p-bill.php">Bills</a>
        </li>
        
      </ul>
     
      
        <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
      
    </div>
  </div>
</nav>

<div class="container-fluid p-0 ">
<!-- <img src="images/11.jpeg " alt="" class="w-100 h-auto position-absolute  "> -->
<div class="container-fluid position-relative d-flex justify-content-center align-items-center">
  <div class=" w-75   h-auto m-0 ">
  <h3 class=" text-center bg-primary-subtle rounded-top-0 rounded-5  m-0 border-0 p-1">Edit Appointmant</h3>

    <form action="app_edit_1.php" method="post" class="form-group row mt-2 p-3  ">
    
      <div class="form-group col-6 row m-0  ">
        <div  class="col-4 float-end ">
         <label for="appointmentDate" class="form-label fw-bold ps-3 ">DOCTOR NAME :</label></div>
      <div class="col-6 ">
      <input type="text" class="form-control col-3 " id="docname" name="dr_name" value="<?php echo $app_row['app_d_name'];?>" required >
    </div>
  </div>


    <div class="form-group col-6 row m-0 ">
        <div class="col-4  ">
      <label for="peatent" class="form-label fw-bold ps-3  ">My Name :</label></div>
      <div class="col-6 ">
      <input type="text" class="form-control" id="p_uname" name="p_uname"  value="<?php echo $p_row['p_FullName'];?>" required>
    </div>
    </div>

    <div class="form-group col-6 row m-0 pt-2 mt-3  ">
 <div class="col-4  ">

            <label for="appointmentDate" class="form-label fw-bold  ps-3 ">Select Date :</label>
          </div>
        <div class="col-6">
            <input type="date" class="form-control   " id="appointmentDate" name="appointmentDate" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
    </div>

<!-- for time -->

        <div class="form-group col-6 row m-0 pt-2 mt-3  ">
        <div class="col-4  ">
        <label for="appointmentDate" class="form-label fw-bold ps-3  ">Select Time :</label></div>
        <div class="col-6 ps-4 fw-bold   "> <span id="selectedTimeDisplay"></span></div>
        
        </div>


 <div class="form-group pt-3 ">

        <div class="form-group row">
            <label class="fw-bold ps-3 text-center  mb-3 "><h2 class="bg-info-subtle  rounded-3 "> Select Time  </h2></label><span id="selectedTimeDisplay"></span>
            <table class="table border-1 text-center ">
                <tbody>
                    <?php
                   
                    $start_time = strtotime('09:00');
                    $end_time = strtotime('17:00');
                    $interval = 15 * 60; 

                    for ($i = 0; $i <7 ; $i++) {
                        echo '<tr>';
                        for ($j = 0; $j < 7; $j++) {
                            $current_time = $start_time + ($i * 60 * 60) + ($j * $interval);
                            $formatted_time = date('h:i A', $current_time);
                            echo '<td class="time-slot" data-time="' . date('H:i', $current_time) . '">' . $formatted_time . '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
       

        <input type="hidden" id="selectedTimeSlot" name="selectedTimeSlot">

       <button type="submit" class="btn btn-primary offset-2  d-flex  justify-content-center col-8 align-items-center mt-2 p-2 fw-bold fs-3  "
         name="update_Appointment" value="<?php echo $app_row['app_ID'];?>"
          onclick="return confirm('confirm edit booking details time ')">Edit Appointment</button>
<h1></h1>
  </form> 

  </div>
</div>
</div>
<script>
    // Display popup for overbooking
    <?php if (isset($_POST['book_appointment']) && isset($_POST['dr_id']) && isset($_POST['appointmentDate']) && isset($_POST['selectedTimeSlot'])): ?>
        <?php
            $dr_id = mysqli_real_escape_string($connection, $_POST['dr_id']);
            $appointmentDate = mysqli_real_escape_string($connection, $_POST['appointmentDate']);
            $selectedTimeSlot = mysqli_real_escape_string($connection, $_POST['selectedTimeSlot']);

            // Check if the slot is already booked (in case user modified the request)
            $checkSql = "SELECT * FROM appointment_booking_update WHERE app_d_id = '$dr_id' AND app_date = '$appointmentDate' AND app_time = '$selectedTimeSlot'";
            $checkResult = mysqli_query($connection, $checkSql);

            if ($checkResult && mysqli_num_rows($checkResult) > 0):
        ?>
                // Show the modal with the appropriate message
                $('#bookingAlertMessage').text('The selected time slot is already booked. Please choose another slot.');
                $('#bookingModal').modal('show');
        <?php endif; ?>
    <?php endif; ?>
</script>


<script>
    // Handle time slot selection and update the display
    $(document).ready(function () {
        $('.time-slot').click(function () {
            $('.time-slot').removeClass('selected-slot');
            $(this).addClass('selected-slot');

            var selectedTime = $(this).data('time');
            $('#selectedTimeSlot').val(selectedTime);
            $('#selectedTimeDisplay').text(selectedTime);
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="bookingAlertMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="bs-5/bootstrap.bundle.min.js"></script>

    

</body>
</html>

