<?php
session_start();
error_reporting(0);
$errors = [];
include 'connection.php';
if (isset($_POST['login_doctor'])) {

    $username = mysqli_real_escape_string($connection, $_POST['doc_username']);
    $password = mysqli_real_escape_string($connection, $_POST['doc_password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT  `Username`, `Password` FROM `d_register` WHERE Username='$username' ";
        $results = mysqli_query($connection, $query);


        if ($results && mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            // print_r($row);  this part is for the truble shhoting 
            $storeduser = $row['Username'];
            $storedPassword = $row['Password'];

            if ($username === $storeduser && $password === $storedPassword) {

                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: d_dashboard.php');
                exit();

            } else {
                array_push($errors, "Wrong username/password combination");
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>