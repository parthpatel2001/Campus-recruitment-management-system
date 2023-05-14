<?php
session_start();
if (!isset($_SESSION["recruiter"])) {
    header("location:recruiterLogin.php");
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
    <link rel="stylesheet" type="text/css" href="css/job.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <title>JOB Management</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg   navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="recruiterDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="rjob.php">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="application.php">Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="schedule.php   ">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>


                    <li class="nav-item">
                        <div class="profile_pic" style=" width: 50px;
    height: auto;">
                            <a class="nav-link" href="recruiterEditProfile.php" id="image-link">
                                <img src="Profile/<?php echo $_SESSION['recruiterProfilepic']; ?>" id="image-1" style="width: 40px; height: auto;" alt=""></a>
                            <a class="nav-link" href="recruiterEditProfile.php" id="edit_profile_button">Edit Profile</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <style>
        .main-body {
            width: 100%;
            height: auto;
        }
    </style>
    <!-- Design job section -->

    <div class="main-body">
        <h3 style="text-align: center;">List of Job</h3>
        <div class="alert alert-success alert-dismissible fade show" style="display: block; width: 90%; margin:auto;" role="alert" id="successAlert">
            <span id="successAlertMsg"></span>
        </div>

        <div class="filer-option">

            <div class="col1">
                <a class="btn btn-dark" style="float: left; text-decoration: none; color: white;" href="jobForm.php" role="button">Add New Job</a>

            </div>
            <div class="col1" style="display: flex;">
                <label for="type" style="padding-top: 7px; padding-right: 5px;">Select Job Type : </label>
                <select class="form-select w-50 " style="float: right;" id="type" aria-label="Default select example" onchange="fetchAlldata()">
                    <option value="all" selected>All</option>
                    <option value="Only Internship">Only Internship</option>
                    <option value="ij">Internship + Job</option>
                    <option value="Only Job">Only Job</option>
                </select>
            </div>
            <div class="col1">
                <div class="form-inline d-flex w-100 " style="margin-left: 10px;">
                    <input class="form-control mr-sm-2" type="number" placeholder="Enter a Job ID" aria-label="Search" name="jobId" id="jobId">
                    <button class="btn  btn-dark my-2 my-sm-0" type="submit" style="margin-left: 20px;" onclick="searchJob()">Search</button>

                </div>
            </div>

        </div>

        <div id="list_section" style="min-height: 50vh;">

        </div>


        <!-- Delete Job Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete a Recruiter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 20px;"> Are you sure to Delete a Job?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="deleteJob()">Delete</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->

        <style>
            .footer {
                width: 100%;
                height: 20vh;
                background-color: black;
                padding-top: 10px;
                color: white;
            }
        </style>
        <div class="footer">
            <div class="container mt-5">
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
            }
            //Global Variable
            var jobId = "";
            // var deleteModal = document.getElementById('deleteModal');

            function fetchAlldata() {
                var type = document.getElementById('type').value;
                var data = "type=" + type;
                var tabledata = "";
                var XRH = new XMLHttpRequest();
                XRH.onload = function() {
                    var recruiter = JSON.parse(this.responseText);
                    if (recruiter == "") {
                        document.getElementById('list_section').innerHTML = '<h2 style="text-align:center;"> No data available....!!</h2>';
                    } else {
                        for (let job of recruiter) {
                            tabledata +=
                                '<div class="card mb-3" style="max-width: 100%; padding-bottom: 10px; margin: auto;"><div class="row g-0"><div class="col-md-4" style=" display : flex; justify-content : center; align-item : center; padding :20px 25px;  "><img src="./company logo/' +
                                job.companyLogo +
                                '" class="img-fluid rounded-start"style=" display : block; width : 75%; height: auto; margin:auto; " alt="..."></div><div class="col-md-8"><div class="container"><div class="row " id="row1" style="padding-top: 10px;"><div class="col-sm"><p class="card-text" id="mode"><b>Job Id : </b>' + job.jobId +
                                '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                                job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                                .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                                ' </p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                                '</p></div><div class="col-sm"><p class="card-text" id="salary"><b>Package : </b>' + job
                                .jobSalary + ' LPA</p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                                '</p><p class="card-text" id="experience"><b>Experience : </b>' + job.jobExperience +
                                '</p><p class="card-text" id="experience"><b>Website link : </b><a href="' + job
                                .companyWebsite + '">' + job.companyWebsite +
                                '</a></p></div></div><!-- Card for mobile view --><div class="row" id="row2" style="padding-top: 10px; "><div class="col-sm"><p class="card-text" id="mode"><b>Job Id : </b>' + job.jobId +
                                '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                                job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                                .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                                ' </p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                                '</p></div></div><div class="row"><div class="col-sm"><div style="float: right;"><a class="btn btn-dark" style="margin-right: 10px;" href="jobUpdate.php?jobId=' +
                                job.jobId + '" role="button">Update</a><button type="button" id="' +
                                job.jobId +
                                '"class="btn btn-dark"style="margin-right: 2px;" data-bs-toggle="modal"  data-bs-target="#deleteModal" onclick="getJobDetails(this.id)">Delete</button></div></div></div></div></div></div></div>';
                        }
                        document.getElementById('list_section').innerHTML = tabledata;
                    }
                }


                XRH.open('POST', './php/getJobdetails.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send(data);
            }

            function getJobDetails(val) {
                jobId = val;
            }

            function deleteJob() {
                data = "id=" + jobId;
                // console.log(studentId);
                var obj;
                var XRH = new XMLHttpRequest();
                XRH.onload = function() {
                    console.log(this.response);
                    obj = JSON.parse(this.responseText);
                    if (obj.status) {
                        console.log(obj.msg);
                        showSuccessAlert(obj.msg);
                        $('#deleteModal').modal('hide');

                        fetchAlldata();
                        document
                    }
                }
                XRH.open('POST', './php/deleteJob.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send(data);
            }


            function showSuccessAlert(msg) {
                $("#successAlert").fadeTo(2000, 500).slideUp(500, function() {
                    $("#successAlert").slideUp(500);
                });
                document.getElementById("successAlertMsg").innerHTML = msg;
            }
            $(document).ready(function() {
                $("#successAlert").hide();
            });


            function searchJob() {
                var id = document.getElementById('jobId').value;
                var XRH = new XMLHttpRequest();
                XRH.onload = function() {

                    var jobData = JSON.parse(this.responseText);
                    var job = "";

                    if (job = jobData.find(o => o.jobId === id)) {
                        tabledata =
                            '<div class="card mb-3" style="max-width: 100%; padding-bottom: 10px; margin: auto;"><div class="row g-0"><div class="col-md-4" style=" display : flex; justify-content : center; align-item : center; padding :20px 25px;  "><img src="./company logo/' +
                            job.companyLogo +
                            '" class="img-fluid rounded-start"style=" display : block; width : 75%; height: auto; margin:auto; " alt="..."></div><div class="col-md-8"><div class="container"><div class="row " id="row1" style="padding-top: 10px;"><div class="col-sm"><p class="card-text" id="mode"><b>Job Id : </b>' + job.jobId +
                            '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                            job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                            .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                            ' </p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                            '</p></div><div class="col-sm"><p class="card-text" id="salary"><b>Package : </b>' + job
                            .jobSalary + ' LPA</p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                            '</p><p class="card-text" id="experience"><b>Experience : </b>' + job.jobExperience +
                            '</p><p class="card-text" id="experience"><b>Website link : </b><a href="' + job
                            .companyWebsite + '">' + job.companyWebsite +
                            '</a></p></div></div><!-- Card for mobile view --><div class="row" id="row2" style="padding-top: 10px; "><div class="col-sm"><p class="card-text" id="mode"><b>Job Id : </b>' + job.jobId +
                            '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                            job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                            .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                            ' </p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                            '</p></div></div><div class="row"><div class="col-sm"><div style="float: right;"><a class="btn btn-primary" style="margin-right: 10px;" href="jobUpdate.php?jobId=' +
                            job.jobId + '" role="button">Update</a><button type="button" id="' +
                            job.jobId +
                            '"class="btn btn-primary"style="margin-right: 2px;" data-bs-toggle="modal"  data-bs-target="#deleteModal" onclick="getJobDetails(this.id)">Delete</button></div></div></div></div></div></div></div>';

                        document.getElementById('list_section').innerHTML = tabledata;

                    } else {
                        document.getElementById('list_section').innerHTML = '<h3 style="text-align:center;">No found any jobs ...!!!</h3>';

                    }

                }
                XRH.open('POST', './php/getAllJobDetails.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send();
            }
        </script>
</body>

</html>