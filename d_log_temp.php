<?php
include 'connection.php';
error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['username'])) {
    header('location: d_dashboard.php');
    exit();
}

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
        $query = "SELECT * FROM d_register WHERE username='$username'";
        $results = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($results)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: d_dashboard.php');
                exit();
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
    <!-- ... (your existing head content) -->
    <link rel="stylesheet" href="css/login.css">
    <title>Doctor Login</title>
</head>
<body>
    <div class="logo">
        <a href="index.html">
            <img src="images/logo.png" alt="">
        </a>
    </div>
    <?php if (count($errors) > 0): ?>
                <div class="errors">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

    <div class="contain">
        <div class="text">
            <h1>Doctor Login</h1>
            

            <form action="d_log_temp.php" method="post">
                <input class="inp1" type="text" placeholder="Enter UserName" name="username">
                <input class="inp2" type="password" placeholder="Enter password" name="password">
                <p>Forget password ?</p>
                <button type="submit" name="loginbtn">Login</button>
            </form>

            <p>Doctor Register <span><a href="dregistration.php">Sign Up</a></span></p>
            <p>Not a Doctor ? <span><a href="index.html">Go Back</a></span></p>
        </div>
    </div>
</body>
</html>
