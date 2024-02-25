

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/p.css" />

    <title>Patient Login</title>
  </head>
  <body>
    <div class="logo">
      <a href="index.html"> <img src="images/logo.png" alt="" /></a>
    </div>
    <div class="contain">
      <div class="text">
        <h1>Patient Login</h1>
        <form action="p_login_auth.php" method="post">
        <!-- <form action="" method="post"> -->
        <input class="inp1" type="text" placeholder="Enter UserName" name="p_username"/>
        <input class="inp2" type="password" placeholder="Enter password" name="p_password"/>
        <p>Forget password ?</p>
        <button name="p_login">Login</button>
        </form>
        <p>
          Not Registered? <span><a href="pregistration.html"> Sign Up</a></span>
        </p>
        <p>
          Not a Patient? <span><a href="index.html"> GO Back</a></span>
        </p>
      </div>
    </div>
  </body>
</html>



<?php

// session_start();
// // Remove error_reporting(0) during development
// // error_reporting(0);
// $errors = array(); // Change $error to $errors for consistency
// include 'connection.php';
// $results; 
// if(isset($_POST['p_login'])){
  
//     $p_uname = $_POST['p_username'];
//     $p_pass = $_POST['p_password'];

//     if(empty($p_uname)){
//         array_push($errors, "Username is required");
//     }
//     if(empty($p_pass)){
//         array_push($errors, "Password is required"); // Correct typo in "Password"
//     }
//     if(count($errors) == 0) {
//         $check_query = "SELECT p_UserName, p_Password FROM p_register WHERE p_UserName = '$p_uname'";
//         $results = mysqli_query($connection, $check_query);

//         if(!$results) {
//             die(mysqli_error($connection)); // Check for SQL query execution errors
//         }
//     }

//     if($results && mysqli_num_rows($results) == 1 ) {
//         $row = mysqli_fetch_assoc($results);
//         $storeduser = $row["p_UserName"];
//         $storedPassword = $row["p_Password"];
        
//         // Debugging: Print the content of $row
//         echo "hello " . print_r($row, true);

//         if($p_uname === $storeduser && $p_pass === $storedPassword) {
//             $_SESSION['p_UserName'] = $p_uname;
//             $_SESSION['success'] = "You are now logged in";
//             // Use ob_start() and ob_end_flush() for proper header redirection
//             ob_start();
//             header('location: p_dashborad.html');
//             ob_end_flush();
//             exit(); 
//         } else {
//             array_push($errors, "Wrong username/password combination");
//         }
//     } else {
//         array_push($errors, "Wrong username/password combination");
//     }
// }

?>


