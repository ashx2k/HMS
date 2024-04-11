<?php
// Include database connection
include_once 'connection.php';

// Check if the ID parameter is set and not empty
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Prepare a delete statement
    $sql = "DELETE FROM report_upload WHERE id = $id";

    // Execute the delete statement
    if(mysqli_query($connection, $sql)) {
        // Delete successful
        echo "File deleted successfully.";
        header('Location: p_report.php');
        exit();
    } else {
        // Error in deletion
        echo "Error deleting file: " . mysqli_error($connection);
        header('Location: p_report.php');
        exit();
    }
} else {
    // ID parameter not provided or empty
    echo "Invalid file ID.";
    header('Location: p_report.php');
    exit();
}

// Close database connection
mysqli_close($connection);
?>
