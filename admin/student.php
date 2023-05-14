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
    <link rel="stylesheet" type="text/css" href="css/studentStyel.css">
    <title>Student Management Page</title>
</head>
<style>

</style>

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


    <h4>LIST OF STUDENT</h4>

    <div class="alert alert-success alert-dismissible fade show" style="display: none; width: 90%; margin:auto;"
        role="alert" id="successAlert">
        <span id="successAlertMsg"></span>
    </div>
    <style>
    .button-section {
        width: auto;
        float: right;
    }
    </style>
    <div class="filter-option" style="display: block; background-color: none;">
        <div class="button-section">
            <a class="btn btn-dark" href="studentRegistrationForm.php" role="button" style="margin-bottom: 10px;">Add
                Student</a>
            <a class="btn btn-dark" href="#" role="button" style="margin-bottom: 10px;"
                onclick="getAllStudentDetails()">Delete</a>
        </div>

    </div>
    
    <div class="table" id="table">
    <div class="row-3" style=" font-size: 1.2rem; color: red; display: none; margin-left: 0.5rem; margin-bottom: 5px; text-align: right;" id="errorMsg">
        Inputs should not be empty!
    </div>
        <div class="tabledata">
            <table>
                <thead>
                    <tr>
                        <th class="firstcolumne"></th>
                        <th>Enrollment</th>
                        <th>Name</th>
                        <th>Collage Name</th>
                        <th>Branch</th>
                        <th>Phone</th>
                        <th>Last Login</th>
                        <!-- <th>Resume</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tablebody">

                </tbody>
            </table>
        </div>

    </div>
    <!-- Delete Multiple Student -->
    <div class="modal fade" id="deltetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete a Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to delete a Student Data?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="deleteStudent()">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Multiple Student -->
    <div class="modal fade " id="deltetMultipleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete a Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;"> Are you sure to delete a all Student Data?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="deleteAllStudent()">Delete</button>
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
    <script src="../jquery/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    window.onload = function() {
        fetchalldata();
    }
    //Global Varable
    var studentId;
    var page = 1;
    var student;
    var totalPages;

    function fetchalldata() {
        var data = "page=" + page;
        var XRH = new XMLHttpRequest();
        XRH.onload = function() {
            student = JSON.parse(this.responseText);
            var tableData = '';
            if(student != "")
            {
                for (let i of student) {
                tableData +=
                    ' <tr><td style="align-items: center; border: 1px solid black;"><input type="checkbox" name="selectRow" class="checked" value="' +
                    i.studentId + '" ></td><td>' + i.studentId + '</td><td>' + i.studentName + '</td><td>' + i
                    .studentCollagename + '</td><td>' + i.studentBranch + '</td><td>' + i.studentPhone +
                    '</td><td>' + i.lastLogin +
                    '</td><td style="display: flex; justify-content: space-around;"><a href="updateStudentForm.php?id=' +
                    i.studentId + '" value="' +
                    i.studentId +
                    '"><i class="fa-sharp fa-solid fa-file-pen"></i></a><button id="btn" value="' + i
                    .studentId +
                    '" onclick="getStudentDetails(this.value)"><a href="#"><i class="fa-sharp fa-solid fa-trash"></i></a></button></td></tr>';
            }
            
            document.getElementById('tablebody').innerHTML = tableData;
            
            }
            else
            {
                document.getElementById('table').innerHTML ='<h3 style="text-align:center;">No found any student Details ...!!!</h3>';
               
            }
            
        }
        XRH.open('POST', './php/getStudentData.php');
        XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XRH.send(data);

    }

    // Show Modal and set student id
    var modal = document.getElementById('deltetModal');
    var modal1 = document.getElementById('deltetMultipleModal');

    var studentId = [];

    function getAllStudentDetails() {

        var markchecked = document.querySelectorAll('input[type="checkbox"]:checked');

        for (var i of markchecked) {
            studentId.push(i.value);
        }
        
        if (studentId.length == 0 || studentId.length == 1) {
            document.getElementById('errorMsg').style.display = "block";
            document.getElementById('errorMsg').innerHTML = "Please select a  two or more students...!";
        } else {
            $(modal1).modal('show');
            document.getElementById('errorMsg').style.display = "none";

        }

    }

    function getStudentDetails(val) {
        studentId = val;
        $(modal).modal('show');

    }




    //Delete Student
    function deleteStudent() {
        data = "id=" + studentId;
        var obj;
        var XRH = new XMLHttpRequest();
        XRH.onload = function() {
            console.log(this.response);
            obj = JSON.parse(this.responseText);
            if (obj.status) {
                console.log(obj.msg);
                showSuccessAlert(obj.msg);
                $(modal).modal('hide');
                fetchalldata();
            }
        }
        XRH.open('POST', './php/deleteStudent.php');
        XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XRH.send(data);
        console.log(page);
    }
    //Delete Multiple Student
    function deleteAllStudent() {
        data = "id=" + studentId;
        // console.log(studentId)
        var obj;
        var XRH = new XMLHttpRequest();
        XRH.onload = function() {
            // console.log(this.response);
            obj = this.responseText;
            console.log(obj);
            obj = JSON.parse(this.responseText);
            if (obj.status) {
                console.log(obj.msg);
                showSuccessAlert(obj.msg);
                $(modal1).modal('hide');

                fetchalldata();
            }
        }
        XRH.open('POST', './php/deleteAllStudent.php');
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

    function showErrorAlert(msg) {
        $("#ErrorAlert").fadeTo(2000, 500).slideUp(500, function() {
            $("#ErrorAlertMsg").slideUp(500);
        });
        document.getElementById("successAlertMsg").innerHTML = msg;
    }
    $(document).ready(function() {
        $("#ErrorAlert").hide();
    });
    </script>

    <script src="../jquery/jquery-3.6.3.min.js"></script>
</body>

</html>