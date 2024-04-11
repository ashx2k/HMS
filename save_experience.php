<?php

include 'connection.php';

if(isset($_POST['submit'])) {
    $doc_id1 =  mysqli_real_escape_string($connection, $_POST['doc_id1']);
    $experience_in = mysqli_real_escape_string($connection, $_POST['experience_in']);
    $additional_details = mysqli_real_escape_string($connection, $_POST['additional_details']);

    $sql = "UPDATE `d_register` SET `experience_in`='$experience_in',`additional_details`='$additional_details' WHERE `ID`='$doc_id1' ";
    if(mysqli_query($connection, $sql)) {
        echo    "<script> window.alert('Records added successfully.'); 
        window.location.href='d_profile.php';</script>";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
