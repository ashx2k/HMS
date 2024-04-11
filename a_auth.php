<?php
session_start();
include 'connection.php';

$errors = [];
if (isset($_POST['login_admin'])) {
    $ausername = mysqli_real_escape_string($connection, $_POST['admin_user']);
    $apassword = mysqli_real_escape_string($connection, $_POST['admin_pass']);

    if (empty($ausername) || empty($apassword)) {
        array_push($errors, "Both username and password are required");
        echo "<script>
        window.alert('Empty username/password combination'); window.location.href = 'admin.php';</script>
        </script>";
    }

    if (count($errors) == 0) {
        $query = "SELECT `admin_UserName`, `admin_Password` FROM `admin_register` WHERE admin_UserName='$ausername'";
        $results = mysqli_query($connection, $query);
 

        if ($results && mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $storeduser = $row['admin_UserName'];
            $storedPassword = $row['admin_Password'];
// echo ''.$storeduser;


            $hashed_password = hash('sha256', $apassword);

            echo ''.$ausername;
            if ($ausername === $storeduser && $hashed_password === $storedPassword) {
                $_SESSION['UserName'] = $ausername;
                header('location: admin11.php');
                exit();
            } else {
                array_push($errors, "Wrong username/password combination");
                header('location: admin.php');
                echo "<script>
        window.alert('Wrong username/password combination'); window.location.href = 'admin.php';</script>
        </script>";
                
            }
        } else {
            
            array_push($errors, "Wrong username/password combination");
            header('location: admin.php');
            echo "<script>
            window.alert('Wrong username/password combination'); window.location.href = 'admin.php';</script>
            </script>";
        }
    }
}
?>
