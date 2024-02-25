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

    // Check if username or email already exists
    $check_query = "SELECT * FROM d_register WHERE Username='$UserName' OR Email='$email' LIMIT 1";
    $result = mysqli_query($connection, $check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['Username'] === $UserName) {
            array_push($errors, "Username already exists");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }
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
    if (empty($Gender)) {
        array_push($errors, "Gender is required");
    }
    if (empty($Specilization)) {
        array_push($errors, "Specializaerrion is required");
    }


    if (count($errors) == 0) {
        // Insert into the database
        $sql = "INSERT INTO d_register (Fullname, Username, Email, Phonenumber, Password, Confirmpassword, gender, Specilization) 
                VALUES ('$Fullname','$UserName','$email','$PhoneNumber','$Password','$ConfirmPassword','$Gender','$Specilization')";

        if (mysqli_query($connection, $sql)) {
            header('location:dlogin.php');
            exit();
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
    <!-- <script>
function myFunction() {
  var txt;
  if (confirm("Registration successfull")) {
   
  } else {
    
  }
  document.getElementById("demo").innerHTML = txt;
}
</script> -->
    
<script>
function myFunction() {
    <?php
    if (isset($registrationSuccess) && $registrationSuccess) {
        echo "alert('Registration successful');";
    } else {
        // Concatenate all error messages into one string
        $errorMessage = implode("\\n", $errors);
        echo "alert('Registration failed:\\n$errorMessage');";
    }
    ?>
}
</script> 

    
</body>
</html>
