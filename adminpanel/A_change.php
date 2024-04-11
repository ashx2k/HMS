<?php
session_start();
$for_admin_sesson = $_SESSION['UserName'];
if ($for_admin_sesson == true) {
} else {
    header('location:admin.php');
}
?>
<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    
    $hashed_password = hash('sha256', $currentPassword);
    $hashed_new_password = hash('sha256', $newPassword);
    $hashed_confirm_password = hash('sha256', $confirmNewPassword);

    $sql = "SELECT  `admin_Password` FROM `admin_register` WHERE `admin_UserName`= '$for_admin_session' ";
    // $sql ="SELECT `Password` FROM `d_register` WHERE `UserName`='$for_doc_session'";
    $result = mysqli_query($connection , $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $passwordFromDB = $row['Password'];

        
        if ($hashed_password === $passwordFromDB) {
           
            if ($newPassword === $confirmNewPassword) {
                $sql2 ="UPDATE `admin_register` SET `admin_Password`='$hashed_new_password',`admin_Confirmpassword`='$hashed_confirm_password' WHERE `admin_UserName`='$for_doc_session' " ;
                // $sql2 = "UPDATE `admin_register` SET `admin_Password`='$hashed_new_password',`admin_Confirmpassword`='$hashed_confirm_password' WHERE `admin_UserName`= '$for_doc_session' ";

               $result2 = mysqli_query($connection , $sql2);
               if($result2 === true){

                echo "<script>alert('Password changed successfully.'); window.location.href = 'A_setting.php';</script>";

                exit();
               }
             
              
            } else {
           
                echo "<script>alert('New password and confirm new password do not match'); window.location.href = 'A_setting.php';</script>";

                exit();
            }
        } else {
          
            echo "<script>alert('Invalid current password'); window.location.href = 'A_setting.php';</script>";
     
            exit();
        }
    } else {
      
        echo "<script>alert('User not found'); window.location.href = 'A_setting.php'; </script>";
     
        exit();
    }
}
?>