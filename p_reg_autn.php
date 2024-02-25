<?php
include 'connection.php';

?>


<?php
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

$check_query = "SELECT * FROM p_register WHERE p_UserName ='$p_uname' OR p_Email = '$p_email' LIMIT 1";
$result =mysqli_query($connection , $check_query);
$user = mysqli_fetch_assoc($result);



if($user){
    if($user['p_username'] === $p_uname){
        array_push($error , "Usernabe already Exists");
    }
    if($user['p_Email'] === $p_email){
        array_push($error, " Email already Exists");
    }
}
if(empty($p_fname)){
    array_push($error, "Full Name is required");  
}
if(empty( $p_uname )){
    array_push($error, "User Name is required");
}
if(empty( $p_email )){
    array_push($error, "Email is required");
}
if(empty( $p_phone    )){
    array_push($error, "Phone Number is required");
}
if(empty( $p_password    )){
    array_push($error, "Password is required");
}
if($p_password != $p_cpassword  ){
    array_push($error, "Passwords do not match");  
}
if(empty( $p_age )){
    array_push($error, "Age is required");
}
if(empty( $p_gender  )){
    array_push($error, "Gender is required");
}

if(count($error) == 0){

    $sql ="INSERT INTO p_register (`p_FullName`, `p_UserName`, `p_Email`, `p_age`, `p_PhoneNumber`, `p_Password`, `p_Confirmpassword`, `p_gender`)
     VALUES ('$p_fname','$p_uname','$p_email','$p_phone','$p_password','$p_cpassword','$p_age','$p_gender')";

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