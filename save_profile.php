<?php
include 'connection.php';


if(isset($_POST['submit'])) {
    $doc_id =  mysqli_real_escape_string($connection, $_POST['doc_id']);

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $mobile_number = mysqli_real_escape_string($connection, $_POST['phone']);
    $address_line_1  = mysqli_real_escape_string($connection, $_POST['addr1']);
    $address_line_2  = mysqli_real_escape_string($connection, $_POST['addr2']);
    $postcode  = mysqli_real_escape_string($connection, $_POST['pincode']);
    $state  = mysqli_real_escape_string($connection, $_POST['state']);
    $area  = mysqli_real_escape_string($connection, $_POST['area']);
    $email  = mysqli_real_escape_string($connection, $_POST['email']);
    $education  = mysqli_real_escape_string($connection, $_POST['education']);
    $country  = mysqli_real_escape_string($connection, $_POST['country']);
    $state_region  = mysqli_real_escape_string($connection, $_POST['state_region']);
    

    $sql = "UPDATE `d_register` SET 
        `first_name` = '$first_name',
        `last_name` = '$last_name',
        `PhoneNumber` = '$mobile_number',
        `address_line_1` = '$address_line_1',
        `address_line_2` = '$address_line_2',
        `postcode` = '$postcode',
        `state` = '$state',
        `area` = '$area',
        `Email` = '$email',
        `education` = '$education',
        `country` = '$country',
        `state_region` = '$state_region'
    WHERE 
       ID = '$doc_id' ";

    if(mysqli_query($connection, $sql)) {
        echo "<script> window.alert('Records added successfully.');
        window.location.href='d_profile.php';</script>";

    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }

    // Close connection
    mysqli_close($connection);
}
?>
