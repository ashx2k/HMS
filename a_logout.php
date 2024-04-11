<?php 
session_start();

session_unset();
header ('location: admin.php');

?>


<!-- first apply session
session_start();

then forword that seassion to anotehr page 

then destroy sesson to logout. 
session_unset();-->