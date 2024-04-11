<?php 
session_start();
$for_doc_session = $_SESSION['username'];
if($for_doc_session == true)
{ }
else
{
header ('location:dlogin.php');
}
?>

<?php
include "connection.php";

$sql1 = "SELECT * FROM `d_register` WHERE `username`='$for_doc_session' ";
$d_data = mysqli_query($connection, $sql1);
if($d_data && mysqli_num_rows($d_data) > 0) {
    $d_row=mysqli_fetch_assoc($d_data);
    // echo "hello " . $d_row['UserName'];   
 } else {
  echo "No results found or query failed.";
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor profile</title>
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">
    <style>
        .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.labels {
            font-size: 18px; /* Adjust font size as needed */
            font-weight: bold; /* Make labels bold */
            margin-bottom: 5px; /* Add some space between labels */
            display: inline-block; /* Display labels in a block */
            width: 200px; /* Set a fixed width for labels */
        }
        .info {
            font-size: 18px; /* Adjust font size as needed */
            margin-bottom: 5px; /* Add some space between info */
            display: inline-block; /* Display info in a block */
            width: 300px; /* Set a fixed width for info */
        }
    </style>
</head>
<body>
<div class="container-fluid p-0  img-fluid sticky-top ">
  <!-- <img src="images/12.jpeg" alt="" class="position-absolute w-100 h-auto "> -->
  <nav class="navbar navbar-expand-md navbar-light bg-dark-subtle shadow-lg position-relative ">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="#">Doctor :<?php echo"".$for_doc_session ?></a>

  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hide"
                aria-controls="hide" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fw-bold " id="hide">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link " href="d_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_paitent.php">Paitent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_setting.php">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="d_profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ext</a>
                </li>
            </ul>
            

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" class="ps-3 pe-3 btn btn-info  " href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 </div>

 <div class="container-fluid rounded bg-white mt-1 mb-1 position-relative fs-3 ">
    <div class="row ">
        <div class="col-md-3  border-end border-danger border-5">
       
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <div class="p-0 m-0">
    <span>
        <?php
        include 'connection.php';

        // Assuming $p_uname is set somewhere in your code
        $d_uname = "$for_doc_session"; // Replace "example_user" with the actual username

        // Check if an image exists for the user
        $check_query = "SELECT image_data FROM d_image WHERE d_name = ?";
        $stmt_check = $connection->prepare($check_query);
        $stmt_check->bind_param("s", $d_uname);
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
            echo '<img src="images/doc.jpg" alt="" class="border rounded-circle" style="width: 150px; height: 150px;">';
        }

       
        ?>
        <div class="w-100 p-0 m-0">
            <button class="btn btn-sm btn-primary w-50 mb-3" data-bs-toggle="modal" data-bs-target="#d_editimg">EDIT</button>
        </div>
    </span>
</div>
                <span class="font-weight-bold"> <?php echo $d_row['FullName'];?></span>
                <span class="text-black-50"><?php echo $d_row['Email'];?></span>
                <span> <a href="d-nav.php" class="btn btn-primary " >EDIT</a></span>
            
        </div>
        </div>
        <div class="col-md-5 border-end border-danger border-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2   ">
                    <div class="col-md-6"><span class="labels">Name :</span><span class="info"><?php echo $d_row['first_name'];?></span></div>
                    <div class="col-md-6"><span class="labels">Surname :</span><span class="info"><?php echo $d_row['last_name'];?></span></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><span class="labels">Mobile Number :</span><span class="info"><?php echo $d_row['PhoneNumber'];?></span></div>
                    <div class="col-md-12"><span class="labels">Address Line 1 :</span><span class="info"><?php echo $d_row['address_line_1'];?></span></div>
                    <div class="col-md-12"><span class="labels">Address Line 2 :</span><span class="info"><?php echo $d_row['address_line_2'];?></span></div>
                    <div class="col-md-12"><span class="labels">Postcode :</span><span class="info"><?php echo $d_row['postcode'];?></span></div>
                    <div class="col-md-12"><span class="labels">State :</span><span class="info"><?php echo $d_row['state'];?></span></div>
                    <div class="col-md-12"><span class="labels">Area :</span><span class="info"><?php echo $d_row['area'];?></span></div>
                    <div class="col-md-12"><span class="labels">Email ID :</span><span class="info"><?php echo $d_row['Email'];?></span></div>
                    <div class="col-md-12"><span class="labels">Education :</span><span class="info"><?php echo $d_row['education'];?></span></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><span class="labels">Country :</span><span class="info"><?php echo $d_row['country'];?></span></div>
                    <div class="col-md-6"><span class="labels">State/Region :</span><span class="info"><?php echo $d_row['state_region'];?></span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span><h4> Edit Experience </h4> </span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in:</label><?php echo $d_row['experience_in'];?></div>
                <div class="col-md-12"><label class="labels">Additional Details:</label><?php echo $d_row['additional_details'];?></div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade  " id="d_editimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="d_img-upload.php" method="post" class=" form-control " enctype="multipart/form-data">
        <div class="mb-3 mt-2  ">
        <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <input type="hidden" name="d_id" value="<?php echo $for_doc_session?>">
         <div class="d-flex ">
          <input type="submit" name="upload" value="Upload" class="btn btn-outline-success  form-control m-2 ">

          
          </div>
        </form>
        <form action="d_img-upload.php" method="post">
              <input type="hidden" name="d_id" value="<?php echo $for_doc_session?>">
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

<?php 
$connection->close();
?>

