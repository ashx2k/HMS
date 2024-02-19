<?php 
if(isset($_POST['s'])) 
{ 
$usr=@$_POST['user']; 
$pass=@$_POST['pass']; 
if ($usr=="admin" && $pass=="admin") 
 { 
 session_start(); 
 $_SESSION['admin1']=$usr; 
 header("Location:ap.php"); 
 echo"loged in successfuly...."; 
 } 
 else 
 { 
 echo 
 
 "wrong username or password....";
}
}
?>









<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
   
       
        <title> Admin Login</title>
    </head>
    <body>
        <div class="logo">
            <a href="index.html">
            <img src="logo.png" alt=""></a>
            </div>
        <div class="contain">
            <div class="text">
                <h1>Admin Login</h1>
                <form action="" method="post" >
                <input class="inp1" type="text" placeholder="Enter UserName" name="user" >
                <input class="inp2" type="password" placeholder="Enter password" name="pass" >
                <P>Forget password ?</P>
                <button type="submit" name="s" >Login</button>
                </form>

                <p>Register admin ? <span><a href="aregistaratio.html"> Sign-up</a></span></p>
                <p>Not a admin go to login? <span><a href="index.html"> GO back</a></span></p>
                

            </div>

        </div>
    </body>
</html>