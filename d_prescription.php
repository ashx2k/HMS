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
if(isset($_POST['prescription'])){
    $app_id =$_POST['app_id'];
    $app_d_id =$_POST['app_d_id'];
    $app_p_name = $_POST['app_p_name'];
    $charge = $_POST['charge'];
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Docter dashboard</title>
  <link rel="stylesheet" href="bs-5/bootstrap.min.css">
</head>


<body class="image">
 <div class="container-fluid p-0  img-fluid  sticky-top  ">
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
                    <a class="nav-link"  href="d_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_paitent.php">Paitent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="d_appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_setting.php">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="d_profile.php">Profile</a>
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
 <div class="position-relative container-fluid  ">
<div class="d-flex  justify-content-center  align-content-center">
        
        <form id="prescriptionForm" action="d_process_prescription.php" method="post" class="w-75 ">
        <h2 class="text-center ">Prescription Form</h2>
        <div class="">
        <button type="button" class="btn btn-primary" onclick="addPrescriptionField()">Add More</button>
            <button type="submit" class="btn btn-primary">Add Prescription</button></div>
            <div id="prescriptionFields">
                <div class="mb-3">
                    <label for="medicine_name" class="form-label">Medicine Name</label>
                    <input type="text" class="form-control" name="medicine_name[]" required>
                </div>
                <div class="mb-3">
                    <label for="dosage" class="form-label">Dosage</label>
                    <input type="text" class="form-control" name="dosage[]" required>
                </div>
                <div class="mb-3">
                    <label for="schedule" class="form-label">Schedule</label>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="morning[]" value="morning"> Morning
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="afternoon[]" value="afternoon"> Afternoon
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="evening[]" value="evening"> Evening
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="night[]" value="night"> Night
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="days" class="form-label">Days</label>
                    <input type="number" class="form-control" name="days[]" required>
                </div>

            <input type="hidden" value="<?php echo $app_id; ?>" name="app_id">
            <input type="hidden" value="<?php echo $app_d_id; ?>" name="app_d_id">
            <input type="hidden" value="<?php echo $app_p_name; ?>" name="app_p_name">
            <input type="hidden" value="<?php echo $charge; ?>" name="charge">
            
            <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea class="form-control" name="note[]" rows="3"></textarea>
                </div>
            </div>
            
        </form>
       
        </div>
    </div>

    <script>
        function addPrescriptionField() {
            var prescriptionFields = document.getElementById('prescriptionFields');

            var clone = prescriptionFields.cloneNode(true);

            var inputs = clone.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }

            var textareas = clone.getElementsByTagName('textarea');
            for (var i = 0; i < textareas.length; i++) {
                textareas[i].value = '';
            }

            prescriptionFields.parentNode.appendChild(clone);
        }
    </script>
 </div>

 <script src="bs-5/bootstrap.min.js"></script>

</body>

</html>

