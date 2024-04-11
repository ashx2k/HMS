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
include 'connection.php';
$rep = "SELECT * FROM `report_upload` WHERE `p_id`='$for_p_session'";
$query_rep=mysqli_query($connection,$rep);
$rep=mysqli_fetch_assoc($query_rep);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary-subtle     border-bottom sticky-top ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Hello <?php echo " : " .$for_p_session ?></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center  " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1 ">
        <li class="nav-item">
          <a class="nav-link "  href="p_dashborad.php">Home</a>
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
          <a class="nav-link active" aria-current="page" href="p_report.php">Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_bill.php">Bills</a>
        </li>
        
        
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
     
      
        <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
      
    </div>
  </div>
</nav>
<div class="">
  <div class="container">
    
    <div class="row">
    
    <div class=" bg-warning-subtle  shadow-lg d-flex mt-2 justify-content-between ">
      <div class="align-content-center "> 
        <h4 class="m-2 ">View Report</h4> 
      </div>
      <div class=" align-content-center">
      <a type="icon"  class="border-0" data-bs-toggle="modal" data-bs-target="#upload_report"> 
        <i class="bi bi-plus-square-fill"></i>
    </a>
    </div>
  </div>
  <div class="container mt-2   ">
  <table class="table table-responsive border-1  ">
    <thead class="bg-black ">
        <tr class="bg-danger text-center  ">
            <th class="border-2  ">File Name</th>
            <th class="border-2  ">Upload Date</th>
            <th class="border-2  ">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rep = "SELECT * FROM `report_upload` WHERE `p_id`='$for_p_session'";
        $query_rep = mysqli_query($connection, $rep);
        while ($row_r = mysqli_fetch_assoc($query_rep)) 
        {
          ?>
            <tr>
            <td class="border-2   "><?php echo $row_r['file_name']?></td>
            <td class="border-2   "><?php echo $row_r['upload_date'] ?></td>
            <td class="border-2  text-center  ">
              <a href="download.php?id=<?php echo $row_r['id'] ?>" class="btn btn-primary align-self-center ">Download</a>
             <a href="del.php?id=<?php echo $row_r['id'] ?>" class="btn btn-danger  align-self-center ">Delete</a>
            </td>
            </tr>
        <?php
         }
        ?>
    </tbody>
</table>
  </div>
</div>
</div>




    

<div class="modal fade $modal-fade-transform $modal-show-transform $modal-transition $modal-scale-transform  " 
id="upload_report"  aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered  ">
    <div class="modal-content bg-black ">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-white " id="exampleModalLabel">Upload Report</h1>
        <button type="button" class="btn-close bg-danger  " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="img-upload.php" method="post" enctype="multipart/form-data">
          <input type="file" class="form-control mb-2 " name="report">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
          <input type="hidden" name="p_id" value="<?php echo $for_p_session?>">
          <div class="mt-3 d-flex  justify-content-center ">
          <button type="submit" name="p_report" class="btn btn-warning w-75 ">Upload</button>
          </div>
        </form>
      </div>

      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary w-25 " data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





    <script src="bs-5/bootstrap.bundle.min.js"></script>
    <!-- <script src="bs-5/bootstrap.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>