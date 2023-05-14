<?php
include './php/dbconnect.php';
session_start();
if (!isset($_SESSION["adminLogin"])) {
    header("location:AdminLogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">

    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="./css/application.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <title>Application Page</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg  navbar-dark border-bottom p-3 shadow-sm navbar-setbackground">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="AdminDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recruiter.php">Recruiter</a>
                    </li>

                    <li class="nav-item active dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="job.php">Jobs</a></li>
                            <li><a class="dropdown-item" href="application.php">Application</a></li>
                            <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>

                            <!-- <li><a class="dropdown-item" href="#">Live Chatting</a></li>
                            <li> -->
                    </li>
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <div class="profile_pic" style=" width: 50px;
    height: auto;">
                        <a class="nav-link" href="#" id="image-link">
                            <img src="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" id="image-1" style="width: 40px; height: auto;" alt=""></a>
                        <a class="nav-link" href="#" id="edit_profile_button">Edit Profile</a>
                    </div>
                </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Main Content -->

    
    <div class="table-1">
        <h3 class="heading-1">List of Application</h3>

        <div class="row" style="margin-left: 5px; margin-top: 25px; margin-bottom: 10px;">
            <div class="col-sm">
            <a class="btn btn-primary" href="report.php" role="button" target="_blank">Generate Report</a>
            </div>
        </div>
        <div class="tabledata">
            <table>
                <thead>
                    <tr>
                        <th>Appl. No</th>
                        <th>Student Name</th>
                        <th>Company Name</th>
                        <th>Job Name</th>
                        <th>Apply Date</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <tbody id="tablebody">

                </tbody>
            </table>
        </div>
    </div>






     <!-- footer -->

     <style> 
    .footer{
        width: 100%;
        height: 20vh;
        background-color: black;
        padding-top: 10px;
        color: white;
    }
</style>
    <div class="footer">
    <div class="container mt-5" >
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24" style="color: white;">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text" style="color: white;">© 2023, GUNI Placementcell.</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex " style="color: white;">
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter" style="color: white;"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram" style="color: white;"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook" style="color: white;"></i></a></li>
            </ul>
        </footer>
    </div>
    </div>
    <script src="../jquery/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        window.onload = function() {
            fetchAlldata();
        };
        //Global variable 
        var obj;
        // Fetch data from table
        function fetchAlldata() {
            var XRH = new XMLHttpRequest();
            XRH.onload = function() {
                obj = JSON.parse(this.responseText);

                var tableData = '';
                for (let application of obj) {
                    tableData +=
                        '<tr><td>' + application.application_on + '</td><td>' + application.studentName + '</td><td>' + application.companyName + '</td><td>' + application.jobTitle + '</td><td>' + application.applyedDate + '</td><td><a href="../student/Resume/' + application.studentResume + '" target="_blank">view</a></td></tr>';
                }

                document.getElementById('tablebody').innerHTML = tableData;

            }
            XRH.open('POST', './php/getApplicationDetails.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();
        }
    </script>


</body>

</html>