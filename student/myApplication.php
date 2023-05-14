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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/applicationStyle.css">



    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>

    <title>My Applications</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg   navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
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
                        <a class="nav-link active" aria-current="page" href="myApplication.php">My Application</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="myJob.php">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php">Schedule</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Live chatting</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <div class="profile_pic" style="width: 60px; height: auto;">
                            <a class="nav-link" href="studentEditProfile.php" id="image-link">
                                <img src="ProfilePicture/<?php echo $_SESSION["studentProfilepicture"]; ?>" id="image-1"
                                    width="100%" height="auto"></a>
                            <a class="nav-link" href="studentEditProfile.php" id="edit_profile_button">Edit Profile</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <style>
    .table-1 {
        width: 90%;
        min-height: 65vh;
        /* background-color: red; */
        margin: auto;
        margin-top: 10px;
    }

    .heading-1 {
        padding-top: 20px;
    }

    .filter-section {
        width: 100%;
        height: 5vh;
        /* background-color: red; */
        margin-top: 30px;
    }

    .tabledata {
        width: 98%;
        margin: auto;
    }

    .tabledata table {
        width: 100%;
        border: 0px;
        border: 1px solid black;
        text-align: center;
        margin: auto;
        box-shadow: 0px 0px 1px black;
    }
    .tabledata table th{
        padding: 5px 0px;
    }
    </style>
    <div class="table-1">
        <h3 class="heading-1" style="text-align: center;">List of Application</h3>

        <div class="filter-section">
            <?php
            $result = mysqli_query($con,'SELECT * FROM `application` WHERE `studentId` = '.$_SESSION["studentId"].'');
            // $row = mysqli_fetch_assoc($result) ;
            $num = mysqli_num_rows($result);
?>

            <p style="padding-left: 15px;">Total Application : <?php echo $num;?> </p>
        </div>
        <div class="tabledata" id="tabledata">
            <table>
                <thead>
                    <tr>
                        <th>Application No.</th>
                        <th>Company Name</th>
                        <th>Job Name</th>
                        <th>Apply Date</th>
                    </tr>
                </thead>
                <tbody id="tablebody">

                </tbody>
            </table>
        </div>
    </div>




    <!-- Register a Student Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <img src="image/profile_pic.png" class="mx-auto d-block " width="100px" height="auto"
                            style="border-radius: 50%;" alt="" id="profile">

                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Name :
                            </label>

                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Email :
                            <?php echo $_SESSION['studentEmail'] ?></label>

                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose a Profile Picture<label
                                style="color: red;">*</label></label>
                        <input class="form-control" onchange="loadFile(event)" type="file" id="file-image"
                            accept=".png, .jpg, .jpeg">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload a Resume<label
                                style="color: red;">*</label></label>
                        <input class="form-control" type="file" id="file-resume" accept=".pdf">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Create new Password<label
                                style="color: red;">*</label></label>
                        <input class="form-control" type="text" id="password" >
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Confirm Password<label
                                style="color: red;">*</label></label>
                        <input class="form-control" type="text" id="cpassword" >
                    </div>

                    <div class="row-3" style="font-size: 1.2rem; color: red; display: none; margin-left: 0.5rem;"
                        id="errorMsg">
                        Inputs should not be empty!
                    </div>
                </div>
                <div class="modal-footer">
                <a class="btn btn-primary" href="cancel.php" role="button" style="margin-bottom: 3px;">Logout</a>
                
                    
                    <button type="button" class="btn btn-primary" onclick="insertStudent()">Save</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>

    </script>
    <script>
    window.onload = function() {
        check_user();
        fetchAlldata();

        // $('#exampleModal').modal('show');
    }

     // Fetch data from table
     function fetchAlldata() {
        var XRH = new XMLHttpRequest();
        XRH.onload = function() {
            obj = JSON.parse(this.responseText);

            if(obj == "")
            {
                document.getElementById('tabledata').innerHTML = '<h4 style="text-align:center;"> No application available....!!</h4>';
            }
            else
            {
                var tableData = '';
            for (let application of obj) {
                tableData +=
                    '<tr><td>' + application.application_on + '</td><td>' + application.companyName + '</td><td>' + application.jobTitle + '</td><td>' + application.applyedDate +'</td></tr>';
            }

            document.getElementById('tablebody').innerHTML = tableData;

            }
            
        }
        XRH.open('POST', './php/getApplicationDetails.php');
        XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XRH.send();
    }

    function check_user() {
        var XRH = new XMLHttpRequest();
        XRH.onload = function() {
            var check = JSON.parse(this.responseText);
            console.log(check.status);
            if (check.status) {
                $('#exampleModal').modal('show');
            }
            else if(check.status == "false")
            {
                console.log("registed");
            }
          
        }

        XRH.open('POST', './php/check_user.php');
        XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XRH.send();

    }

    // GLobal variable
    let fileimage = document.getElementById("file-image");
    let fileInput = document.getElementById("file-resume");
    let fileResult = document.getElementById("errorMsg");
    var imageSize = "";
    var resumeSize = "";

    // check image size
    var loadFile = function(event) {
        if (fileimage.files.length > 0) {
            const fileSize = fileimage.files.item(0).size;
            const fileMb = fileSize / 1024 ** 2;
            if (fileMb >= 2) {
                imageSize = "no";
            } else {
                imageSize = "yes";
            }
        }
        image.src = URL.createObjectURL(event.target.files[0]);
    };


    //  check file size
    fileInput.addEventListener("change", function() {
        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files.item(0).size;
            const fileMb = fileSize / 1024 ** 2;
            if (fileMb >= 5) {
                resumeSize = "no";
            } else {
                resumeSize = "yes";
            }
        }
    });

    //check a image size
    // profile.addEventListener("change", function() {

    // });

    // change a profile pic on form
    let profile = document.getElementById('file-image');
    let image = document.getElementById("profile");




    // check a form is empty or not
    function insertStudent() {
        var passsword = document.getElementById('password').value;
        var cpasssword = document.getElementById('cpassword').value;

        if (fileimage.files.length == 0 || fileInput.files.length == 0) {
            fileResult.innerHTML = "Please select a file.";
            fileResult.style.display = "block";
        }
        else if(passsword == "")
        {
            fileResult.innerHTML = "Please a Password Field...";
            fileResult.style.display = "block";
        }
        else if(cpasssword == "")
        {
            fileResult.innerHTML = "Please a Confirm Password Field...";
            fileResult.style.display = "block";
        }
        else  if (imageSize == "no") {
            fileResult.innerHTML = "Please select a image less than 2MB.";
            fileResult.style.display = "block";
        } else if (resumeSize == "no") {
            fileResult.innerHTML = "Please select a file less than 5MB.";
            fileResult.style.display = "block";
        } 
        else if(passsword != cpasssword)
        {
            fileResult.innerHTML = "Password and confirm password are not matching..!!";
            fileResult.style.display = "block";
        }else if(!/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/.test(passsword))
        {
            fileResult.innerHTML = "Please make a Strong Password.. (at least use one uppercase character , one lowercase character ,one number ,one special character in password)";
            fileResult.style.display = "block";
        } 
        else 
        {
            fileResult.style.display = "none";
            // fetch vale from form

            var data = new FormData();
            data.append("profile", fileimage.files[0]);
            data.append("resume", fileInput.files[0]);
            data.append("password",passsword);
            $.ajax({

                url: "./php/registerStudent.php",
                method: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    if (result.status) {
                        if (confirm("Registration completed.")) {
                            // window.location.href = "myApplication.php";
                            $('#exampleModal').modal('hide');
                        }
                    } else {
                        alert("failed");
                    }
                }
            });
        }
    }
    </script>
</body>

</html>