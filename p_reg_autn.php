<?php
include 'connection.php';
$error = array();
error_reporting(0);
if(isset($_POST ['p_register'])){
$p_fname = $_POST [ 'pFullName'];
$p_uname = $_POST [ 'pUserName'];
$p_email = $_POST [ 'p_email'];
$p_phone = $_POST [ 'p_PhoneNumber'];
$p_password = $_POST [ 'p_Password'];
$p_cpassword = $_POST [ 'p_ConfirmPassword'];
$p_age = $_POST [ 'p_age'];
$p_gender = $_POST [ 'pGender'];

$hashed_password = hash('sha256', $p_password);
$hashed_confirm_password = hash('sha256', $p_cpassword);

$check_query = "SELECT * FROM p_register WHERE p_UserName ='$p_uname' OR p_Email = '$p_email' LIMIT 1";
$result =mysqli_query($connection , $check_query);
$user = mysqli_fetch_assoc($result);
if($user){
    if($user['p_username'] === $p_uname){
        $errorMessage = "Username already exists";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert('Username already exists'); window.location.href = 'pregistration.html';</script>
        </script>";
    }
    if($user['p_Email'] === $p_email){
        $errorMessage = "Email already Exists";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert('Email already Exists'); window.location.href = 'pregistration.html';</script>
        </script>";
       
    }
}
if(empty($p_fname)){
    $errorMessage = "Full Name is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert('Full Name is required'); window.location.href = 'pregistration.html';</script>
        </script>";
   
  
}
if(empty( $p_uname )){
    $errorMessage = "User Name is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert('User Name is required'); window.location.href = 'pregistration.html';</script>
        </script>";


}
if(empty( $p_email )){
    $errorMessage = "Email is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Email is required  '); window.location.href = 'pregistration.html';</script>
        </script>";
        

}
if(empty( $p_phone    )){
    $errorMessage = "Phone Number is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Phone Number is required  '); window.location.href = 'pregistration.html';</script>
        </script>";


}
if (strlen($p_password) < 8) {
    $errorMessage = "Password must be at least 8 characters long";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert('  Password must be at least 8 characters long '); window.location.href = 'pregistration.html';</script>
        </script>";

}
if(empty( $p_password    )){
    $errorMessage = "Password is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Password is required  '); window.location.href = 'pregistration.html';</script>
        </script>";

}
if($p_password != $p_cpassword  ){
    $errorMessage = "Passwords do not match";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Passwords do not match  '); window.location.href = 'pregistration.html';</script>
        </script>";

}
if(empty( $p_age )){
    $errorMessage = "Age is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Age is required  '); window.location.href = 'pregistration.html';</script>
        </script>";

}
if(empty( $p_gender  )){
    $errorMessage = "Gender is required";
        array_push($error, $errorMessage);
        echo "<script>
        window.alert(' Gender is required  '); window.location.href = 'pregistration.html';</script>
        </script>";
 
}

if(count($error) == 0){

    $sql ="INSERT INTO p_register (`p_FullName`, `p_UserName`, `p_Email`,  `p_PhoneNumber`, `p_Password`, `p_Confirmpassword`,`p_age`, `p_gender`)
    VALUES ('$p_fname','$p_uname','$p_email','$p_phone','$hashed_password','$hashed_confirm_password','$p_age','$p_gender')";

    
    // $sql ="INSERT INTO p_register (`p_FullName`, `p_UserName`, `p_Email`,  `p_PhoneNumber`, `p_Password`, `p_Confirmpassword`,`p_age`, `p_gender`)
    //  VALUES ('$p_fname','$p_uname','$p_email','$p_phone','$p_password','$p_cpassword','$p_age','$p_gender')";

     if (mysqli_query($connection, $sql)) {
        header('location: plogin.php');
        echo "hello";
        exit();
    } else {
        echo die("Data not inserted: " . mysqli_error($connection));
    }
}
}


?>


<?php
// session_start();

// include 'connection.php';

// $errors = array();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $p_fname = $_POST['pFullName'];
//     $p_uname = $_POST['pUserName'];
//     $p_email = $_POST['p_email'];
//     $p_phone = $_POST['p_PhoneNumber'];
//     $p_password = $_POST['p_Password'];
//     $p_cpassword = $_POST['p_ConfirmPassword'];
//     $p_age = $_POST['p_age'];
//     $p_gender = $_POST['pGender'];

//     $check_query = "SELECT * FROM p_register WHERE p_UserName ='$p_uname' OR p_Email = '$p_email' LIMIT 1";
//     $result = mysqli_query($connection, $check_query);
//     $user = mysqli_fetch_assoc($result);

//     if ($user) {
//         if ($user['p_username'] === $p_uname) {
//             echo "<script>error.push('Username already exists');</script>";
//         }
//         if ($user['p_Email'] === $p_email) {
//             echo "<script>error.push('Email already exists');</script>";
//         }
//     }

//     if (empty($p_fname)) {
//         array_push($errors, "Full Name is required");
//     }
//     if (empty($p_uname)) {
//         array_push($errors, "User Name is required");
//     }
//     if (empty($p_email)) {
//         array_push($errors, "Email is required");
//     }
//     if (empty($p_phone)) {
//         array_push($errors, "Phone Number is required");
//     }
//     if (empty($p_password)) {
//         array_push($errors, "Password is required");
//     }
//     if (strlen($p_password) < 8) {
//         array_push($errors, "Password must be at least 8 characters long");
//     }
//     if ($p_password !== $p_cpassword) {
//         array_push($errors, "Passwords do not match");
//     }
//     if (empty($p_age)) {
//         array_push($errors, "Age is required");
//     }
//     if (empty($p_gender)) {
//         array_push($errors, "Gender is required");
//     }

  
//     if (count($errors) == 0) {

//         $hashed_password = hash('sha256', $p_password);

   
//         $sql = "INSERT INTO p_register (`p_FullName`, `p_UserName`, `p_Email`, `p_PhoneNumber`, `p_Password`, `p_Confirmpassword`, `p_age`, `p_gender`)
//                 VALUES ('$p_fname','$p_uname','$p_email','$p_phone','$hashed_password','$hashed_password','$p_age','$p_gender')";

//         if (mysqli_query($connection, $sql)) {
//             $_SESSION['message'] = "Registration successful!";
//             header('location: plogin.php');
//             exit();
//         } else {
//             $_SESSION['error'] = "Failed to insert data: " . mysqli_error($connection);
//             header('location: pregistration.html');
//             exit();
//         }
//     } else {
//         $_SESSION['error'] = implode("<br>", $errors);
//         header('location: pregistration.html');
//         exit();
//     }
// }
?>



