<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="ap.css">
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="user_management.php">User Management</a></li>
                <!-- Add more menu options based on your requirements -->
            </ul>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
        <div class="content">
            <!-- Content will be loaded dynamically based on the selected menu option -->
        </div>
    </div>
</body>
</html>
