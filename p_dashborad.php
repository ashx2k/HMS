<?php
session_start();
$for_p_session = $_SESSION['p_UserName'];
if($for_p_session == true)
{ }
else
{
header ('location:plogin.php');
}
?>

<?php
include "connection.php";
$sql = "SELECT * FROM `p_register` WHERE `p_UserName`= '$for_p_session' ";
$query = mysqli_query($connection, $sql);
$p_data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @media (max-width: 991.98px) {
            .sidebar {
                height: auto !important;
                position: static !important;
            }
        }
     
    </style>
</head>
<body class="  ">

<nav class="navbar navbar-expand-lg bg-primary-subtle border-bottom sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hello <?php echo " : " .$for_p_session ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="p_dashborad.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pshowdoc.php">Doctor's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_prescription.php">My Prescripton</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p_my_appointment.php">My Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p_report.php">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p_bill.php">Bills</a>
                </li>
            </ul>
            <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
        </div>
    </div>
</nav>
<div class="container-fluid m-0 p-0 row ">
    <div class="sidebar bg-info-subtle fixed-top  col-md-2 col-sm-12 position-sticky order-1" style="height: 100vh; padding-top: 56.8px;">
        <h1 class="text-center"> hello</h1>
        <ul class="nav-item text-center   p-0 ">
          
          <!-- <div class="p-0 m-0 ">
            <li>
            <img src="images/p1.png " alt="" class="border rounded-circle  "  style="width: 150px; height: 150px;" >
           <div class="w-100 p-0 m-0 ">
            <button class="btn btn-sm btn-primary w-25 mb-3 " data-bs-toggle="modal" data-bs-target="#editimg" >EDIT</button>
           </div>
            </li>
            </div> -->

            <div class="p-0 m-0">
    <li>
        <?php
        include 'connection.php';

        // Assuming $p_uname is set somewhere in your code
        $p_uname = "$for_p_session"; // Replace "example_user" with the actual username

        // Check if an image exists for the user
        $check_query = "SELECT image_data FROM p_image WHERE u_name = ?";
        $stmt_check = $connection->prepare($check_query);
        $stmt_check->bind_param("s", $p_uname);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // If an image exists, display it
            $row = $result_check->fetch_assoc();
            $imageData = $row['image_data'];
            $imageBase64 = base64_encode($imageData);
            echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="" class="border rounded-circle" style="width: 150px; height: 150px;">';
        } else {
            // If no image exists, display a default image
            echo '<img src="images/pat.jpg" alt="" class="border rounded-circle" style="width: 150px; height: 150px;">';
        }

        // Close database connection
        $connection->close();
        ?>
        <div class="w-100 p-0 m-0">
            <button class="btn btn-sm btn-primary w-25 mb-3" data-bs-toggle="modal" data-bs-target="#editimg">EDIT</button>
        </div>
    </li>
</div>

     
            <li class="nav-item "><p><?php echo $p_data['p_FullName'];?></p></li>
   
            <li><p><?php echo $p_data['p_Email'];?></p></li>

            <li><p><?php echo $p_data['p_PhoneNumber'];?></p></li>

            <li class="nav-link"> <button class="btn btn-primary   w-50 ">EDIT</button> </li>
        </ul>
    </div>

  



    <div class="col-md-10 col-sm-12 order-2 row container-fluid p-0 m-0 ">

    <div id="carouselExampleControls" class="carousel slide container-fluid p-0 m-0 bg-success-subtle" style="height: auto;" data-bs-ride="carousel">
  <div class="carousel-inner bg-success-subtle container-fluid p-0 m-0 h-100% ">
    <h1 class="text-center pt-2 p-0 bg-info-subtle ">HEALTH TIPS</h1>
    
    <div class="carousel-item active  ">
      <div class="container mt-1">
        <div class="row d-flex justify-content-evenly ">

          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
                        <img src="images/water.jpg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Drink plenty of water</h5>
                            <p class="card-text flex-grow-1">Staying hydrated is essential for your overall health. Try to drink at least 8 glasses of water every day.</p>
                        </div>
                    </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
                <img src="images/food.jpg " class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Eat a balanced diet</h5>
                    <p class="card-text flex-grow-1">Include a variety of fruits, vegetables, whole grains, and lean proteins in your meals to ensure you get all the nutrients you need.</p>
                </div>
            </div>
          </div>
       
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <div class="container mt-1">
        <div class="row d-flex justify-content-evenly ">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
                <img src="images/exercise.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Get regular exercise</h5>
                    <p class="card-text flex-grow-1">Physical activity is important for maintaining a healthy weight and reducing the risk of chronic diseases. Aim for at least 30 minutes of exercise.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
          <img src="images/sleep.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Get enough sleep</h5>
                <p class="card-text flex-grow-1">Good quality sleep is essential for your physical and mental health. Aim for 7-9 hours of sleep per night.</p>       
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <div class="container mt-1">
        <div class="row d-flex justify-content-evenly ">
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
                <img src="images/Stress.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Reduce stress</h5>
                    <p class="card-text flex-grow-1">Chronic stress can negatively impact your health. Practice relaxation techniques such as deep breathing, meditation, or yoga to manage stress.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
                <img src="images/alcohol1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Limit alcohol consumption</h5>
                    <p class="card-text flex-grow-1">Excessive alcohol consumption can lead to various health problems, including liver disease. Drink alcohol in moderation, if at all.</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
    <span class="sr-only "><h1><i class="bi bi-arrow-left-circle-fill"></i></h1></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
    <span class="sr-only"><h1><i class="bi bi-arrow-right-circle-fill"></i></h1></span>
  </button>
  </div>
  
</div>

<!-- <div class="fixed-bottom offset-2 p-0  ">

    <div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
</div>


</div> -->



</div>
</div>




<div class="modal fade  " id="editimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="img-upload.php" method="post" class=" form-control " enctype="multipart/form-data">
        <div class="mb-3 mt-2  ">
        <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <input type="hidden" name="p_id" value="<?php echo $for_p_session?>">
         <div class="d-flex ">
          <input type="submit" name="upload" value="Upload" class="btn btn-outline-success  form-control m-2 ">

          
          </div>
        </form>
        <form action="img-upload.php" method="post">
              <input type="hidden" name="p_id" value="<?php echo $for_p_session?>">
              <input type="submit" name="Delete" value="Delete" class="btn btn-outline-danger   form-control m-2 ">
          </form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="bs-5/bootstrap.bundle.min.js"></script>
</body>
</html>


