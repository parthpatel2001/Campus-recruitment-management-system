<?php
include '../dbconnect.php';
session_start();
if (!isset($_SESSION["adminLogin"])) {
    header("location:AdminLogin.php");
}

// fetch all records

$result1 = mysqli_query($con, 'SELECT * FROM `student`');
$total_student = mysqli_num_rows($result1);

$result2 = mysqli_query($con, 'SELECT * FROM `recruiter`');
$total_recruiter = mysqli_num_rows($result2);

$result3 = mysqli_query($con, 'SELECT * FROM `job`');
$total_job = mysqli_num_rows($result3);

$result4 = mysqli_query($con, 'SELECT * FROM `application`');
$total_application = mysqli_num_rows($result4);

$result5=mysqli_query($con,'SELECT * FROM `schedule`');
$total_schedule=mysqli_num_rows($result5);

// $total_schedule = 0;
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

    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Navbar -->
    <!-- <div class="sticky-top"> -->
    <nav class="navbar sticky-top navbar-expand-lg  navbar-dark navbar-setbackground border-bottom p-3 shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="AdminDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recruiter.php">Recruiter</a>
                    </li>

                    <li class="nav-item active dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="job.php">Jobs</a></li>
                            <li><a class="dropdown-item" href="application.php">Application</a></li>
                            <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>

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
    <!-- <div class="path ">
        Admin  <i class="fa-solid fa-greater-than"></i>  Feedback <i class="fa-solid fa-greater-than"></i>
    </div>
</div> -->
    <style>
        .container1 {
            margin-top: 20px;
            min-height: auto;
            padding: 20px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 100px;
        }

        .cards {
            width: 12%;
            min-height: 30vh;
            box-shadow: 0px 0px 1px black;
            margin-bottom: 2px;
        }

        .section-1 {
            width: 100%;
            height: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section-1 img {
            width: 70%;
            height: auto;
            margin-top: 15px;
        }

        .section-2 {
            width: 100%;
            height: 50%;
            text-align: center;
            padding-top: 15px;

        }
    </style>
    <div class="container container1">
        <div class="cards">
            <div class="section-1"><img src="img/icon1.png" alt=""></div>
            <div class="section-2">
                <p>Total Student : <br> <?php echo $total_student; ?></p>
            </div>
        </div>

        <div class="cards">
            <div class="section-1"><img src="img/icon2.png" alt=""></div>
            <div class="section-2">
                <p>Total Recruiter: <br> <?php echo $total_recruiter; ?></p>
            </div>
        </div>

        <div class="cards">
            <div class="section-1"><img src="img/icon3.png" alt=""></div>
            <div class="section-2">
                <p>Total Jobs : <br> <?php echo $total_job; ?></p>
            </div>
        </div>

        <div class="cards">
            <div class="section-1"><img src="img/icon4.png" alt=""></div>
            <div class="section-2">
                <p>Total Application: <br> <?php echo $total_application; ?></p>
            </div>
        </div>


        <div class="cards">
            <div class="section-1"><img src="img/icon5.png" alt=""></div>
            <div class="section-2">
                <p>Total Schedule : <br> <?php echo $total_schedule; ?></p>
            </div>
        </div>
    </div>

    <style>
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
    <!-- Design a Chart  -->
    <div class="container">

        <div class="chart">
            <div class="card-title">
                <h5 class="piechartTitle">Job Per Company</h5>
            </div>
            <div id="pia_chart"></div>

        </div>
        <div class="chart">
            <div class="card-title">
                <h5 class="piechartTitle">Registration Per Job</h5>
            </div>
            <div id="bar_chart"></div>

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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        window.onload = function() {
            getChartDetails();
        };


        // google.charts.setOnLoadCallback(drawChart);

        // Global Variable
        var obj;
        var companyArray = new Array();
        var jobRecordArray = new Array();

        function getChartDetails() {
            var XRH = new XMLHttpRequest();

            XRH.onload = function() {
                obj = JSON.parse(this.responseText);
                console.log(obj);
                var companyJobRecord = obj.company_job_records;
                var jobRecord = obj.jobRecord;

                for (let company of companyJobRecord) {
                    companyArray.push([company.companyName, Number(company.totalJob)]);
                }
                for (let job of jobRecord) {
                    jobRecordArray.push(["Job Id =" + job.jobId, Number(job.totalApplication)]);
                }

                drawCompanyJobChart();
                drawJobRecordChart();
            }

            XRH.open('POST', './php/getDashboard.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send();
        }


        //Make Pia chart 
        function drawCompanyJobChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows(companyArray);

            // Set chart options
            var options = {
                'width': '100%',
                'height': 300,
                tooltip: {
                    textStyle: {
                        fontName: 'TimesNewRoman',
                        fontSize: 20,
                        bold: false
                    }
                },
                pieSliceTextStyle: {
                    color: 'white',
                    fontName: 'TimesNewRoman',
                    fontSize: 12
                },
                legend: {
                    textStyle: {
                        fontName: 'Courier',
                        fontSize: 20,
                        bold: true,
                    }
                },
                chartArea: {
                    left: 70,
                    top: 50,
                    width: '100%',
                    height: '80%'
                },
                is3D: true
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('pia_chart'));
            chart.draw(data, options);
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
                chartArea: { left: 50, top: 50, width: '80%', height: '80%' }
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>