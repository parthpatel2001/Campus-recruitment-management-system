<?php
include '../dbconnect.php';
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



    <link rel="stylesheet" href="./css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <title>Feedback</title>
</head>

<body>
    <!-- Navbar -->
    <!-- <div class="sticky-top"> -->

        <nav class="navbar  navbar-expand-lg  navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
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
                            <a class="nav-link  dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="job.php">Jobs</a></li>
                                <li><a class="dropdown-item" href="application.php">Application</a></li>
                                <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>

                        </li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>

                    <li class="nav-item">
                        <div class="profile_pic" style=" width: 50px; height: auto;">
                            <a class="nav-link" href="#" id="image-link">
                                <img src="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" id="image-1" style="width: 40px; height: auto;" alt=""></a>
                            <a class="nav-link" href="#" id="edit_profile_button">Edit Profile</a>
                        </div>
                    </li>
                    </ul>

                </div>
            </div>

        </nav>
        <!-- <div class="path ">
            Admin <i class="fa-solid fa-greater-than"></i> Feedback <i class="fa-solid fa-greater-than"></i>
        </div>
    </div> -->


    <div class="container container1" style="margin-top:50px;">
        <h4 class="sub-heading">User Feedback</h4>
        <div class="alert alert-success alert-dismissible fade show" style="display: none; width: 95%; margin:auto; margin-top: 20px; margin-bottom: 20px;" role="alert" id="successAlert">
            <span id="successAlertMsg"></span>
        </div>
        <div class="list" id="list">

        </div>

    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete a Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to Delete a feedback?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="deleteFeedback()">Delete</button>
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
    <div class="footer ">
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        window.onload = function() {
            getFeedback();
        };

        // Gloabl variable
        var feedbackId = "";

        function getfeedbackDetails(val) {
            feedbackId = val;
            console.log(val);
        }

        function getFeedback() {
            var tabledata = "";
            var XRH = new XMLHttpRequest();

            XRH.onload = function() {
                console.log(this.response);
                var feedback = JSON.parse(this.response);

                for (let i of feedback) {
                    tabledata += '<div class="card mb-3 edit-card" style="max-width: 540px; "><div class="row g-0"><div class="col-md-1"><img src="./img/user-profile.png" class="img-fluid rounded-start profile-pic" alt="..."></div><div class="col-md-10"><div class="card-body"><h5 class="card-title">' + i.name + '</h5><p class="card-text">' + i.message + '</p><p class="card-text"><small class="text-muted">Posted date is ' + i.posted_date + '. </small><a href="#"  id="' + i.no + '" onclick="getfeedbackDetails(this.id)" style="margin-left: 8rem;"  data-bs-toggle="modal"  data-bs-target="#deleteModal" class="card-link">Delete Feedback</a></p></div></div></div></div>';
                }
                document.getElementById('list').innerHTML = tabledata;
            }

            XRH.open('POST', './php/getFeedback.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();
        }

        function deleteFeedback() {
            var data = 'feedbackId=' + feedbackId;

            var XRH = new XMLHttpRequest();
            XRH.onload = function() {

                var result = JSON.parse(this.responseText);

                if (result.status) {
                    showSuccessAlert(result.msg);
                    getFeedback();
                    $('#deleteModal').modal('hide');
                }
            }
            XRH.open('POST', './php/deleteFeedback.php');
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