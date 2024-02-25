<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Registration</title>
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
    <div class="logo">
        <a href="index.html">
            <img src="images/logo.png" alt="logo"></a>
    </div>
    <div class="container">
        <h1 class="FormTitle">Admin Registration</h1>
        <form action="aregistaratio.php" method="post">
        <!-- a_register.php -->
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="FullName">Full Name</label>
                <input type="text" id="FullName" name="aFullName" placeholder="Enter Full Name">

            </div>
            <div class="user-input-box">
                <label for="UserName">User Name</label>
                <input type="text" id="UserName" name="aUserName" placeholder="Enter User Name">

            </div>
            <div class="user-input-box">
                <label for="E-MAil">E-Mail</label>
                <input type="email" id="E-MAil" name="aemail" placeholder="Email">

            </div>
            <div class="user-input-box">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text" id="PhoneNumber" name="aPhoneNumber" placeholder="Enter Phone Number">

            </div>
            <div class="user-input-box">
                <label for="Password">Password</label>
                <input type="password" id="Password" name="aPassword" placeholder="Enter Password">

            </div>
            <div class="user-input-box">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password" id="ConfirmPassword" name="aConfirmPassword" placeholder="Confirm Password">

            </div>
        </div>
        <div class="gender-details-box">
            <span class="gender-title"> Gender</span>
            <div class="gender-category">
                <!-- <input type="radio" name="aGender" id="Male"> -->
                <input type="radio" name="a_gender" id="Male" value="male">

                <label for="Male">Male</label>
                <!-- <input type="radio" name="aGender" id="Female"> -->
                <input type="radio" name="a_gender" id="Female" value="female">
                <label for="Female">Female</label>
                <!-- <input type="radio" name="aGender" id="Other"> -->
                <input type="radio" name="a_gender" id="Other" value="other">
                <label for="Other">Other</label>
            </div>
        </div>
        <div class="Form-submit-btn">
            <input type="submit" value="Register" name="admin_reg">
        </div>
        </form>
    </div>



</body>

</html>


<?php
include "connection.php";
?>
<?php
$error = array();

if (isset($_POST['admin_reg'])){
  $a_fname=$_POST['aFullName'];
  $a_uname=$_POST['aUserName'];
  $a_email=$_POST['aemail'];
  $a_number=$_POST['aPhoneNumber'];
  $a_password=$_POST['aPassword'];
  $a_cpassword=$_POST['aConfirmPassword'];
  $a_gender=$_POST['a_gender'];
// if (isset($_POST['a_gender'])) {
//     $a_gender = $_POST['a_gender'];
// } else {
//     array_push($error, "Gender is required");
// }

  $check_query = "SELECT * FROM admin_register WHERE admin_UserName='$a_uname' OR admin_Email='$a_email' LIMIT 1";
  $result = mysqli_query($connection, $check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
      if ($user['admin_UserName'] === $a_uname) {
          array_push($error, "Username already exists");
      }

      if ($user['admin_Email'] === $a_email) {
          array_push($error, "Email already exists");
      }
  }
  if (empty($a_fname)) {
      array_push($error, "Full Name is required");
  }
  if (empty($a_uname)) {
      array_push($error, "User Name is required");
  }
  if (empty($a_email)) {
      array_push($error, "Email is required");
  } elseif (!filter_var($a_email, FILTER_VALIDATE_EMAIL)) {
      array_push($error, "Invalid email format");
  }
  if (empty($a_number)) {
      array_push($error, "Phone Number is required");
  }
  if (empty($a_password)) {
      array_push($error, "Password is required");
  }
  if ($a_password != $a_cpassword) {
      array_push($error, "Passwords do not match");  
  }
  if (empty($a_gender)) { 
      array_push($error, "Gender is required");
  }



  if (count($error) == 0) {

    $sql = "INSERT INTO `admin_register` (`admin_FullName`, `admin_UserName`, `admin_Email`, `admin_PhoneNumber`, `admin_Password`, `admin_Confirmpassword`, `admin_gender`) 
        VALUES ('$a_fname', '$a_uname', '$a_email', '$a_number', '$a_password', '$a_cpassword', '$a_gender')";


    if (mysqli_query($connection, $sql)) {
      header('location:admin.php');
      exit();
  } else {
      echo die("Data not inserted: " . mysqli_error($connection));
  }
}
}
?>

