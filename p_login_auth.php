<?php

session_start();
error_reporting(0);
$errors = array(); 
include 'connection.php';

?>


<?php

$results; 
if(isset($_POST['p_login'])){
  
    $p_uname = $_POST['p_username'];
    $p_pass = $_POST['p_password'];

    if(empty($p_uname)){
        array_push($errors, "Username is required");
    }
    if(empty($p_pass)){
        array_push($errors, "Password is required"); // Correct typo in "Password"
    }
    if(count($errors) == 0) {
        $check_query = "SELECT p_UserName, p_Password FROM p_register WHERE p_UserName = '$p_uname'";
        $results = mysqli_query($connection, $check_query);

        if(!$results) {
            die(mysqli_error($connection)); // Check for SQL query execution errors
        }
    }

    if($results && mysqli_num_rows($results) == 1 ) {
        $row = mysqli_fetch_assoc($results);
        $storeduser = $row["p_UserName"];
        $storedPassword = $row["p_Password"];
        
        // Debugging: Print the content of $row
        echo "hello " . print_r($row, true);

        if($p_uname === $storeduser && $p_pass === $storedPassword) {
            $_SESSION['p_UserName'] = $p_uname;
            $_SESSION['success'] = "You are now logged in";
            // Use ob_start() and ob_end_flush() for proper header redirection
            ob_start();
            header('location: p_dashborad.html');
            ob_end_flush();
            exit(); 
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    } else {
        array_push($errors, "Wrong username/password combination");
    }
}

?>

