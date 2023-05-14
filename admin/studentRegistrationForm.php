<?php
session_start();
if(!isset($_SESSION["adminLogin"]))
{
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
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/studentRegistrationForm.css">
    <title>Student Registraion Form</title>
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
    <h2 style=" color:#7B523B ; margin: 4% 0px 0px 7%;">Add Student</h2>
    <style>

    </style>

    <!-- Design Student Registration Form Section -->
    <div class="form-box">
        <!-- Create row div for divide in section -->
  
        <div class="row-1">
            <!-- Create section div  -->

            <div class="section-1">
                <div class="txt_field">
                    <input type="number" name="enrollment" id="enrollment" autocomplete="off" required>
                    <span></span>
                    <label>Enrollment No</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="studentName" id="uname" onkeydown="return /[a-zA-Z \.]/i.test(event.key)"
                        required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="studentEmail" id="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                
                <div class="txt_field">
                    <input type="number" name="studentPhone" id="contact" required>
                    <span></span>
                    <label>Contact no.</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="studentCollagename" id="collageName" list="clgname"
                        onkeydown="return /[a-zA-Z \.]/i.test(event.key)" required>
                    <span></span>
                    <label>Collage Name</label>
                    <datalist id="clgname">
                                <option>U. V. PATEL COLLAGE OF ENGINEERING</option>
                                <option>M. Patel Institute of Studies</option>
                                <option>Institute of Technology</option>
                            
                            </datalist>
                </div>
                <div class="txt_field">
                    <select name="branch" id="branch">

                    </select>
                    <span></span>
                </div>

            </div>

            <div class="section-2">
                <img class="image-1" src="img/registration.png" alt="Registration image-1">
            </div>
        </div>

        <div class="row-2">
            <div class="section-3">
               
                <div class="txt_field">
                    <select name="studentCurrentsemester" id="currentSem">

                    </select>
                </div>
                <div class="txt_field">
                    <input type="text" name="cgpa" id="cgpa" autocomplete="off" required>
                    <span></span>
                    <label>Previous Semster CGPA</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="10th_Percentage" id="10th_Percentage" autocomplete="off" required>
                    <span></span>
                    <label>10th Percentage</label>
                </div>
            </div>
            <div class="section-4">
                <div class="txt_field">
                    <input type="text" name="12th_Percentage" id="12th_Percentage" autocomplete="off" required>
                    <span></span>
                    <label>12th / Diploma Percentage</label>
                </div>
                <div class="txt_field">
                    <input type="number" name="startingYear" id="startingYear" autocomplete="off" required>
                    <span></span>
                    <label>Admission Year</label>
                </div>
                <div class="txt_field">
                    <input type="number" name="endingYear" id="endingYear" autocomplete="off" required>
                    <span></span>
                    <label>Final Year</label>
                </div>
               
            </div>

        </div>
        <div class="row-2" >
        <div class="txt_field_address">
        <input type="text" name="address" id="address" autocomplete="off" required>
                    <span></span>
                    <label>Address</label>
        </div>
        </div>

        <!-- display error on form -->
        <style>
        .row-3 {
            width: 100%;
        }
        </style>

        <div class="row-3" style="font-size: 1.2rem; color: red; display: none; margin-left: 0.5rem;" id="errorMsg">
            Inputs should not be empty!
        </div>

        <div class="button-1">
            <input type="submit" onclick="addStudent()" name="submit" id="btn" value="Register">
        </div>

        </form>
    </div>
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

    <script src="../jquery/jquery-3.6.3.min.js">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    window.onload = function() {
        setBranchs();
        setSem();
    }


    // Set branch option 
    function setBranchs() {
        const branch = ["CE", "IT", "CIVIL", "CE-AI", "ME", "AE", "EE", "CHE", "Marine Eng.", "Biomedical Eng.",
            "Environmental Eng.", "Nuclear Eng.", "BSC", "MSC"
        ];
        var branchdata = '<option value="#" disabled selected>Select a Branch</option>';
        for (let i of branch) {
            branchdata += '<option value="' + i + '">' + i + '</option>';
        }
        document.getElementById('branch').innerHTML = branchdata;

    }

    // Set Sem option 
    function setSem() {
        const sem = [7, 8];
        var currentSem = '<option value="#" disabled selected>Current Sem</option>';
        for (let i of sem) {
            currentSem += '<option value="' + i + '">' + i + '</option>';
        }
        document.getElementById('currentSem').innerHTML = currentSem;

    }

    function addStudent() {
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



        // check all input are empty or not
        if (enrollment == "" || username == "" || email == "" ||  contact == "" || collageName == "" ||
            branch == "" || currentSem == "" || cgpa == "" || tenthmark == "" || twelvethmark == "" || startingYear ==
            "" || endingYear == "" || address == "") {
            document.getElementById('errorMsg').style.display = "block";
        } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Invalid email";

        } else if (!/^(0|91)?[6-9][0-9]{9}$/.test(contact)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Please enter valid contact number...!";
        } else if (currentSem == "#") {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Please select current Sem....!";

        } else if (branch == "#") {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Please select branch....!";

        } else if (cgpa.match(/[a-zA-Z]+/)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter a number only in CGPA  field";
        } else if (tenthmark.match(/[a-zA-Z]+/)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter a number only in 10th mark field";
        } else if (twelvethmark.match(/[a-zA-Z]+/)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter a number only in 12th mark field";
        } else if (tenthmark > 100) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter proper 10th mark percentage...!";
        } else if (twelvethmark > 100) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter proper 12th mark percentage...!";
        } else if (!/^(19[5-9]\d|20[0-4]\d|2050)$/.test(startingYear)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter proper valid starting year...!";
        } else if (!/^(19[5-9]\d|20[0-4]\d|2050)$/.test(endingYear)) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter proper valid ending Year...!";
        } else if (endingYear <= startingYear) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Enter proper valid ending year...!";
        } else {
            document.getElementById('errorMsg').style.display = "none";
            var data = "studentEnrollment=" + enrollment + "&studentName=" + username + "&studentEmail=" + email +
                "&studentPhone=" + contact + "&studentAddress=" + address + "&studentCollagename=" + collageName +
                "&studentBranch=" + branch + "&studentCurrentsemester=" + currentSem + "&studentCGPA=" + cgpa +
                "&tenthmark=" + tenthmark + "&twelvethmark=" + twelvethmark + "&studentStartingYear=" +
                startingYear +
                "&studentEndingYear=" + endingYear;

            console.log(data);

            var XRH = new XMLHttpRequest();
            XRH.onload = function() {
                obj = JSON.parse(this.responseText);

                console.log(obj);
                if (obj.status) {

                    if (confirm(obj.msg)) {
                        window.location.href = "student.php";
                        document.getElementById('enrollment').value = "";
                        document.getElementById('uname').value = "";
                        document.getElementById('email').value = "";
                        document.getElementById('password').value = "";
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

                    } else {
                        // window.location.href = "studentResgistrationForm.php";
                    }
                } else {
                    if (confirm(obj.msg)) {
                        // window.location.href = "studentResgistrationForm.php";
                    } else {
                        // window.location.href = "studentResgistrationForm.php";
                    }
                }
                obj = this.responseText;
                console.log(obj);
            }
            XRH.open('POST', './php/Studentinsert.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);
        }
    }




    //add new student
    </script>
</body>

</html>