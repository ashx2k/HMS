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
    <title>Hospital Management Admin Panel</title>

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="bs-5/bootstrap.min.css">

    <link rel="stylesheet" href="css/panel.css">
</head>

<body class="image bg-dark-subtle  overflow-x-hidden overflow-y-hidden" >
    <div class="container-fluid p-0 m-0 ">
        
        <div class="nav-cont container-fluid  p-0 m-0 position-relatives ">
   


        <nav class="navbar sticky-top navbar-dark bg-dark    d-block d-md-none">
            <div class="container-fluid row ">
            <div class="navbar-brand col-6 p-0 m-0 ps-2 ">Admin : <span class="fw-bold text-uppercase "></span> </div>
              <div class="col-6 pe-2  p-0 m-0">
                
                <button class="navbar-toggler float-end " type="button" 
                data-bs-toggle="collapse" data-bs-target="#lgNavbar" aria-controls="lgNavbar" 
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse text-center " id="lgNavbar">
                  <ul class="nav flex-column">
                      
                      <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link" href="dashboad.html">Patients</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
                      <li class="nav-item"><a class="nav-link" href="staff.php" target="iframe_a">Staff</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                  </ul>
              </div>
            </div>
        </nav>


        <div class=" d-none d-md-block bg-dark sidebar h-100 position-fixed   " >
                        <div class="sidebar-sticky p-3 ">
                            <h4 class="text-white py-3 mt-3 text-center">Hospital Admin</h4>
                            <ul class="nav flex-column ">
                                <li class="nav-item"><a class="nav-link" href="#"></a></li>
                                <li class="nav-item"><a class="nav-link active" href="#" onclick="showSection('dashboard')">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('add-job-content')">Patients</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('staff')">Staff</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                <!-- <li class="nav-item fixed-bottom text-white p-0 m-0 bg-danger "><a class="nav-link" href="#">akash</a></li> -->
        
                            </ul>
                        </div>
                       
                    </div>

<!-- <div class=" d-none d-sm-block bg-dark sidebar  " >
                <div class="sidebar-sticky p-3 ">
                    <h4 class="text-white py-3 mt-3 text-center">Hospital Admin</h4>
                    <ul class="nav flex-column ">
                        <li class="nav-item"><a class="nav-link" href="#"><?php echo "" . $_SESSION['UserName']; ?></a></li>
                        <li class="nav-item"><a class="nav-link active" href="#" onclick="showSection('dashboard')">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('add-job-content')">Patients</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('staff')">Staff</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <li class="nav-item fixed-bottom text-white p-0 m-0 bg-danger "><a class="nav-link" href="#">akash</a></li>

                    </ul>
                </div>
               
            </div> -->

            </div>



            <div class="  m-0 p-0 row " id="content" >
              

<!-- dashboad -->
<div class="jobs p-0 col-12 ">
            <div id="dashboard" class="content-section">
                
                
                <form action="#" method="post">
                    <h1 class="FormTitle">New Job</h1>
                   
                    <label for="companyName">Company Name:</label>
                    <input type="text" id="companyName" name="companyName" required> <br>
            
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required><br>
            
            
                    <label for="jobCategory">Job Category:</label>
                    <select id="jobCategory" name="jobCategory" required>
                        <option value="Security-Analyst">Security Analyst</option>
                        <option value="Java-Developer">Java Developer</option>
                        <option value="Web-Developer">Web Developer</option>
                        <option value="Graphic-Designer">Graphic Designer</option>
                    </select><br>
            
                    <label for="jobType">Job Type:</label>
                    <select id="jobType" name="jobType" required>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                        <option value="temporary">Temporary</option>
                    </select><br>

                    <label for="No.ofVacancy">No. of Vacancy:</label>
                    <input type="number" id="No.ofVacancy" name="noOfVacancy" required><br>

                    <label for="SelectExperience">Select Experience:</label>
                    <select id="SelectExperience" name="SelectExperience" required>
                        <option value="1-yr">1 yr</option>
                        <option value="2-yr">2 yr</option>
                        <option value="3-yr">3 yr</option>
                        <option value="4-yr">4 yr</option>
                    </select><br>
                     
                    <label for="postedDate">Posted Date:</label>
                    <input type="date" id="postedDate" name="postedDate" required><br>
            
                    <label for="lastDateToApply">Last Date To Apply:</label>
                    <input type="date" id="lastDateToApply" name="lastDateToApply" required><br>

                    <label for="CloseDate">Close Date:</label>
                    <input type="date" id="CloseDate" name="CloseDate" required><br>

                    <label for="SelectGender">Select Gender::</label>
                    <select id="SelectGender" name="SelectGender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select><br>
            
                    <label for="SalaryFrom">Salary From:</label>
                    <input type="number" id="SalaryFrom" name="SalaryFrom" required><br>

                    <label for="SalaryTo">Salary To:</label>
                    <input type="number" id="SalaryTo" name="SalaryTo" required><br>

                    <label for="Location">Location:</label>
                    <select id="Location" name="Location" required>
                        <option value="Male">On-site</option>
                        <option value="Female">Remote</option>
                    </select><br>
                 <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea><br>
            
                    <button type="submit" name="submit">Submit</button><br>
                </form>
            
            </div>
            </div>
        
<!-- dashboad end -->

<!-- Patients  -->
<div class="container-fluid p-0 m-4 justify-content-end   justify-content-sm-center  content-section " id="staff" >
       
        
          
         
        
       
    </div>
<!-- Patients end -->

<!-- Appointments  -->
<div class="appointment">
            <div id="appointment" class="content-section">
                
                
                <form action="#" method="post">
                    <h1 class="FormTitle">New Job</h1>
                    <label for="companyName">Company Name:</label>
                    <input type="text" id="companyName" name="companyName" required>
            
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required>
            
            
                    <label for="jobCategory">Job Category:</label>
                    <select id="jobCategory" name="jobCategory" required>
                        <option value="Security-Analyst">Security Analyst</option>
                        <option value="Java-Developer">Java Developer</option>
                        <option value="Web-Developer">Web Developer</option>
                        <option value="Graphic-Designer">Graphic Designer</option>
                    </select>
            
                    <label for="jobType">Job Type:</label>
                    <select id="jobType" name="jobType" required>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                        <option value="temporary">Temporary</option>
                    </select>

                    <label for="No.ofVacancy">No. of Vacancy:</label>
                    <input type="number" id="No.ofVacancy" name="noOfVacancy" required>

                    <label for="SelectExperience">Select Experience:</label>
                    <select id="SelectExperience" name="SelectExperience" required>
                        <option value="1-yr">1 yr</option>
                        <option value="2-yr">2 yr</option>
                        <option value="3-yr">3 yr</option>
                        <option value="4-yr">4 yr</option>
                    </select>
                     
                    <label for="postedDate">Posted Date:</label>
                    <input type="date" id="postedDate" name="postedDate" required>
            
                    <label for="lastDateToApply">Last Date To Apply:</label>
                    <input type="date" id="lastDateToApply" name="lastDateToApply" required>

                    <label for="CloseDate">Close Date:</label>
                    <input type="date" id="CloseDate" name="CloseDate" required>

                    <label for="SelectGender">Select Gender::</label>
                    <select id="SelectGender" name="SelectGender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
            
                    <label for="SalaryFrom">Salary From:</label>
                    <input type="number" id="SalaryFrom" name="SalaryFrom" required>

                    <label for="SalaryTo">Salary To:</label>
                    <input type="number" id="SalaryTo" name="SalaryTo" required>

                    <label for="Location">Location:</label>
                    <select id="Location" name="Location" required>
                        <option value="Male">On-site</option>
                        <option value="Female">Remote</option>
                    </select>
                 <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
            
                    <button type="submit" name="submit">Submit</button>
                </form>
            
            </div>
            </div>
        
<!-- Appointments end -->

<!-- staff  -->
<div></div>
<!-- staff end -->

<!-- Reports  -->
<div></div>
<!-- Reports end -->

<!-- Settings -->
<div></div>
<!-- Settings end -->
            </div>
</div>

<script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
        }

        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
        
    </script>

    <script src="bs-5/bootstrap.min.js"></script>

</body>

</html>