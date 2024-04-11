<?php
session_start();
$for_p_session = $_SESSION['p_UserName'];
if(!$for_p_session) {
    header('location:plogin.php');
    exit();
}
?>

<?php
include 'connection.php';

if (isset($_POST['upload'])) {
    $p_uname = $_POST['p_id'];

    if(empty($_FILES["image"]["tmp_name"])) {
        echo "<script>
    window.alert('Please select an image to upload'); 
    window.location.href = 'p_dashborad.php ';
    </script>
    </script>";
        // header('location:p_dashborad.php');
        exit();
    }

    // Check if a record exists for the user
    $check_query = "SELECT id FROM p_image WHERE u_name = ?";
    $stmt_check = $connection->prepare($check_query);
    $stmt_check->bind_param("s", $p_uname);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows == 0) {
        // If no record exists, insert a new one
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $insert_query = "INSERT INTO p_image (image_data, u_name) VALUES (?, ?)";
        $stmt_insert = $connection->prepare($insert_query);
        $stmt_insert->bind_param("ss", $imageData, $p_uname);
        if ($stmt_insert->execute()) {
            header('location:p_dashborad.php');
            exit(); // Exit after successful operation
        } else {
            echo "Error inserting image: " . $stmt_insert->error;
            exit(); // Exit on error
        }
    } else {
        // If a record exists, update the existing one
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $update_query = "UPDATE p_image SET image_data = ? WHERE u_name = ?";
        $stmt_update = $connection->prepare($update_query);
        $stmt_update->bind_param("ss", $imageData, $p_uname);
        if ($stmt_update->execute()) {
            header('location:p_dashborad.php');
            exit(); // Exit after successful operation
        } else {
            echo "Error updating image: " . $stmt_update->error;
            exit(); // Exit on error
        }
    }
}

if (isset($_POST['Delete'])) {
    $p_uname = $_POST['p_id'];

    // Delete the user's image (as in your original code)
    $delete_query1 = "DELETE FROM p_image WHERE  u_name = ?";
    $stmt_delete = $connection->prepare($delete_query1);
    $stmt_delete->bind_param("s", $p_uname);
    if ($stmt_delete->execute()) {
        header('location:p_dashborad.php');
        exit(); // Exit after successful operation
    } else {
        echo "Error deleting image: " . $stmt_delete->error;
        exit(); // Exit on error
    }
}

if (isset($_POST['p_report'])) {
    $p_id = $_POST['p_id'];

    if (empty($_FILES["report"]["tmp_name"])) {
        $_SESSION['msg'] = 'Please select a file to upload.';
        header('Location: p_report.php');
        exit();
    }

    if ($_FILES["report"]["size"] > 2000000) { 
        $_SESSION['msg'] = 'File size exceeds 2MB limit.';
        header('Location: p_report.php');
        exit();
    }

    // Prepare the data for insertion into the database
    $file_name = $_FILES["report"]["name"];
    $file_type = $_FILES["report"]["type"];
    $file_size = $_FILES["report"]["size"];
    $file_content = file_get_contents($_FILES["report"]["tmp_name"]);

    // Prepare and execute the SQL statement to insert data into the database
    $insert_query = "INSERT INTO report_upload (file_name, file_type, file_size, file_content, p_id) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $connection->prepare($insert_query);
    $stmt_insert->bind_param("ssiss", $file_name, $file_type, $file_size, $file_content, $p_id);

    if ($stmt_insert->execute()) {
        $_SESSION['msg'] = 'File uploaded successfully.';
        header('Location: p_report.php');
    exit();
    } else {
        $_SESSION['msg'] = 'Error uploading file: ' . $stmt_insert->error;
    }

    header('Location: p_report.php');
    exit();
} else {
    $_SESSION['msg'] = 'Invalid request.';
    header('Location: p_report.php');
    exit();
}



$connection->close();
?>


