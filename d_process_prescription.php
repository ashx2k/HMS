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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    $app_id = $_POST['app_id'];
    $app_p_name = $_POST['app_p_name'];
    $doctor_id = $_POST['app_d_id'];
    $medicine_names = $_POST['medicine_name'];
    $dosages = $_POST['dosage'];
    $mornings = isset($_POST['morning']) ? $_POST['morning'] : array();
    $afternoons = isset($_POST['afternoon']) ? $_POST['afternoon'] : array();
    $evenings = isset($_POST['evening']) ? $_POST['evening'] : array();
    $nights = isset($_POST['night']) ? $_POST['night'] : array();
    $days_values = $_POST['days'];
    $notes = $_POST['note'];
    $charge = $_POST['charge'];
   
    for ($i = 0; $i < count($medicine_names); $i++) {
        $medicine_name = mysqli_real_escape_string($connection, $medicine_names[$i]);
        $dosage = mysqli_real_escape_string($connection, $dosages[$i]);
        $morning = isset($mornings[$i]) ? 1 : 0;
        $afternoon = isset($afternoons[$i]) ? 1 : 0;
        $evening = isset($evenings[$i]) ? 1 : 0;
        $night = isset($nights[$i]) ? 1 : 0;
        $days = mysqli_real_escape_string($connection, $days_values[$i]);
        $note = mysqli_real_escape_string($connection, $notes[$i]);

        $sql = "INSERT INTO prescriptions (`app_id`,`app_p_name`, `app_d_id`, `medicine_name`, `dosage`, `morning`, `afternoon`, `evening`, `night`, `days`, `note`,`charges`) 
                VALUES ('$app_id','$app_p_name ' , '$doctor_id',  '$medicine_name', '$dosage', '$morning', '$afternoon', '$evening', '$night', '$days', '$note' ,'$charge')";
        mysqli_query($connection, $sql);
    }
    echo "<script>
   window.alert('prescription submited');
   </script>";
   header('location:d_appointment.php');
   
    mysqli_close($connection);
}
?>