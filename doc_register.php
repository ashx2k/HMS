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
    $charges = $_POST['charges'];

    $hashed_password = hash('sha256', $Password);
    $hashed_confirm_password = hash('sha256', $ConfirmPassword);


    $check_query = "SELECT * FROM d_register WHERE Username='$UserName' OR Email='$email' LIMIT 1";
    $result = mysqli_query($connection, $check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['Username'] === $UserName) {
            array_push($errors, "");
            echo "<script>
        window.alert('Username already exists'); window.location.href = 'doc_register.php';</script>
        </script>";
        }

        if ($user['Email'] === $email) {
            array_push($errors, "");
            echo "<script>
        window.alert('Email already Exists'); window.location.href = 'doc_register.php';</script>
        </script>";
        }
    }
    if (empty($Fullname)) {
        array_push($errors, "Full Name is required");
        echo "<script>
        window.alert('Full Name is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    }
    if (empty($UserName)) {
        array_push($errors, "User Name is required");
        echo "<script>
        window.alert('User Name is required'); window.location.href = 'doc_register.php';</script>
        </script>";
        
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
        echo "<script>
        window.alert('Email is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
        echo "<script>
        window.alert('Invalid email format'); window.location.href = 'doc_register.php';</script>
        </script>";

    }
    if (empty($PhoneNumber)) {
        array_push($errors, "Phone Number is required");
        echo "<script>
        window.alert('Phone Number is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    }
    if (empty($Password)) {
        array_push($errors, "Password is required");
        echo "<script>
        window.alert('Password is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    }
    if ($Password != $ConfirmPassword) {
        array_push($errors, "Passwords do not match"); 
        echo "<script>
        window.alert('Passwords do not match'); window.location.href = 'doc_register.php';</script>
        </script>"; 
    }
    if (empty($Gender)) {
        array_push($errors, "Gender is required");
        echo "<script>
        window.alert('Gender is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    }
    if (empty($Specilization)) {
        array_push($errors, "Specializaerrion is required");
        echo "<script>
        window.alert('Specializaerrion is required'); window.location.href = 'doc_register.php';</script>
        </script>";
    }


    if (count($errors) == 0) {

    //     $sql = "INSERT INTO d_register (Fullname, Username, Email, Phonenumber, Password, Confirmpassword, gender, Specilization, 	appointment-charge) 
    //             VALUES ('$Fullname','$UserName','$email','$PhoneNumber','$hashed_password','$hashed_confirm_password','$Gender','$Specilization' , ' $charges')";
    
    //     // $sql = "INSERT INTO d_register (Fullname, Username, Email, Phonenumber, Password, Confirmpassword, gender, Specilization) 
    //     //         VALUES ('$Fullname','$UserName','$email','$PhoneNumber','$Password','$ConfirmPassword','$Gender','$Specilization')";

    //     if (mysqli_query($connection, $sql)) {
    //         header('location:dlogin.php');
    //         exit();
    //     } else {
    //         echo die("Data not inserted: " . mysqli_error($connection));
    //     }
    // }

    $stmt = $connection->prepare("INSERT INTO d_register (Fullname, Username, Email, Phonenumber, Password, Confirmpassword, gender, Specilization, `appointment-charge`) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $Fullname, $UserName, $email, $PhoneNumber, $hashed_password, $hashed_confirm_password, $Gender, $Specilization, $charges);

if ($stmt->execute()) {
  
    header('location:dlogin.php');
    exit();
} else {
    echo die("Data not inserted: " . $stmt->error);
}

$stmt->close();

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
           
        <div class="user-input-box">
                <label for="Specilization">Specialized in</label>
                <input type="text"
                id="Specilization"
                name="Specilization"
                placeholder="Specialized in">
            </div>
            <div class="user-input-box">
                <label for="Charges">Charges</label>
                <input type="text"
                id="Specilization"
                name="charges"
                placeholder="charges in RS">
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
    
<!-- <script>
function myFunction() {
    <?php
    // if (isset($registrationSuccess) && $registrationSuccess) {
    //     echo "alert('Registration successful');";
    // } else {
    //     // Concatenate all error messages into one string
    //     $errorMessage = implode("\\n", $errors);
    //     echo "alert('Registration failed:\\n$errorMessage');";
    // }
    ?>
}
</script>  -->

    
</body>
</html>
