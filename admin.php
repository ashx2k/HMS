

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="logo">
        <a href="index.html">
        <img src="logo.png" alt=""></a>
    </div>
    <?php if (!empty($errors)) : ?>
                    
                    <?php foreach ($errors as $error) : ?>
                        <h1 style="display: flex; justify-content: center; color: red;"><?php echo $error; ?></h1>
                    <?php endforeach; ?>
                
            <?php endif; ?>
    <div class="contain">
        <div class="text">
            <h1>Admin Login</h1>
            
            <form action="a_auth.php" method="post">
                <input class="inp1" type="text" placeholder="Enter UserName" name="admin_user">
                <input class="inp2" type="password" placeholder="Enter password" name="admin_pass">
              
                <p>Forget password ?</p>
                <button type="submit" name="login_admin">Login</button>
            </form>
            <p>Register admin ? <span><a href="aregistaratio.php"> Sign-up</a></span></p>
            <p>Not a admin go to login? <span><a href="index.html"> GO back</a></span></p>
        </div>
    </div>
</body>
</html>
