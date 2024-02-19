


<?php
include 'connection.php';

$errors = array();

if (isset($_POST['submit'])) {
    $Fullname = $_POST['FullName'];
    $UserName = $_POST['UserName'];
    $email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['Confirmpassword'];
    $Gender = $_POST['gender'];
    $Specilization = $_POST['Specilization'];

    // Validation
    if (empty($Fullname)) {
        array_push($errors, "Full Name is required");
    }
    if (empty($UserName)) {
        array_push($errors, "User Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }
    if (empty($PhoneNumber)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($Password)) {
        array_push($errors, "Password is required");
    }
    if ($Password != $ConfirmPassword) {
        array_push($errors, "Passwords do not match");
    }

    // If there are no errors, proceed with the insertion
    if (count($errors) == 0) {
        $password = password_hash($Password, PASSWORD_BCRYPT);
        $ConfirmPassword = password_hash($ConfirmPassword, PASSWORD_BCRYPT);

        $sql = "INSERT INTO d_register (Fullname, Username, Email, Phonenumber, Password, Confirmpassword, gender, Specilization) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $Fullname, $UserName, $email, $PhoneNumber, $password, $ConfirmPassword, $Gender, $Specilization);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('location:d_log_temp.php');
            exit();  // Always exit after a header redirect
        } else {
            echo die("Data not inserted: " . mysqli_error($connection));
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>
    <div class="logo">
        <a href="index.html">
        <img src="images/logo.png" alt="error"></a>
        </div>
    <div class="container">
        <h1 class="FormTitle">Doctor Registration</h1>
        <form action="#" method="post" >
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="FullName">Full Name</label>
                <input type="text"
                id="FullName"
                name="FullName"
                placeholder="Enter Full Name">

            </div>
            <div class="user-input-box">
                <label for="UserName">User Name</label>
                <input type="text"
                id="UserName"
                name="UserName"
                placeholder="Enter User Name">

            </div>
            <div class="user-input-box">
                <label for="E-MAil">E-Mail</label>
                <input type="email"
                id="EMAil"
                name="Email"
                placeholder="E-mail">

            </div>
            <div class="user-input-box">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text"
                id="PhoneNumber"
                name="PhoneNumber"
                placeholder="Enter Phone Number">

            </div>
            <div class="user-input-box">
                <label for="Password">Password</label>
                <input type="password"
                id="Password"
                name="Password"
                placeholder="Enter Password">

            </div>
            <div class="user-input-box">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password"
                id="ConfirmPassword"
                name="Confirmpassword"
                placeholder="Confirm Password">

            </div>
            <div class="gender-details-box">
            <span class="gender-title"> Gender</span>
            <div class="gender-category">
                <input type="radio" name="gender" id="Male" value="male">
                <label for="Male">Male</label>
                <input type="radio" name="gender" id="Female" value="female">
                <label for="Female">Female</label>
                <input type="radio" name="gender" id="Other" value="other">
                <label for="Other">Other</label>
            </div>
        </div>
        <div class="user-input-box">
                <label for="Specilization">Specialized in</label>
                <input type="text"
                id="Specilization"
                name="Specilization"
                placeholder="Specialized in">
            </div>
        </div>
        <div class="Form-submit-btn">
            <input onclick="myFunction()" type="submit" value="Register" name="submit">
           
        </div>
        </form>
    </div>
    <script>
function myFunction() {
  var txt;
  if (confirm("Registration successfull")) {
   
  } else {
    
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
    
    

    
</body>
</html>








<?php
    // include 'connection.php';
    // //inserting data inside table.

    // if(isset($_POST['submit'])){
    //     // echo "Success";
    //     $Fullname=$_POST['FullName'];
    //     $UserName=$_POST['UserName'];
    //     $email=$_POST['Email'];
    //     $PhoneNumber=$_POST['PhoneNumber'];
    //     $Password=$_POST['Password'];
    //     $ConfirmPassword=$_POST['Confirmpassword'];
    //     $Gender=$_POST['gender'];
    //     $Specilization=$_POST['Specilization'];

    //     //insert query.
    //     $sql="INSERT INTO d_register(id,Fullname,Username,Email,Phonenumber, Password ,Confirmpassword,gender,Specilization) 
        // VALUES ('','$Fullname','$UserName','$email','$PhoneNumber','$Password','$ConfirmPassword','$Gender','$Specilization')" ;
        
    //     $result=mysqli_query($connection,$sql);
    //     if($result){
    //        header('location:dlogin.php');
    
    //     }else{
    //         echo die("Data not inserted");
    //     }

    // }
?>