<?php 
session_start();

$for_doc_session = $_SESSION['username'];
if($for_doc_session == true)
{ }
else
{
header ('location:dlogin.php');
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Docter dashboard</title>
</head>

<body>
  <h1>Hello Patient</h1>
  <a href="logout.php">logout</a>
</body>

</html>