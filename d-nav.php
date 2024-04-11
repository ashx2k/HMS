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

<div class="container-fluid rounded bg-white mt-1 mb-1 position-relative">
    <div class="row">
        <div class="col-md-3 border-end border-danger border-5 ">
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
    </span>
</div>
                <span class=" fw-bolder  mt-3 fs-2 "> <?php echo $d_row['FullName'];?></span>
                <span class="text-black-50 mt-3 fw-bold fs-4  "><?php echo $d_row['Email'];?></span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-end border-danger border-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" action="save_profile.php">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input name="first_name" type="text" class="form-control"  value="<?php echo $d_row['first_name'];?>" placeholder="First name"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input name="last_name" type="text" class="form-control" value="<?php echo $d_row['last_name'];?>" placeholder="Surname"></div>
                    </div>
                    <input type="hidden" name="doc_id" value="<?php echo $d_row['ID'];?>">
                    <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $d_row['PhoneNumber'];?>"  name="phone"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $d_row['address_line_1'];?>" name="addr1"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $d_row['address_line_2'];?>" name="addr2"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter pincode" value="<?php echo $d_row['postcode'];?>" name="pincode"></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $d_row['state'];?>" name="state"></div>
                    <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $d_row['area'];?>" name="area"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $d_row['Email'];?>" name="email"></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="<?php echo $d_row['education'];?>" name="education"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="<?php echo $d_row['country'];?>" name="country"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="<?php echo $d_row['state_region'];?>" placeholder="state" name="state_region"></div>
                </div>
                    
                    <div class="mt-5 text-center "><button name="submit" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <form method="post" action="save_experience.php">
                <input type="hidden" name="doc_id1" value="<?php echo $d_row['ID'];?>">
                    <div class="col-md-12"><label class="labels">Experience in </label><input name="experience_in" type="text" class="form-control" placeholder="Experience" value="<?php echo $d_row['experience_in'];?> "></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input name="additional_details" type="text" class="form-control" placeholder="Additional details" value="<?php echo $d_row['additional_details'];?> "></div>
                    <div class="mt-3 text-center"><button name="submit" class="btn btn-primary profile-button" type="submit">Save Experience</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php 
$connection->close();
?>

