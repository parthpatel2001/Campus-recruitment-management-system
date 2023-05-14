<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION["recruiter"])) {
    header("location:recuiterLogin.php");
}

// fetch all records
$total_application = 0;


$result = mysqli_query($con, 'SELECT * FROM `job` WHERE `recruiterId`=' . $_SESSION['recruiterId'] . '');
$total_job = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    $result1 = mysqli_query($con, 'SELECT * FROM `application` WHERE `jobId`=' . $row['jobId'] . '');
    $total_application += mysqli_num_rows($result1);
}

$total_schedule = 0;
$query = mysqli_query($con, 'SELECT * FROM `job` WHERE `recruiterId`=' . $_SESSION['recruiterId'] . '');

while ($row = mysqli_fetch_assoc($query)) {
    $query1 = mysqli_query($con, 'SELECT * FROM `schedule` WHERE `jobId` = ' . $row['jobId'] . '');
    $total_schedule += mysqli_num_rows($query1);
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

    <title>Recruiter Dashboard</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg  navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="recruiterDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="rjob.php">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="application.php">Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="schedule.php">Schedule</a>
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

    <!-- Main Content -->
    <style>
        .container1 {
            margin-top: 20px;
            min-height: 40vh;
            padding: 20px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .cards {
            width: 28%;
            height: 15vh;
            display: flex;
            box-shadow: 0px 0px 1px black;
            margin-bottom: 2px;
        }

        .section-1 {
            width: 40%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section-1 img {
            width: 65%;
            height: auto;
        }

        .section-2 {
            width: 50%;
            height: 100%;
            text-align: center;
            padding-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .chart {
            width: 90%;
            height: auto;
            margin: auto;
            /* border: 1px solid black; */
            border-radius: 2px;
            box-shadow: 0px 0px 2px black;
            padding: 20px;
            margin-bottom: 50px;
        }

        .piechartTitle {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
    <div class="container container1">
        <div class="cards">
            <div class="section-1"><img src="img/icon3.png" alt=""></div>
            <div class="section-2">
                <p>Total Jobs : <?php echo $total_job; ?></p>
            </div>
        </div>

        <div class="cards">
            <div class="section-1"><img src="img/icon4.png" alt=""></div>
            <div class="section-2">
                <p>Total Application: <?php echo $total_application; ?></p>
            </div>
        </div>


        <div class="cards">
            <div class="section-1"><img src="img/icon5.png" alt=""></div>
            <div class="section-2">
                <p>Total Schedule : <?php echo $total_schedule; ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="chart">
            <div class="card-title">
                <h5 class="piechartTitle">Registration Per Job</h5>
            </div>
            <div id="bar_chart"></div>
        </div>
    </div>


    <!-- Registration Modal -->
    <div class="modal fade" id="recruiterRegister" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cname" class="form-label">Company Name<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="cname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="clogo" class="form-label">Company Logo<label style="color: red;">*</label></label>
                        <input class="form-control" type="file" id="clogo" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="mb-3">
                        <label for="cemail" class="form-label">Company Email<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="cemail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="wlink" class="form-label">Company Website link<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="wlink" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Company Location<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="location" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description<label style="color: red;">*</label></label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Company Address<label style="color: red;">*</label></label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                    </div>
                    <div class="row-3" style="font-size: 1.2rem; color: red; display: none; margin-left: 0.5rem;" id="errorMsg">
                        Inputs should not be empty!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
                    <button type="button" class="btn btn-primary" onclick="insertRecruiter()">Register</button>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        window.onload = function() {
            check_recruiter();
            // $('#recruiterRegister').modal('show');

            getChartDetails();
        }
        // Global Variable
        var obj;
        var jobRecordArray = new Array();

        function check_recruiter() {
            var XRH = new XMLHttpRequest();
            XRH.onload = function() {
                var check = JSON.parse(this.responseText);
                console.log(check.status);
                if (check.status == "registed") {
                    console.log("this is old user.");
                } else {
                    $('#recruiterRegister').modal('show');
                }
            }


            XRH.open('POST', './php/check_recruiter.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();

        }

        function insertRecruiter() {
            var companyName = document.getElementById('cname').value;
            var companyLogo = document.getElementById('clogo');
            var companyEmail = document.getElementById('cemail').value;
            var companyWeblink = document.getElementById('wlink').value;
            var companyLocation = document.getElementById('location').value;
            var companyDesc = document.getElementById('description').value;
            var companyAddress = document.getElementById('address').value;
            var errorMsg = document.getElementById("errorMsg");
            var fileSize = "";
            var fileMb = "";

            if (companyLogo.files.length > 0) {
                fileSize = companyLogo.files.item(0).size;
                fileMb = fileSize / 1024 ** 2;
            }

            // Check Validation
            if (companyName == "" || companyEmail == "" || companyWeblink == "" || companyLocation == "" || companyDesc ==
                "" || companyAddress == "") {
                errorMsg.innerHTML = " Inputs should not be empty!";
                errorMsg.style.display = "block";
            } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(companyEmail)) {

                errorMsg.innerHTML = " Enter a Valid Email..!!";
                errorMsg.style.display = "block";
            } else if (companyLogo.files.length == 0) {
                errorMsg.innerHTML = "Please select a file.";
                errorMsg.style.display = "block";

            } else if (fileMb >= 2) {
                errorMsg.innerHTML = "Please select a image less than 2MB.";
                errorMsg.style.display = "block";
            } else {

                errorMsg.style.display = "none";
                var data = new FormData();

                data.append("companyName", companyName);
                data.append("companyLogo", companyLogo.files[0]);
                data.append("companyEmail", companyEmail);
                data.append("companyWeblink", companyWeblink);
                data.append("companyLocation", companyLocation);
                data.append("companyDesc", companyDesc);
                data.append("companyAddress", companyAddress);


                $.ajax({

                    url: "./php/companyRegister.php",
                    method: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        var result = JSON.parse(data);
                        if (result.status) {
                            if (confirm(result.msg)) {
                                // window.location.href = "myApplication.php";
                                $('#recruiterRegister').modal('hide');
                            }
                        } else {
                            alert(result.msg);
                        }
                    }
                });
            }
        }

        //Get a Job Data
        function getChartDetails() {
            var XRH = new XMLHttpRequest();

            XRH.onload = function() {
                console.log(this.response);
                obj = JSON.parse(this.responseText);
                console.log(obj);
                if(obj == "")
                {
                    document.getElementById('bar_chart').innerHTML = '<h4 style="text-align:center;"> No data available....!!</h4>';
                }
                else
                {
                    for (let job of obj) {
                    jobRecordArray.push(["Job Id =" + job.jobId, Number(job.totalApplication)]);
                }
                    drawJobRecordChart();
                }

            }

            XRH.open('POST', './php/getDashboard.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();
        }


        //Make bar chat
        function drawJobRecordChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows(jobRecordArray);

            // Set chart options
            var options = {
                width: '100%',
                height: 400,
                fontSize: '2rem',
                colors: ['#30475E', '#F05454', '#D89216', '#F4ABC4'],
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '80%',
                    height: '80%'
                }
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
            chart.draw(data, options);
        }
    </script>


</body>



</html>