<?php
session_start();

error_reporting(0);
$errors = [];
include 'connection.php';
if (isset($_POST['login_doctor'])) {

    $username = mysqli_real_escape_string($connection, $_POST['doc_username']);
    $password = mysqli_real_escape_string($connection, $_POST['doc_password']);

    $hashed_password = hash('sha256', $password);

    if (empty($username)) {
        $_SESSION['msg'] = "Username is required";
        exit();
        // echo "<scrip>
        // window.alert('Empty username'); window.location.href = 'dlogin.php';
        // </script>";
    }
    if (empty($password)) {
        $_SESSION['msg'] = "Password is required";
        exit();
        
    }
    if (count($errors) == 0) {
        $query = "SELECT  `Username`, `Password` FROM `d_register` WHERE Username='$username' ";
        $results = mysqli_query($connection, $query);


        if ($results && mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $storeduser = $row['Username'];
            $storedPassword = $row['Password'];

            if ($username === $storeduser && $hashed_password === $storedPassword) {

                $_SESSION['username'] = $username;
                // $_SESSION['success'] = "You are now logged in";
                header('location: d_dashboard.php');
                echo "<script>
                            window.alert('WELCOME DOCTOR'); 
                    </script>";
                exit();

            } else {
                $_SESSION['msg'] = "Wrong username/password combination";
                header('location: dlogin.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = "Wrong username/password combination";
            header('location: dlogin.php');
            exit();
        }
    }
}
?>