<?php

$connection = mysqli_connect('localhost', 'root', '', 'hospital');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "";
}

?>