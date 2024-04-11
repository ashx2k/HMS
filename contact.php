<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/contact.css"> -->
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
    <title>Contact Us - Hospital Management Project</title>
    <style>body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    
    .box {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    header {
        text-align: center;
        margin-bottom: 20px;
    }
    
    h1 {
        color: #333;
    }
    
    h2 {
        color: #3498db;
    }
    
    form {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    
    input,
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    button {
        background-color: #3498db;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font:bold ;
    }
    
    button:hover {
        background-color: #258cd1;
    }
    
    #contact-info {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 8px;
    }
    
    address {
        font-style: normal;
        line-height: 1.6;
    }
    
    </style>
</head>
<body>
    <div class="box">
        <header>
            <h1>Contact Us</h1>
        </header>
        
        <section id="contact-form">
            <h2>Get in Touch</h2>

            <form action="" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

        </section>

        <section id="contact-info">
            <h2>Contact Information</h2>
            <p>If you have any questions or concerns, feel free to reach out to us using the information below:</p>

            <address>
                <strong>[Hospital Name]</strong><br>
                [Hospital Address]<br>
                [City, State, Zip Code]<br>
                Phone: [Your Phone Number]<br>
                Email: [Your Email Address]
            </address>
        </section>
    </div>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'connection.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
 
    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully.'); window.location.href = 'index.html';</script>";
        exit();
    }
     else {

        echo "Error: " .$connection->error;
    }

    $connection->close();
}
?>
