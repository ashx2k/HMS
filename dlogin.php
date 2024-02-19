
<?php
include 'connection.php';

$errors = array();

if (isset($_POST['loginbtn'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // Use a more secure password hashing method (e.g., bcrypt)
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT * FROM d_register WHERE username='$username' and password='$password'";
        $results = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($results)) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location:d_dashboard.php');
                exit();  // Always exit after a header redirect
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        } else {
            array_push($errors, "User not found");
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
   
       
        <title> Doctor Login</title>
    </head>
    <body>
        <div class="logo">
            <a href="index.html">
            <img src="images/logo.png" alt=""></a>
            </div>
        <div class="contain">
            <div class="text">
                <h1> Doctor Login</h1>
                <form action="dlogin.php" method="post" >
                <input class="inp1" type="text" placeholder="Enter UserName" name="username" >
                <input class="inp2" type="password" placeholder="Enter password" name="password" >
                <P>Forget password ?</P>
                <button type="submit" name="loginbtn" >Login</button>
                </form>
                <p> Doctor Register <span><a href="dregistration.php"> Sign Up</a></span></p>
                <p>Not a Doctor ? <span><a href="index.html"> Go Back</a></span></p>


            </div>

        </div>
    </body>
</html>




<?php 
// include 'connection.php';

// $errors = array(); 

// if(isset($_POST['loginbtn'])) 
// { 
// $usr=@$_POST['name']; 
// $pass=@$_POST['pass']; 
// if ($usr=="docter" && $pass=="123") 
//  { 
//  session_start(); 
//  $_SESSION['admin1']=$usr; 
//  header("Location:d_dashboard.php"); 
//  echo"loged in successfuly...."; 
//  } 
//  else 
//  { 
//  echo 
//  "wrong username or password....";
// }
// }


// if (isset($_POST['loginbtn'])) {
// $username = mysqli_real_escape_string($connection, $_POST['username']);
// $password = mysqli_real_escape_string($connection, $_POST['password']);
  
//     if (empty($username)) {
//         array_push($errors, "Username is required");
//     }
//     if (empty($password)) {
//         array_push($errors, "Password is required");
//     }
//     if (count($errors) == 0) 
//     {
//         $password = md5($password);
//         $query = "SELECT * FROM d_register WHERE username='$username' AND password='$password'";
//         $results = mysqli_query($connection, $query);
//         if (mysqli_num_rows($results) == 1) {
//           $_SESSION['username'] = $username;
//           $_SESSION['success'] = "You are now logged in";
//           header('location:d_dashboard.php');
//         }else {
//             array_push($errors, "Wrong username/password combination");
//         }
//     }
//   }


?>