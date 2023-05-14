<?php
include '../dbconnect.php';
session_start();
if(!isset($_SESSION["student"]))
{
    header("location:studentLogin.php");
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
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <title>Schedule</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg  navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="image/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="myApplication.php">My Application</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="myJob.php">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="schedule.php">Schedule</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Live chatting</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <div class="profile_pic" style="width: 60px; height: auto;">
                            <a class="nav-link" href="#" id="image-link">
                                <img src="ProfilePicture/<?php echo $_SESSION["studentProfilepicture"]; ?>" id="image-1"
                                    width="100%" height="auto"></a>
                            <a class="nav-link" href="#" id="edit_profile_button">Edit Profile</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <style>
        .list {
            width: 100%;
            min-height: 20vh;
            /* background-color: rebeccapurple; */
            padding: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .filte-section {
            width: 100%;
            height: auto;
            text-align: right;

        }
    </style>
    <!-- Main Content -->
    <div class="container" style="min-height: 75vh; padding: 30px;">
        <h3>List of Schedule</h3>
        <div class="row w-100 ">
            <div class="col-sm" style="padding-left: 32px;">
                <!-- <a class="btn btn-primary" href="scheduleForm.php" role="button">Add Schedule</a> -->
            </div>
            <div class="col-sm" style="padding-left: 400px;">
                <form class="d-flex">
                    <input class="form-control me-2" id="jobId" type="search" placeholder="Search Schedule using Job Id" aria-label="Search">
                    <button class="btn btn-outline-primary" type="button" onclick="searchSchedule()">Search</button>
                </form>
            </div>
        </div>

        <div class="alert alert-success alert-dismissible fade show" style="display: none; width: 96%; margin:auto; margin-top: 20px;" role="alert" id="successAlert">
            <span id="successAlertMsg"></span>
        </div>
        <div class="list" id="list" style="width: 100%;">

        </div>
    </div>

    <!-- Delete Multiple Student -->
    <div class="modal fade " id="deltetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete a Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to schedule?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="deleteSchedule()">Delete</button>
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

        var schedule = "";
        var obj = "";
        var scheduleId = "";

        function fetchAlldata() {
            var tabledata = "";
            var XRH = new XMLHttpRequest();
            XRH.onload = function() {
                // console.log(this.response);
                schedule = JSON.parse(this.responseText);
                obj = schedule;

                if (schedule != "") {
                    for (let i of schedule) {
                        tabledata += ' <div class="card" style="width: 30rem; height: 15rem; margin-bottom: 10px;"><div class="card-body"><h5 class="card-title">' + i.scheduleTitle + '</h5><h6 class="card-title">'+i.jobTitle+'</h6><h6 class="card-subtitle mb-2 text-muted">Placement Date : ' + i.schedulePlacementdate + '</h6><p class="card-text">' + i.scheduleDecription + '<br></div></div>';
                    }
                    document.getElementById('list').innerHTML = tabledata;

                } else {
                    document.getElementById('list').innerHTML = '<h3 style="text-align:center;">Schedule not available...!!!</h3>';
                }

            }
            XRH.open('POST', './php/getScheduleDetails.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();

        }

        var modal = document.getElementById('deltetModal');

        function getAllSheduleDetails(val) {
            scheduleId = val;
            console.log(val);

        }

        function searchSchedule() {
            var jobId = document.getElementById('jobId').value;
            var tabledata = "";
            if (i = obj.find(o => o.jobId === jobId)) {

                tabledata += ' <div class="card" style="width: 30rem; height: 15rem; margin-bottom: 10px;"><div class="card-body"><h5 class="card-title">' + i.scheduleTitle + '</h5><h6 class="card-title">'+i.jobTitle+'</h6><h6 class="card-subtitle mb-2 text-muted">Placement Date : ' + i.schedulePlacementdate + '</h6><p class="card-text">' + i.scheduleDecription + '<br></div></div>';

                document.getElementById('list').innerHTML = tabledata;

            } else {
                document.getElementById('list').innerHTML = '<h3 style="text-align:center;">Schedule not available...!!!</h3>';
            }
        }

        function deleteSchedule() {
            var data = "scheduleId=" + scheduleId;

            var XRH = new XMLHttpRequest();
            XRH.onload = function() {
                console.log(this.responseText);
                var response = JSON.parse(this.responseText);

                if (response.status) {

                    showSuccessAlert(response.msg);
                    $('#deltetModal').modal('hide');
                    fetchAlldata();


                } else {
                    showSuccessAlert(response.msg);
                    $('#deltetModal').modal('hide');
                    fetchAlldata();

                }
            }
            XRH.open('POST', './php/deleteSchedule.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);

        }
        // Show Successfull Message
        function showSuccessAlert(msg) {
            $("#successAlert").fadeTo(2000, 500).slideUp(500, function() {
                $("#successAlert").slideUp(500);
            });
            document.getElementById("successAlertMsg").innerHTML = msg;
        }
        $(document).ready(function() {
            $("#successAlert").hide();
        });
    </script>
</body>

</html>