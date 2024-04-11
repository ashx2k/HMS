<?php
include 'connection.php';
if(isset($_GET['p_id'])) {

    $file_id = $_GET['p_id'];

    $fetch_query = "SELECT * FROM report_upload WHERE id = ?";
    $stmt_fetch = $connection->prepare($fetch_query);
    $stmt_fetch->bind_param("i", $file_id);
    $stmt_fetch->execute();
    $result = $stmt_fetch->get_result();

    if($result->num_rows > 0) {
        $file_data = $result->fetch_assoc();

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_data['file_name'] . '"');
        header('Content-Length: ' . $file_data['file_size']);

        echo $file_data['file_content'];
        header('Location: d_paitent.php');
        exit();
    } else {
        echo "File not found.";
        header('Location: d_paitent.php');
        exit();
    }
} else {
    echo "Invalid request.";
    header('Location: d_paitent.php');
    exit();
}

?>
