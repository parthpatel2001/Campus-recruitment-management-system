<?php
session_start();
if(!isset($_SESSION["adminLogin"]))
{
    $_SESSION["path"]="recruiter.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/recuiterstyle.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Document</title>
</head>

<body>
       <!-- Navbar -->
       <nav class="navbar sticky-top navbar-expand-lg  navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="AdminDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="student.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="recruiter.php">Recruiter</a>
                    </li>

                    <li class="nav-item  dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link" href="AdminEditProfile.php" id="image-link">
                            <img src="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" id="image-1" style="width: 40px; height: auto;" alt=""></a>
                        <a class="nav-link" href="AdminEditProfile.php" id="edit_profile_button">Edit Profile</a>
                    </div>
                </li>
                </ul>

            </div>
        </div>
    </nav>

    <h4>LIST OF RECRUITER</h4>
    <style>
    .filter1 {
        width: 75%;
        margin: auto;
    }

    .status {
        width: 200px;
        height: 5vh;
        border-radius: 50px;
        padding-left: 10px;
    }
    </style>
    <div class="filter1">
        <label for="status">Select Status :</label>
        <select name="status" class="status" onchange="fetchAllData()" id="status">
            <option value="active">Active</option>
            <option value="blocked">Blocked</option>
            <option value="deleted">Deleted</option>
        </select>
    </div>
    <div class="alert alert-success alert-dismissible fade show"
        style="display: none; width: 75%; margin:auto; margin-top: 20px;" role="alert" id="successAlert">
        <span id="successAlertMsg"></span>
    </div>
    <div id="list_section" style="min-height: 50vh;">

    </div>

    <!-- view model -->
    <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recruiter Information</h5><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="name"> </p>
                    <p id="email"> </p>
                    <p id="phone"> </p>
                    <p id="canme"></p>
                    <p id="cemail"> </p>
                    <p id="wlink"> </p>
                    <p id="description"></p>
                    <p id="location"></p>
                    <p id="address"></p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>

    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Block a Recruiter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to blocked a recruiter?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="updateRecruiter()">Bolcked</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Unblocked Recruiter Modal -->
    <div class="modal fade" id="unblockedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unblock a Recruiter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to unblocked a recruiter?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="unblockedRecruiter()">Unbolcked</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Recruiter Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete a Recruiter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to Delete a recruiter?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="deleteRecruiter()">Delete</button>
                </div>
            </div>
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

</body>
<script src="../jquery/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">

</script>

<script>
var recruiter;
window.onload = function() {
    fetchAllData();
}

// Globale Variable
var obj;
var recruiterId;

function fetchAllData() {
    var status = document.getElementById('status').value;
    // console.log(status);
    var data = "status=" + status;
    var XRH = new XMLHttpRequest();
    var tabledata = "";
    XRH.onload = function() {
        recruiter = JSON.parse(this.responseText);
        obj = recruiter;
        // console.log(recruiter);

        if (status == "active") {
            for (let i of recruiter) {
                tabledata += '<div class="items"><div class="left_penal"><img src="../recruiter/Profile/' + i
                    .recruiterProfilepic +
                    '" alt=""></div><div class="right_penal"><div class="info-section left-info-section"><p><b>Company Name: :</b> ' +
                    i.companyName + ' <br></p><p><b>Name :</b>' + i.recruiterName + '<br></p><p><b>Email :</b> ' + i
                    .companyEmail + ' <br></p><p><b>Phone :</b> ' + i.recruiterPhone +
                    ' <br></p><p><a href="#" id="' + i.recruiterId +
                    '" onclick="getRecruiterDetails(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>more information</b></a><br></p></div><div class="info-section-1 right-info-section"><div class="block-1"><p><b>Location: :</b> ' +
                    i.companyLocation + ' <br></p><p><b>Account Status :</b> ' + i.accountStatus +
                    ' <br></p><p><b>Website link: :</b><a href="' + i.companyWebsite + '">' + i.companyWebsite +
                    '</a> <br></p></div><div class="block-2"> <button type="button" class="btn btn-primary" style="margin-right: 10px;"id="' +
                    i.recruiterId +
                    '" onclick="getRecruiterDetails(this.id)" data-bs-toggle="modal"  data-bs-target="#UpdateModal">Block</button><button id="' +
                    i.recruiterId +
                    '"  onclick="getRecruiterDetails(this.id)"  class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#deleteModal"> Delete</button></div></div></div></div>';
            }

           
            document.getElementById('list_section').innerHTML = tabledata;
        } else if (status == "blocked") {
            for (let i of recruiter) {
                tabledata += '<div class="items"><div class="left_penal"><img src="../recruiter/Profile/' + i
                    .recruiterProfilepic +
                    '" alt=""></div><div class="right_penal"><div class="info-section left-info-section"><p><b>Company Name: :</b> ' +
                    i.companyName + ' <br></p><p><b>Name :</b>' + i.recruiterName + '<br></p><p><b>Email :</b> ' + i
                    .companyEmail + ' <br></p><p><b>Phone :</b> ' + i.recruiterPhone +
                    ' <br></p><p><a href="#" id="' + i.recruiterId +
                    '" onclick="getRecruiterDetails(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>more information</b></a><br></p></div><div class="info-section-1 right-info-section"><div class="block-1"><p><b>Location: :</b> ' +
                    i.companyLocation + ' <br></p><p><b>Account Status :</b> ' + i.accountStatus +
                    ' <br></p><p><b>Website link: :</b><a href="' + i.companyWebsite + '">' + i.companyWebsite +
                    '</a> <br></p></div><div class="block-2"><button class="btn btn-primary" id="' +
                    i.recruiterId +
                    '"  data-bs-toggle="modal"  data-bs-target="#unblockedModal" onclick="getRecruiterDetails(this.id)" > Unblock</button></div></div></div></div>';
            }

            document.getElementById('list_section').innerHTML = tabledata;
        } else {
            for (let i of recruiter) {
                tabledata += '<div class="items"><div class="left_penal"><img src="../recruiter/Profile/' + i
                    .recruiterProfilepic +
                    '" alt=""></div><div class="right_penal"><div class="info-section left-info-section"><p><b>Company Name: :</b> ' +
                    i.companyName + ' <br></p><p><b>Name :</b>' + i.recruiterName + '<br></p><p><b>Email :</b> ' + i
                    .companyEmail + ' <br></p><p><b>Phone :</b> ' + i.recruiterPhone +
                    ' <br></p><p><a href="#" id="' + i.recruiterId +
                    '" onclick="getRecruiterDetails(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>more information</b></a><br></p></div><div class="info-section-1 right-info-section"><div class="block-1"><p><b>Location: :</b> ' +
                    i.companyLocation + ' <br></p><p><b>Account Status :</b> ' + i.accountStatus +
                    ' <br></p><p><b>Website link: :</b><a href="' + i.companyWebsite + '">' + i.companyWebsite +
                    '</a> <br></p></div></div></div></div>';
            }

            document.getElementById('list_section').innerHTML = tabledata;
        }
    }

    XRH.open('POST', './php/getRecruiterDetails.php');
    XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XRH.send(data);
}

function getRecruiterDetails(val) {
    recruiterId = val;
    console.log(val);
    let recruiter = obj.find(o => o.recruiterId === val);
    console.log(recruiter);

    document.getElementById('name').innerHTML = "Recruiter Name :" + recruiter.recruiterName;
    document.getElementById('email').innerHTML = "Recruiter Email :" + recruiter.recruiterEmail;
    document.getElementById('phone').innerHTML = "Recruiter Phone :" + recruiter.recruiterPhone;
    document.getElementById('canme').innerHTML = "Company Name:" + recruiter.companyName;
    document.getElementById('cemail').innerHTML = "Company Email:" + recruiter.companyEmail;
    // document.getElementById('wlink').innerHTML ="Website Link: <a herf="'+recruiter.recruiter+' 
    document.getElementById('location').innerHTML = "Location :" + recruiter.companyLocation;
    document.getElementById('description').innerHTML = "Description :" + recruiter.companyDescription;
    document.getElementById('address').innerHTML = "Address :" + recruiter.companyAddress;

}

// Update a Recruiter
function updateRecruiter() {
    // console.log("blocked");
    var data = 'recruiterId=' + recruiterId + '&status=blocked';
    var XRH = new XMLHttpRequest();
    var tabledata = "";
    XRH.onload = function() {
        recruiter = JSON.parse(this.responseText);
        obj = recruiter;

        if (recruiter.status) {
            showSuccessAlert(recruiter.msg);
            fetchAllData();
            $('#UpdateModal').modal('hide');
        }

    }
    XRH.open('POST', './php/updateRecruiter.php');
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

// Unblocked a Recruiter
function unblockedRecruiter() {
    // console.log("blocked");
    var data = 'recruiterId=' + recruiterId + '&status=active';
    var XRH = new XMLHttpRequest();
    var tabledata = "";
    XRH.onload = function() {
        recruiter = JSON.parse(this.responseText);
        obj = recruiter;
        if (recruiter.status) {
            showSuccessAlert(recruiter.msg);
            fetchAllData();
            $('#unblockedModal').modal('hide');
        }
    }
    XRH.open('POST', './php/updateRecruiter.php');
    XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XRH.send(data);
}

// Delete a Recruiter
function deleteRecruiter() {
    // console.log("blocked");
    var data = 'recruiterId=' + recruiterId + '&status=deleted';
    var XRH = new XMLHttpRequest();
    var tabledata = "";
    XRH.onload = function() {
        recruiter = JSON.parse(this.responseText);
        obj = recruiter;
        if (recruiter.status) {
            showSuccessAlert(recruiter.msg);
            fetchAllData();
            $('#deleteModal').modal('hide');
        }
    }
    XRH.open('POST', './php/updateRecruiter.php');
    XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XRH.send(data);
}
</script>

</html>