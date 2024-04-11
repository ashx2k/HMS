<?php
session_start();
$for_admin_sesson = $_SESSION['UserName'];
if ($for_admin_sesson == true) {
} else {
    header('location:admin.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="rohit.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">


<body>
    <div class="container-1">
        <nav class="d-flex justify-content-between align-items-center  "> 
          <h2>Dashboard</h2>
          <div class="d-flex align-content-center ">
          <h6 class="text-center pe-3 align-content-center m-0 ">WELCOME : <?php echo' '.$for_admin_sesson ?></h6>
          </div>
        </nav>


        <main>
            
                
        <div class="row d-flex justify-content-center align-content-center ">
    <div class="col-sm-12 col-md-4">
      <div class="card" style="width: 18rem;height: 12rem;">
      <div class="d-flex justify-content-center pt-3">
        <img src="1.jpg" style="width:90px; height: auto;" class="card-img-top rounded-circle " alt="..."></div>
        <div class="card-body p-1 ">
          <h5 class="card-title text-center ">Doctor</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center ">10</li>
          
        </ul>
       
      </div>
    </div>

    <div class="col-sm-12 col-md-4">
      <div class="card" style="width: 18rem ; height: 12rem;">
      <div class="d-flex justify-content-center pt-3">
        <img src="2.png" style="width:90px; height: auto;" class="card-img-top rounded-circle " alt="..."></div>
        <div class="card-body p-1 ">
          <h5 class="card-title text-center m-0 ">Nurse</h5>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center ">100</li>
          
        </ul>
       
      </div>
    </div>

    <div class="col-sm-12 col-md-4">
      <div class="card" style="width: 18rem;height: 12rem;">
      <div class="d-flex justify-content-center pt-3 ">
        <img src="3.png" style="width:90px; height: auto;" class="card-img-top rounded-circle " alt="..."></div>
        <div class="card-body p-1 ">
          <h5 class="card-title text-center ">Patient</h5>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center ">1000</li>
          
        </ul>
       
      </div>
    </div>


    
  </div>
              
        </main>

        <!-- SIDEBAR  -->
        <div id="sidebar">
            <div class="brand-name">
              
                <h1>HOSPITAL</h1>
             </div>
             <ul>
                <li><a href="A_Patients.php"><i class="bi bi-person"></i>&nbsp;&nbsp;Patients</a></li>
                <li><a href="A_appointments.php"><i class="bi bi-journal"></i>&nbsp;&nbsp;Appoinments</a></li>
                <li><a href="A_Staff.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Staff</a></li>
                <li><a href="A_Payments.php"><i class="bi bi-journal-plus"></i>&nbsp;&nbsp;Payments</a></li>
                <li><a href="A_setting.php"><i class="bi bi-gear"></i>&nbsp;&nbsp;Setting</a></li>
                <li><a href="Logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
             </ul>
        </div>
        <!-- CONTENT-1 -->
        <div id="content1" class="row ">
            <div class="col-12 text-center container-fluid "><h2 class=" bg-info ">Contact Us</h2></div>
            <div class="container-fluid d-flex justify-content-evenly  ">
        <?php
include 'connection.php';

$query2 = "SELECT `id`,`name`, `email`, `message`, `created_at` 
          FROM `contact` 
          ORDER BY `created_at` DESC 
          LIMIT 3";

$qresult = mysqli_query($connection, $query2);

if (mysqli_num_rows($qresult) > 0) {
  $no=5;
    // Output data of each row
    while ($c_row = mysqli_fetch_assoc($qresult)) {
      ?> 
   
      <div class="card" style="width: 20rem;">
  <img src="<?php echo $no?>.jpg" class="card-img-top " alt="...">
  <div class="card-body p-1 ps-3 pe-3 ">
    <h4 class="card-title m-0 ">Request id : <?php echo $c_row['id']; ?></h4>
    <p class="card-text m-0 ">Name : <?php echo ' ' .$c_row['name']; ?></p>
    <p class="card-text m-0 ">Email : <?php echo ' ' .$c_row['email']; ?></p>
    <p class="card-text m-0 ">Message : <?php echo ' ' .$c_row['message']; ?></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

<?php
$no++;
}
} else {
    echo "No records found.";
}

mysqli_close($connection); // Close the database connection
?>

        </div>
      </div> 


        <div class="sidebar-2">
        <div class="emerg"style="height:100%;width: full;">
  <div class="card-header bg-danger text-center sticky-top ">
   Emergency Alert
  </div>
  <?php
include 'connection.php';


$query = "SELECT `e_ID`, `e_FullName`, `e_Number`, `e_type`, `e_detail`, `request_at` 
          FROM `emergency` 
          ORDER BY `request_at` DESC";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
  <div class="card-body m-2 card" >
  <div class="card" style="width:14rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name : <?php echo''. $row["e_FullName"];?></li>
    <li class="list-group-item">Number : <?php echo''. $row["e_Number"];?></li>
    <li class="list-group-item">Type : <?php echo''. $row["e_type"];?> </li>
    <li class="list-group-item"><?php echo''. $row["e_detail"];?></li>
  </ul>
</div>

<button type="button" class="btn btn-primary mt-2 send-ambulance-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row["e_ID"]; ?>">
    SEND AMBULANCE
</button>
  </div>

  <?php
}
} else {
    echo "No records found";
}

mysqli_close($connection); // Close the database connection
?>
  
 

  

  

  
</div>

        </div>
        <footer>
          <div class="end">
        <a href="#"><i class="bi bi-twitter mt-1" ></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  </div>
        </footer>
    </div>

   
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Ambulance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sendAmbulanceForm" method="post" action="">
                  
                <input type="radio" id="html" name="req" value="Accept">
                <label for="html">Accept</label><br>
                <input type="radio" id="css" name="req" value="Reject">
                <label for="css">Reject</label><br>

                    <button class="btn btn-primary ">SEND AMBULANCE</button>
                 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendAmbulance()">Send Ambulance</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to capture data-id value and store it in hidden input field
    function sendAmbulance() {
        var eventId = document.querySelector('#exampleModal').getAttribute('data-id');
        document.getElementById('eventId').value = eventId;

        // Submit the form
        document.getElementById('sendAmbulanceForm').submit();
    }
</script>



<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




    
</body>
</html


