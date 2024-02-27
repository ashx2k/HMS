<?php 
// $errors = array();
// if(isset($_POST['login_admin'])) 
// { 
// $usr=@$_POST['admin_user']; 
// $pass=@$_POST['admin_pass']; 
// if (empty($usr)) {
//     array_push($errors, "Username is required");
// }
// if (empty($pass)) {
//     array_push($errors, "Password is required");
// }
// if (count($errors) == 0) 
// {
// if ($usr=="admin" && $pass=="admin") 
//  { 
//  session_start(); 
//  $_SESSION['admin1']=$usr; 
//  header("Location:ap.php"); 
//  echo"loged in successfuly...."; 
//  } 
//  else 
//  { 
//  echo 
 
//  "wrong username or password....";
// }
// }
// }
?>


<?php
session_start();
error_reporting(0);
$errors = [];
include 'connection.php';
if (isset($_POST['login_admin'])) {

    $ausername = mysqli_real_escape_string($connection,$_POST['admin_user']);
    $apassword = mysqli_real_escape_string($connection, $_POST['admin_pass']);

    if (empty($ausername)) {
        array_push($errors, "Username is required");
    }
    if (empty($apassword)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT  `admin_UserName`, `admin_Password` FROM `admin_register` WHERE admin_UserName='$ausername' ";
        $results = mysqli_query($connection, $query);


        if ($results && mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            print_r($row);
            $storeduser = $row['admin_UserName'];
            $storedPassword = $row['admin_Password'];

            if ($ausername === $storeduser && $apassword === $storedPassword) {

                $_SESSION['UserName'] = $ausername;
                // $_SESSION['success'] = "You are now logged in";
                header('location: admin-dash.php');
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






<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
   
       
        <title> Admin Login</title>
    </head>
    <body>
        <div class="logo">
            <a href="index.html">
            <img src="logo.png" alt=""></a>
            </div>
        <div class="contain">
            <div class="text">
                <h1>Admin Login</h1>
                <form action="" method="post" >
                <input class="inp1" type="text" placeholder="Enter UserName" name="admin_user" >
                <input class="inp2" type="password" placeholder="Enter password" name="admin_pass" >
                <P>Forget password ?</P>
                <button type="submit" name="login_admin" >Login</button>
                </form>

                <p>Register admin ? <span><a href="aregistaratio.php"> Sign-up</a></span></p>
                <p>Not a admin go to login? <span><a href="index.html"> GO back</a></span></p>
                

            </div>

        </div>
    </body>
</html>