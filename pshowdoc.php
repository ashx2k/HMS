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
$sql = " SELECT * FROM d_register ";
 $result = $connection->query($sql);
 $connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs-5\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary-subtle     border-bottom  sticky-top ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Hello <?php echo "" .$for_p_session ?></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center  " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1 ">
        <li class="nav-item">
          <a class="nav-link " href="p_dashborad.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active "aria-current="page" href="pshowdoc.php">Doctor's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_prescription.php">My Prescripton</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_my_appointment.php">My Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p_report.php">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="p-bill.php">Bills</a>
        </li>
        
      </ul>
     
      
        <a href="logout.php"><button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure you want to logout?');">Logout</button></a>
      
    </div>
  </div>
</nav>

<div class="container-fluid p-0 bg-dark  ">
<!-- <img src="images/11.jpeg " alt="" class="w-100 h-auto position-absolute   "> -->

<div class="container  position-relative pt-5  ">
<div class="table-responsive">
    <table class="rounded-2  table table-striped table-bordered      ">
        <tr class="border-5 bg-primary-subtle opacity-100 cursor-pointer ">
            <th class="border-2 text-center cursor-pointer cursor-not-allowed cursor-resize" scope="col" >SR NO</th>
            <th class="border-2 text-center cursor-pointer cursor-not-allowed cursor-resize" scope="col" >Name</th>
            <th class="border-2 text-center cursor-pointer cursor-not-allowed cursor-resize" scope="col" >Specialiation</th>
            <th class="border-2 text-center cursor-pointer cursor-not-allowed cursor-resize" scope="col" >Charges</th>
            <th class="border-2 text-center cursor-pointer cursor-not-allowed cursor-resize" scope="col" >Book Appointment</th>
        </tr>
        <?php 
                 while($row=$result->fetch_assoc())
                 {
             ?>
             <tr class="bg-success-subtle">
                <td class="border-2 text-center text-capitalize "><?php echo $row['ID'];?></td>
                <td class="border-2  text-capitalize "><?php echo $row['FullName'];?></td>
                <td class="border-2  text-capitalize "><?php echo $row['Specilization'];?></td>
                <td class="border-2 text-center text-capitalize "><?php echo $row['appointment-charge'];?></td>
                <td class="border-2 text-center text-capitalize "><form action="appontment_book.php" method="post">
                    <input type="hidden" name="book" value="<?php echo $row['ID']; ?>">
                    <button type="submit" class="btn bg-primary w-75 fw-bold   "><i class="bi bi-bandaid"></i> Book <i class="bi bi-capsule-pill"></i></button>
</form></td>
             </tr>
             <?php
                 }
             ?>
    </table>
</div>
</div>



</div>

    <script src="bs-5/bootstrap.bundle.min.js"></script>
    <!-- <script src="bs-5/bootstrap.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

<?php
if(isset($_post['book'])){
    $doc_id=$_post['ID'];
}


?>