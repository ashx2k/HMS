<?php
// include 'connection.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['book_appointment'],
//     $_POST['dr_id'], 
//     $_POST['p_uname'], 
//     $_POST['appointmentDate'], 
//     $_POST['selectedTimeSlot'])) 
//     {
//         $dr_id = mysqli_real_escape_string($connection, $_POST['dr_id']);
//         $p_uname = mysqli_real_escape_string($connection, $_POST['p_uname']);
//         $appointmentDate = mysqli_real_escape_string($connection, $_POST['appointmentDate']);
//         $selectedTimeSlot = mysqli_real_escape_string($connection, $_POST['selectedTimeSlot']);
//         $sql = "INSERT INTO appointment_booking (app_d_id, app_p_name, app_date, app_time) VALUES ('$dr_id', '$p_uname', '$appointmentDate', '$selectedTimeSlot')";
//         if (mysqli_query($connection, $sql)) {
//             echo "Appointment booked successfully!";
//             header('Location: p_dashborad.php'); 
//             exit();
//         } else {
//             echo "Error: " . mysqli_error($connection);
//         }
//     } else {
//         echo "Missing required fields!";
//     }
// }
// $connection->close();
?>


<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['book_appointment'], $_POST['dr_id'], $_POST['p_uname'], $_POST['appointmentDate'], $_POST['selectedTimeSlot'])) {

        $dr_id = mysqli_real_escape_string($connection, $_POST['dr_id']);
        $dr_name = mysqli_real_escape_string($connection, $_POST['dr_name']);
        $p_uname = mysqli_real_escape_string($connection, $_POST['p_username']);
        $p_name = mysqli_real_escape_string($connection, $_POST['p_name']);
        $appointmentDate = mysqli_real_escape_string($connection, $_POST['appointmentDate']);
        $selectedTimeSlot = mysqli_real_escape_string($connection, $_POST['selectedTimeSlot']);
        $dr_fees = mysqli_real_escape_string($connection, $_POST['dr_charge']);

        // Check if the slot is already booked
        $checkSql = "SELECT * FROM appointment_booking_update WHERE app_d_id = '$dr_id' AND app_date = '$appointmentDate' AND app_time = '$selectedTimeSlot'";
        $checkResult = mysqli_query($connection, $checkSql);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            echo "The selected time slot is already booked. Please choose another slot.";
        } else {
            // Insert data into the database
            $insertSql = "INSERT INTO appointment_booking_update ( `app_d_id`, `app_d_name`, `app_p_name`, `app_p_real_name`, `app_date`, `app_time`, `charges`)
             VALUES ('$dr_id','$dr_name', '$p_uname','$p_name', '$appointmentDate', '$selectedTimeSlot','$dr_fees')";

            if (mysqli_query($connection, $insertSql)) {
                echo "Appointment booked successfully!";
                header('Location: p_dashborad.php');
                exit();
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Missing required fields!";
    }
}

$connection->close();
?>

