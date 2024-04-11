
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Request</title>
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
}

.box {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 3px solid #ccc;
    border-radius: 5px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input,
select,
textarea {
    margin-bottom: 15px;
    padding: 8px;
}
    </style>
</head>

<body>
    <div class="container-fluid ">
    <div class="box">
        <h1 class="text-center ">Emergency Request Form</h1>
        <form action="" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="name">Your Contact:</label>
            <input type="text" id="name" name="contact" required>

            <label for="emergency_type">Emergency Type:</label>
            <select id="emergency_type" name="emergency_type" required>
                <option value="medical">Medical</option>
                <option value="fire">Fire</option>
                <option value="accident">Accident</option>
                <option value="other">Other</option>
            </select>

            <label for="details">Details:</label>
            <textarea id="details" name="details" rows="3" required></textarea>

            <input type="submit" value="SUBMIT" class="btn btn-primary fs-4 " name="emergency_submit">
           
            <div class="text-center pt-2 text-danger p-0 "><h1>Call : 1234567890</h1></div>
        </form>
    </div>
    </div>
</body>

</html>

<?php

include 'connection.php';
$error = array();
if(isset($_POST['emergency_submit'])){
$name = $_POST['name'];
$num = $_POST['contact'];
$etype = $_POST['emergency_type'];
$detail = $_POST['details'];
if (empty($name)) {
    array_push($error, "name is required");
}
if (empty($num)) {
    array_push($error, "contact No is required");
}
if(count($error) == 0){
$sql = "INSERT INTO `emergency`( `e_FullName`, `e_Number`, `e_type`, `e_detail`) VALUES ('$name','$num','$etype','$detail')";

if (mysqli_query($connection, $sql)) {
    echo "<script>alert('Emergency request sent successfully.'); window.location.href = 'index.html';</script>";
    exit();
} else {
    echo die("Data not inserted: " . mysqli_error($connection));
}
}
}
?>
