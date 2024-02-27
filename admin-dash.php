<?php
session_start();
echo "WELCOME ".$_SESSION['UserName'];
$for_admin_sesson = $_SESSION['UserName'];
if($for_admin_sesson == true)
{ }
else
{
header ('location:admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/panel.css">
</head>
<body class="image">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-dark sidebar">
                <div class="sidebar-sticky">
                    <h3 class="text-white py-4 text-center">Hospital Admin</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="#">UserName <?php echo "".$_SESSION['UserName'];?></a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="dashboad.html">Patients</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Staff</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                      
                        
                    </ul>
                </div>
            </div>
            <!-- /Sidebar -->

            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="pt-3">
                    <h2>Welcome to the Hospital Management Admin Panel</h2>
                    <p>Select an option from the navigation menu.</p>

                </div>
            </main>
            <!-- /Content -->
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>