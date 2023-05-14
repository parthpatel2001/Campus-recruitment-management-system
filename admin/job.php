<?php
include './php/dbconnect.php';
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

    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/job.css">

    <title>Job Page</title>
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
                        <a class="nav-link " aria-current="page" href="AdminDashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recruiter.php">Recruiter</a>
                    </li>

                    <li class="nav-item active dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <!-- Main Content -->
    <div class="main-body">
        <h3 style="text-align: center;">List of Jobs</h3>

        <div class="filter-option" style="display: flex;">
            <p class="label-1">Filter Jobs: </p>
            <div class="col1" style="display: flex; margin-left: 10px;">
                <label for="company" style="padding-top: 7px; padding-right: 5px;">Select Company : </label>
                <select class="form-select w-50 " id="company" aria-label="Default select example" onchange="fetchAlldata()">
                    <option value="all" selected>All</option>
                    <?php
                    // Fetch Company data from recruiter table
                    $result = mysqli_query($con, "SELECT * FROM `recruiter` ORDER BY `companyName`");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['accountStatus'] == "active") {
                            // check a company data is create a any job if company has not create a any job than don't display a company name
                            $recruiterId = $row['recruiterId'];
                            $companyJobs = mysqli_query($con, "SELECT * FROM `job` WHERE `recruiterId`='$recruiterId'");
                            $num = mysqli_num_rows($companyJobs);
                            if ($num > 0) {
                                echo "<option value=" . $row["recruiterId"] . ">" . $row["companyName"] . "</option>'";
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col1" style="display: flex;">
                <label for="category" style="padding-top: 7px; padding-right: 5px;">Select Category : </label>
                <select class="form-select w-50 " id="category" aria-label="Default select example" onchange="fetchAlldata()">
                    <option value="all" selected>All</option>
                    <optgroup label="Network and system administration job titles">
                        <option value="Computer systems manager">Computer systems manager</option>
                        <option value="Network architect">Network architect</option>
                        <option value="Systems analyst">Systems analyst</option>
                        <option value="IT coordinator">IT coordinator</option>
                        <option value="Network administrator">Network administrator</option>
                        <option value="Service desk analyst">Service desk analyst</option>
                        <option value="System administrator ">System administrator
                            (also known as admin)</option>
                        <option value="Wireless network engineer">Wireless network engineer</option>
                    </optgroup>

                    <optgroup label="Database administration job titles">
                        <option value="Database administrator">Database administrator</option>
                        <option value="Database analyst">Database analyst</option>
                        <option value="Data quality manager">Data quality manager</option>
                        <option value="Database report writer">Database report writer</option>
                        <option value="SQL datavase administrator">SQL datavase administrator</option>
                    </optgroup>

                    <optgroup label="Business analyst and business intellligence job titles">
                        <option value="Big data engineer/architech">Big data engineer/architech</option>
                        <option value="Business intelligence specialist/analyst">Business intelligence
                            specialist/analyst</option>
                        <option value="Business systems analyst">Business systems analyst</option>
                        <option value="Data analyst">Data analyst</option>
                        <option value="Data analytics developer">Data analytics developer</option>
                        <option value="Data modelling analyst">Data modelling analyst</option>
                        <option value="Data scientist">Data scientist</option>
                        <option value="Data warehouse manager">Data warehouse manager</option>
                        <option value="Data warehouse programing specialist">Data warehouse programing
                            specialist</option>
                        <option value="Intelligence specialist">Intelligence specialist</option>
                    </optgroup>

                    <optgroup label="Software development, DevOps and cloud job titles">
                        <option value="Back-end developer">Back-end developer</option>
                        <option value="Cloud/Software architech">Cloud/Software architech</option>
                        <option value="Cloud/Software developer">Cloud/Software developer</option>
                        <option value="Cloud/Software application engineer">Cloud/Software application
                            engineer</option>
                        <option value="Cloud sysstem administrator">Cloud sysstem administrator</option>
                        <option value="Cloud system engineer">Cloud system engineer</option>
                        <option value="DevOps engineer">DevOps engineer</option>
                        <option value="Front-end developer">Front-end developer</option>
                        <option value="Full-stack developer">Full-stack developer</option>
                        <option value="Java developer">Java developer</option>
                        <option value="Platform engineer">Platform engineer</option>
                        <option value="Release manager">Release manager</option>
                        <option value="Reliability engineer">Reliability engineer</option>
                        <option value="Software engineer">Software engineer</option>
                        <option value="Software quality assurance analyst">Software quality assurance
                            analyst</option>
                        <option value="UI(User Interface) designer">UI(User Interface) designer</option>
                        <option value="UX(User Experience) designer">UX(User Experience) designer</option>
                        <option value="Web developer">Web developer</option>
                    </optgroup>

                    <optgroup label="Security job titles">
                        <option value="Application security administrator">Application security
                            administrator</option>
                        <option value="Arificial intelligence security specialist">Arificial intelligence
                            security specialist</option>
                        <option value="Cloud security specialist">Cloud security specialist</option>
                        <option value="Cyber security hardware engineer">Cyber security hardware engineer
                        </option>
                        <option id="Cyber intelligence specialist">Cyber intelligence specialist</option>
                        <option id="Cryptographer">Cryptographer</option>
                        <option id="Data privacy officer">Data privacy officer</option>
                        <option id="Digital forensics analyst">Digital forensics analyst</option>
                        <option id="It security engineer">It security engineer</option>
                        <option id="Information assurance analyst">Information assurance analyst</option>
                        <option id="Security systems administrator">Security systems administrator</option>
                    </optgroup>

                    <optgroup label="Help desk and  customer support job titles">
                        <option value="Help desk support specialist">Help desk support specialist</option>
                        <option value="IT support specialist">IT support specialist</option>
                        <option value="Customer Service representative">Customer Service representative
                        </option>
                    </optgroup>

                    <optgroup label="Project and product management job titles">
                        <option value="Technical product manager">Technical product manager</option>
                        <option value="Product manager">Product manager</option>
                        <option value="Project manager">Project manager</option>
                        <option value="Program manager">Program manager</option>
                        <option value="Porfolio manager">Porfolio manager</option>
                    </optgroup>
                </select>
            </div>
            <div class="col1" style="display: flex;">
                <label for="type" style="padding-top: 7px; padding-right: 5px;">Select Job Type : </label>
                <select onchange="fetchAlldata()" class="form-select w-50 " id="type" aria-label="Default select example">
                    <option value="all" selected>All</option>
                    <option value="Only Internship">Only Internship</option>
                    <option value="ij">Internship + Job</option>
                    <option value="Only Job">Only Job</option>
                </select>
            </div>


        </div>
        <style>
            .search-box {
                width: 88%;
                height: auto;
                /* margin: auto; */
                margin-left: 45px;
                margin-top: 10px;
                display: flex;
                align-items: center;
                margin-bottom: 20px;
                padding-left: 10px;
            }
        </style>
        <div class="search-box">
            <div class="form-inline d-flex w-100 " style="margin-left: 10px;">
                <input class="form-control mr-sm-2" type="number" placeholder="Enter a Job ID" aria-label="Search" name="jobId" id="jobId">
                <button class="btn  btn-primary my-2 my-sm-0" type="submit" style="margin-left: 20px;" onclick="searchJob()">Search</button>

            </div>

        </div>

        <div id="list_section" style="min-height: 50vh;">
            <!-- Job Card -->
            <div class="card mb-3" style="max-width: 100%; padding-bottom: 10px; margin: auto;">
                <div class="row g-0">
                    <div class="col-md-4" style="display: flex; justify-content: center;">
                        <img src="../recruiter/company logo/bisag.png" class="img-fluid rounded-start" style="width: 220px; height: auto;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="container">
                            <div class="row " id="row1" style="padding-top: 10px;">
                                <div class="col-sm">
                                    <p class="card-text" id="jname"><b>Job Title :</b></p>
                                    <p class="card-text" id="cname"><b>Company Name:</b></p>
                                    <p class="card-text" id="type"><b>Type : </b></p>
                                    <p class="card-text" id="mode"><b>Work Mode :</b></p>
                                    <p class="card-text" id="location"><b>Location :</b></p>
                                    <p class="card-text" id="location"><b>Last Date for Apply :</b></p>
                                </div>
                                <div class="col-sm">
                                    <p class="card-text" id="experience"><b>Stipend per month :</b></p>
                                    <p class="card-text" id="salary"><b>Package :</b></p>
                                    <p class="card-text" id="vacancy"><b>Vacancy :</b></p>
                                    <p class="card-text" id="experience"><b>Experience :</b></p>
                                    <p class="card-text" id="experience"><b>Website link :</b></p>

                                </div>
                            </div>
                            <!-- Card for mobile view -->
                            <div class="row" id="row2" style="padding-top: 10px; ">
                                <div class="col-sm">
                                    <p class="card-text" id="jname"><b>Job Title :</b></p>
                                    <p class="card-text" id="cname"><b>Company Name:</b></p>
                                    <p class="card-text" id="type"><b>Type : </b></p>
                                    <p class="card-text" id="mode"><b>Work Mode :</b></p>
                                    <p class="card-text" id="location"><b>Location :</b></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm">
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;">Apply</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Form using Modal -->

        <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apply for Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h5 class="modal-title mb-3" id="jobTitle"></h5>
                            <p id="company_Name"></p>
                            <p id="experience1"></p>
                            <p id="stipend1"></p>
                            <p id="package1"></p>
                            <p id="bond1"></p>
                            <p id="work_Mode"></p>
                            <p id="Location1"></p>
                            <p id="lastdate1"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addApplication()">Apply</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Form  using bootstrao Modal -->

        <div class="modal fade" id="reporting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apply for Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h5 class="modal-title mb-3" id="jobTitle"></h5>
                            <p id="company_Name">This Modal is under working......!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <!-- <button type="button" class="btn btn-primary" onclick="addApplication()">Apply</button> -->
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
    <!-- <div class="row"><div class="col-sm"><div style="float: right;"><button type="button" class="btn btn-primary" style="margin-right: 10px;" id="' +
                                    job.jobId +
                                    '" onclick="getJobDetails(this.id)">Any issue?</button></div></div></div> -->
    
            <script src="../jquery/jquery-3.6.3.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
            <script>
                window.onload = function() {
                    fetchAlldata();
                }
                // Global Variable
                var jobId = "";
                var obj = "";

                function fetchAlldata() {
                    var recruiterId = document.getElementById('company').value;
                    var category = document.getElementById('category').value;
                    var type = document.getElementById('type').value;
                    var data = "recruiterId=" + recruiterId + "&category=" + category + "&type=" + type;
                    var tabledata = "";
                    var XRH = new XMLHttpRequest();
                    XRH.onload = function() {
                        var jobData = JSON.parse(this.responseText);
                        if (jobData != "") {
                            obj = jobData;
                            for (let job of jobData) {
                                tabledata +=
                                    '<div class="card mb-3" style="max-width: 100%; padding-bottom: 10px; margin: auto;"><div class="row g-0"><div class="col-md-4" style="display: flex; align-item:center; justify-content: center;"><img src="../recruiter/company logo/' +
                                    job.companyLogo +
                                    '" class="img-fluid rounded-start"style="display : block; width : 75%; height: auto; margin:auto;" alt="..."></div><div class="col-md-8"><div class="container"><div class="row " id="row1" style="padding-top: 10px;"><div class="col-sm"><p class="card-text" id="location"><b>Job Id: </b>' + job.jobId +
                                    '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                                    job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                                    .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                                    ' </p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                                    '</p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                                    '</p></div><div class="col-sm"><p class="card-text" id="stipend"><b>Stipend per month : </b> ' +
                                    job.jobStipend + '</p><p class="card-text" id="salary"><b>Package :</b>' + job
                                    .jobSalary + ' LPA</p><p class="card-text" id="vacancy"><b>Vacancy : </b>' + job
                                    .jobVacancy +
                                    '</p><p class="card-text" id="experience"><b>Experience : </b>' + job.jobExperience +
                                    '</p><p class="card-text" id="location"><b>Last Date for Apply : </b>' + job.lastdate +
                                    '</p><p class="card-text" id="experience"><b>Website link : </b><a href="' + job
                                    .companyWebsite + '">' + job.companyWebsite +
                                    '</a></p></div></div><!-- Card for mobile view --><div class="row" id="row2" style="padding-top: 10px; "><div class="col-sm"><p class="card-text" id="jname"><b>Job Title : </b>' +
                                    job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                                    .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                                    ' </p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                                    '</p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                                    '</p></div></div></div></div></div></div>';
                            }
                            document.getElementById('list_section').innerHTML = tabledata;
                        } else {
                            document.getElementById('list_section').innerHTML = '<h3 style="text-align:center;">No found any jobs ...!!!</h3>';

                        }
                    }


                    XRH.open('POST', './php/getJobDetails.php');
                    XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    XRH.send(data);
                }

                function getJobDetails(val) {
                    jobId = val;
                    console.log(jobId);
                    var job = obj.find(o => o.jobId === val);
                    console.log(job);


                    $('#reporting').modal('show');

                }

                function searchJob() {
                    var jobId = document.getElementById('jobId').value;
                    var XRH = new XMLHttpRequest();
                    XRH.onload = function() {
                       
                        var jobData = JSON.parse(this.responseText);
                        var job= "";

                        if(job = jobData.find(o => o.jobId === jobId))
                        {
                            var tabledata =
                            '<div class="card mb-3" style="max-width: 100%; padding-bottom: 10px; margin: auto;"><div class="row g-0"><div class="col-md-4" style="display: flex; align-item:center; justify-content: center;"><img src="../recruiter/company logo/' +
                            job.companyLogo +
                            '" class="img-fluid rounded-start"style="display : block; width : 75%; height: auto; margin:auto;" alt="..."></div><div class="col-md-8"><div class="container"><div class="row " id="row1" style="padding-top: 10px;"><div class="col-sm"><p class="card-text" id="location"><b>Job Id: </b>' + job.jobId +
                            '</p><p class="card-text" id="jname"><b>Job Title : </b>' +
                            job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                            .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                            ' </p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                            '</p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                            '</p></div><div class="col-sm"><p class="card-text" id="stipend"><b>Stipend per month : </b> ' +
                            job.jobStipend + '</p><p class="card-text" id="salary"><b>Package :</b>' + job
                            .jobSalary + ' LPA</p><p class="card-text" id="vacancy"><b>Vacancy : </b>' + job
                            .jobVacancy +
                            '</p><p class="card-text" id="experience"><b>Experience : </b>' + job.jobExperience +
                            '</p><p class="card-text" id="location"><b>Last Date for Apply : </b>' + job.lastdate +
                            '</p><p class="card-text" id="experience"><b>Website link : </b><a href="' + job
                            .companyWebsite + '">' + job.companyWebsite +
                            '</a></p></div></div><!-- Card for mobile view --><div class="row" id="row2" style="padding-top: 10px; "><div class="col-sm"><p class="card-text" id="jname"><b>Job Title : </b>' +
                            job.jobTitle + '</p><p class="card-text" id="cname"><b>Company Name: </b>' + job
                            .companyName + '</p><p class="card-text" id="type"><b>Job Type : </b>' + job.jobType +
                            ' </p><p class="card-text" id="mode"><b>Work Mode : </b>' + job.jobMode +
                            '</p><p class="card-text" id="location"><b>Location : </b>' + job.jobLocation +
                            '</p></div></div><div class="row"><div class="col-sm"><div style="float: right;"><button type="button" class="btn btn-primary" style="margin-right: 10px;" id="' +
                            job.jobId +
                            '" onclick="getJobDetails(this.id)">Any issue?</button></div></div></div></div></div></div></div>';
                            document.getElementById('list_section').innerHTML = tabledata;
                        }else {
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