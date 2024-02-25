<?php

include "connection.php";

$errors = array();

if (isset($_POST['admin_reg'])) {
    $a_fname = $_POST['aFullName'];
    $a_uname = $_POST['aUserName'];
    $a_email = $_POST['aemail'];
    $a_number = $_POST['aPhoneNumber'];
    $a_password = $_POST['aPassword'];
    $a_cpassword = $_POST['aConfirmPassword'];
    $a_gender = $_POST['aGender'];
  $check_query = "SELECT * FROM admin_register WHERE admin_UserName='$a_uname' OR admin_Email='$a_email' LIMIT 1";
  $result = mysqli_query($connection, $check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['admin_UserName'] === $a_uname) {
        array_push($errors, "Username already exists");
    }

    if ($user['admin_Email'] === $a_email) {
        array_push($errors, "Email already exists");
    }
}
if (empty($a_fname)) {
    array_push($errors, "Full Name is required");
}
if (empty($a_uname)) {
    array_push($errors, "User Name is required");
}
if (empty($a_email)) {
    array_push($errors, "Email is required");
} elseif (!filter_var($a_email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid email format");
}
if (empty($a_number)) {
    array_push($errors, "Phone Number is required");
}
if (empty($a_password)) {
    array_push($errors, "Password is required");
}
if ($a_password != $a_cpassword) {
    array_push($errors, "Passwords do not match");  
}
if (empty($a_gender)) { 
    array_push($errors, "Gender is required");
}

if (count($errors) == 0) {
    // Hash the password before storing in the database
    $hashed_password = password_hash($a_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `admin_register` (`admin_FullName`, `admin_UserName`, `admin_Email`, `admin_PhoneNumber`, `admin_Password`, `admin_Confirmpassword`, `admin_gender`) 
        VALUES ('$a_fname', '$a_uname', '$a_email', '$a_number', '$hashed_password', '$a_cpassword', '$a_gender')";

    if (mysqli_query($connection, $sql)) {
        header('location: d_log_temp.php');
        exit();
    } else {
        echo die("Data not inserted: " . mysqli_error($connection));
    }
}
}
?>