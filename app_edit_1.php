<?php
include "connection.php";
echo "hello";

if (isset($_POST['update_Appointment'])) {
    $newDate = $_POST['appointmentDate'];
    $newTimeSlot = $_POST['selectedTimeSlot'];
    $ap_Id = $_POST['update_Appointment'];

    $updateSql = "UPDATE `appointment_booking_update` 
    SET `app_date`='$newDate', `app_time`='$newTimeSlot' WHERE `app_ID`='$ap_Id' ";

    $runquery = mysqli_query($connection, $updateSql);

    if ($runquery) {
        echo " <script>alert('Appointment updated successfully!.'); window.location.href='p_dashborad.php';</script>" ;
        // header('Location: p_dashborad.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
$connection->close();
?>