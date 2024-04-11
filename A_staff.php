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
    <link rel="stylesheet" href="ro.css">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="container-1">
    <nav class="d-flex justify-content-between align-items-center nav ">
      <h2>Dashboard</h2>
      <div class="d-flex align-content-center ">
        <h6 class="text-center pe-3 align-content-center m-0 ">WELCOME :
          <?php echo ' ' . $for_admin_sesson ?>
        </h6>
      </div>
    </nav>
        <div class="sidebar">
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

        <div class="main">

            <div class="container-fluid p-0 m-0   col-12 p-0 m-0 row  d-flex justify-content-between  ">
       
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  bg-primary  p-1 m-1 rounded-2 " style="width: 20rem;">
                    <h3 class="text-center text-white ">Doctors</h3>
                    <div class="card">
                    <div class="card-header">Doctor</div>
                    <ul class="list-group list-group-flush ">
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Total Doctor    <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Present Doctor  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center">9</div></div></li>
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Absent Doctor  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center">1</div></div></li>
                    </ul>
                  </div>
                </div>
        
                  <div class=" col-12 col-sm-6 col-md-4 col-lg-3  bg-info p-1  m-1 rounded-2 "style="width: 20rem;"><h3 class="text-center">Nurces</h3>
                    <div class="card">
                    <div class="card-header">
                        Nurces
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Total Nurces <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Present Nurces <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                      <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Absent Nurces  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li> 
                     
                    </ul>
                  </div></div>
        
                  <div class=" col-12 col-sm-6 col-md-4 col-lg-3  bg-secondary   p-1  m-1 rounded-2 " style="width: 20rem;"><h3 class="text-center text-white ">Drivers</h3>
                    <div class="card">
                    <div class="card-header">
                        Drivers
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Total Drivers    <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Present Drivers  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Absent Drivers  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                    </ul>
                  </div></div>
        
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3  bg-danger p-1  m-1 rounded-2 " style="width: 20rem;"><h3 class="text-center">Secutity</h3>
                    <div class="card">
                    <div class="card-header">
                        Secutity
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Total Secutity    <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Present Secutity  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Absent Secutity  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
               
                    </ul>
                  </div></div>
                  
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3  bg-success p-1  m-1 rounded-2 " style="width: 20rem;"><h3 class="text-center">Cleaning staff</h3>
                    <div class="card">
                    <div class="card-header">
                        Cleaning staff
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Total Cleaner    <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Present Cleaner  <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Absent Cleaner  <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
                  
                    </ul>
                  </div></div>
        
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3  bg-warning p-1  m-1 rounded-2 " style="width: 20rem;"><h3 class="text-center">Maintenance</h3>
                    <div class="card">
                    <div class="card-header">
                        Maintenance
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Total    <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Present   <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-7 m-0 p-0 ">Absent   <span class="float-end " >:</span></div>  <div class="col-5 m-0 p-0 text-center ">10</div></div></li>
        
                    </ul>
                  </div></div>
        
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3 bg-dark p-1  m-1 rounded-2 " style="width: 20rem;"><h3 class="text-center text-white">Staff</h3>
                    <div class="card">
                    <div class="card-header">
                        Staff
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Total  Staff    <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Present  Staff  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
                        <li class="list-group-item   "><div class="row   m-0 p-0 ">   <div class="col-6 m-0 p-0 ">Absent  Staff  <span class="float-end " >:</span></div>  <div class="col-6 m-0 p-0 text-center ">10</div></div></li>
        
                    </ul>
                  </div>
                </div>
                </div>  
            <!-- <div class="card " style="width:1000px;height:auto;">
                <div class="card-header text-center">
                    Appointment List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>S.no</th>
                            <th> Name</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Doctor Name</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Akash</td>
                            <td>21-03-2024</td>
                            <td>Thursday</td>
                            <td>2:13 am</td>
                            <td>Rohit</td>
                            </tr>
                         
                        </tbody>
                      </table>
                  
                </div>
              
              </div>
        </div> -->
    </div>
    
</body>
</html>