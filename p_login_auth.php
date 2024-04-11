<?php
session_start();
error_reporting(0);
$errors = array(); 
include 'connection.php';
$results; 
if(isset($_POST['p_login'])){
    $p_uname = $_POST['p_username'];
    $p_pass = $_POST['p_password'];

    $hashed_password = hash('sha256', $p_pass);

    if(empty($p_uname)){
        $_SESSION['pmsg'] = "Username is required";
        // ob_start();
        header('location:plogin.php');
        // ob_end_flush();
        exit();        
    }
    if(empty($p_pass)){
        $_SESSION['pmsg'] = "Password is required";
        header('location:plogin.php');
        exit();
    }
    if(count($errors) == 0) {
        $check_query = "SELECT p_UserName, p_Password FROM p_register WHERE p_UserName = '$p_uname'";
        $results = mysqli_query($connection, $check_query);
        if(!$results) {
            die(mysqli_error($connection));
        }   }
    if($results && mysqli_num_rows($results) == 1 ) {
        $row = mysqli_fetch_assoc($results);
        $storeduser = $row["p_UserName"];
        $storedPassword = $row["p_Password"];

        if($p_uname === $storeduser && $hashed_password === $storedPassword) {
            $_SESSION['p_UserName'] = $storeduser; 
            ob_start();
            header('location: p_dashborad.php');
            ob_end_flush();
            exit(); 
        } else {
            $_SESSION['pmsg'] = "Wrong username/password combination";
        header('location:plogin.php');
            exit();
        
        }
    } else {
        
        // echo "<script>
        // window.alert('Wrong username/password combination'); window.location.href = 'plogin.php';</script>
        // </script>";
        $_SESSION['pmsg'] = "Wrong username/password combination";
        header('location:plogin.php');
        exit();
    }
}
?>