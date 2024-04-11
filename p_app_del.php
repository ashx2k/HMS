<?php
session_start();
if (!isset($_SESSION['p_UserName'])) {
    header('Location: plogin.php');
    exit();
}
if (isset($_POST['app_delete'])) {
    include 'connection.php'; 
    $app_id = mysqli_real_escape_string($connection, $_POST['app_delete']); 
    $sql = "DELETE FROM `appointment_booking_update` WHERE `app_ID` = '$app_id'";
    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Appointment Canceled successfully.'); window.location.href='p_my_appointment.php';</script>";
    } else {
        echo "<script>alert('Error Cancelling appointment.'); window.location.href='p_my_appointment.php';</script>";
    }
    mysqli_close($connection); 
} else {
    header('Location: p_my_appointment.php');
}
?>