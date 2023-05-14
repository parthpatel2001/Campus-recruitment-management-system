<?php
include 'php/dbconnect.php';

session_start();
if(!isset($_SESSION["adminLogin"]))
{
    header("location:AdminLogin.php");
}
// Fetch Data from table using student Enrollment

$enrollment=$_GET['id'];
$result=mysqli_query($con,"SELECT * FROM `student` WHERE `studentId` = '$enrollment'");
$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/updateStudentdata.css">


    <title>Update Student Details</title>
</head>

<body>

    <!-- Navigation Menu -->
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
                        <a class="nav-link active" href="student.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recruiter.php">Recruiter</a>
                    </li>

                    <li class="nav-item active dropdown">
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



    <!-- Design Form Section -->
    <h2 style=" color:#7B523B ; margin: 4% 0px 0px 7%;">Update Student Details</h2>
    <style>

    </style>

    <!-- Design Student Registration Form Section -->

    <div class="form-box">
        <form action="">

            <!-- Create row div for divide in section -->

            <div class="row-1">
                <!-- Create section div  -->
                <div class="section-1">
                    <div class="txt_field input1" style="margin-top: 90px;">
                        <input type="text" name="enrollment" id="enrollment" value="<?php echo $row['studentId']; ?>"
                            required disabled>
                        <span></span>
                        <label>Enrollment No</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="uname" id="uname" value="<?php echo $row['studentName']; ?>" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="txt_field">
                        <input type="email" name="email" id="email" value="<?php echo $row['studentEmail']; ?>"
                             required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="contact" id="contact" value="<?php echo $row['studentPhone']; ?>"
                            required>
                        <span></span>
                        <label>Contact no.</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="collageName" id="collageName"
                            value="<?php echo $row['studentCollagename']; ?>" required>
                        <span></span>
                        <label>Collage Name</label>
                    </div>

                </div>

                <div class="section-2">
                    <img class="image-1" src="img/registration.png" alt="Registration image-1">
                </div>
            </div>

            <div class="row-2">
                <div class="section-3">
                    <div class="txt_field">
                        <input type="text" name="branch" id="branch" value="<?php echo $row['studentBranch']; ?>"
                            required>
                        <span></span>
                        <label>Branch</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="currentSem" id="currentSem"
                            value="<?php echo $row['studentCurrentsemester']; ?>" autocomplete="off" required>
                        <span></span>
                        <label>Current Sem</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="cgpa" id="cgpa" autocomplete="off"
                            value="<?php echo $row['studentCGPA']; ?>" required>
                        <span></span>
                        <label>Previous Semster CGPA</label>
                    </div>
                    <div class="txt_field">
                        <input type="text   " name="10th_Percentage" id="10th_Percentage"
                            value="<?php echo $row['10th_Percentage']; ?>" autocomplete="off" required>
                        <span></span>
                        <label>10th Percentage</label>
                    </div>
                </div>
                <div class="section-4">
                    <div class="txt_field">
                        <input type="number" name="12th_Percentage" id="12th_Percentage"
                            value="<?php echo $row['12th_Percentage']; ?>" autocomplete="off" required>
                        <span></span>
                        <label>12th / Diploma Percentage</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="startingYear" id="startingYear" autocomplete="off"
                            value="<?php echo $row['studentStartingyear']; ?>" required>
                        <span></span>
                        <label>Admission Year</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="endingYear" id="endingYear" autocomplete="off"
                            value="<?php echo $row['studentEndingyear']; ?>" required>
                        <span></span>
                        <label>Final Year</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="address" value="<?php echo $row['studentAddress']; ?>" id="address"
                            autocomplete="off" required>
                        <span></span>
                        <label>Address</label>
                    </div>
                </div>
            </div>
            <div class="row-3" style="font-size: 1.2rem; color: red; display: none; margin-left: 0.5rem;" id="errorMsg">
                Inputs should not be empty!
            </div>

            <div class="button-1">
                <input type="submit" onclick="update()" name="submit" id="btn" value="Update">
            </div>

    </div>


    </form>
    </div>
    <div class="container mt-5">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex ">
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
        </footer>
    </div>

    <script src="../jquery/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    // var obj ="";
    var btn = document.getElementById('btn');

    //  btn.onclick= function () {
    function update() {
        var enrollment = document.getElementById('enrollment').value;
        var username = document.getElementById('uname').value;
        var email = document.getElementById('email').value;
        var contact = document.getElementById('contact').value;
        var collageName = document.getElementById('collageName').value;
        var branch = document.getElementById('branch').value;
        var currentSem = document.getElementById('currentSem').value;
        var cgpa = document.getElementById('cgpa').value;
        var tenthmark = document.getElementById('10th_Percentage').value;
        var twelvethmark = document.getElementById('12th_Percentage').value;
        var startingYear = document.getElementById('startingYear').value;
        var endingYear = document.getElementById('endingYear').value;
        var address = document.getElementById('address').value;
        console.log(enrollment);




        // check all input are empty or not
        if (enrollment == "" || username == "" || email == "" || contact == "" || collageName == "" ||
            branch == "" || currentSem == "" || cgpa == "" || tenthmark == "" || twelvethmark == "" || startingYear ==
            "" || endingYear == "" || address == "") {
            document.getElementById('errorMsg').style.display = "block";
        }
        else {
            document.getElementById('errorMsg').style.display = "none";
            var data = "studentEnrollment=" + enrollment + "&studentName=" + username + "&studentEmail=" + email +
                "&studentPhone=" + contact + "&studentAddress=" + address + "&studentCollagename=" + collageName +
                "&studentBranch=" + branch + "&studentCurrentsemester=" + currentSem + "&studentCGPA=" + cgpa +
                "&tenthmark=" + tenthmark + "&twelvethmark=" + twelvethmark + "&studentStartingYear=" + startingYear +
                "&studentEndingYear=" + endingYear;


            document.getElementById('enrollment').value = "";
            document.getElementById('uname').value = "";
            document.getElementById('email').value = "";
            document.getElementById('contact').value = "";
            document.getElementById('collageName').value = "";
            document.getElementById('branch').value = "";
            document.getElementById('currentSem').value = "";
            document.getElementById('cgpa').value = "";
            document.getElementById('10th_Percentage').value = "";
            document.getElementById('12th_Percentage').value = "";
            document.getElementById('startingYear').value = "";
            document.getElementById('endingYear').value = "";
            document.getElementById('address').value = "";
            console.log(data);

            var XRH = new XMLHttpRequest();
            XRH.onload = function() {

                obj = JSON.parse(this.responseText);
                if (obj.status) {
                    if (confirm(obj.msg)) {
                        window.location.href = "student.php";
                    } else {
                        window.location.href = "student.php";
                    }
                } else {
                    if (confirm(obj.msg)) {
                        window.location.href = "student.php";
                    } else {
                        window.location.href = "student.php";
                    }
                }
            }
            XRH.open('POST', './php/updateStudent.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);
        }
    }
    </script>
</body>

</html>