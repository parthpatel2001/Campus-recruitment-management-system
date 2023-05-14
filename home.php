<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Home Page</title>

</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg  navbar-dark  border-bottom p-3 shadow-sm navbar-setbackground">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="admin/img/logo.png" width="60%" height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/AdminLogin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./student/myApplication.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./recruiter/recruiterLogin.php">Recruiter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact us</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <style>
    * {
        margin: 0%;
        padding: 0%;
    }

    .section1 {
        width: 100%;
        height: auto;
        display: flex;
        padding-bottom: 5px;
    }

    .col1 {
        width: 40%;
        height: 100%;
    }

    .col2 {
        width: 60%;
        height: 100%;
    }

    .img-2 {
        width: 90%;
        height: auto;
        margin: auto;
        display: flex;
    }

    .img-1 {
        width: 90%;
        height: auto;
        display: flex;
        margin: auto;
        margin-top: 100px;
    }
    </style>

    <div class="section1">
        <div class="col1">
            <img src="img/we_are_hiring.jpg" class="img-1" alt="">
        </div>
        <div class="col2">
            <img src="img/bg-1 (1).png" class="img-2" alt="">
        </div>
    </div>

    <style>
    .section2 {
        width: 100%;
        height: auto;
        padding: 100px;
    }

    .row2 {
        width: 90%;
        height: auto;
        margin: auto;
        display: flex;
        margin-top: 25px;
    }

    .icon-sec i {
        font-size: 24px;
        margin-top: 7px;
    }

    .text-sec {
        padding-left: 20px;
        /* font-weight: bold; */
        font-size: 24px;
    }
    </style>
    <div class="section2 bg-light">
        <div class="row1" style="margin-bottom: 10px;">
            <h2>Benefits of CRMS</h2>
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </div>
        <div class="row2">
            <div class="icon-sec">
                <i class="fa-solid fa-check" style="color: black;"></i>
            </div>
            <div class="text-sec">
                Campus recruitment helps in increased selection ratio.
            </div>
        </div>
        <div class="row2">
            <div class="icon-sec">
                <i class="fa-solid fa-check" style="color: black;"></i>
            </div>
            <div class="text-sec">
                Saves Time & Efforts.
            </div>
        </div>
        <div class="row2">
            <div class="icon-sec">
                <i class="fa-solid fa-check" style="color: black;"></i>
            </div>
            <div class="text-sec">
                Improved Retention Rates.
            </div>
        </div>
        <div class="row2">
            <div class="icon-sec">
                <i class="fa-solid fa-check" style="color: black;"></i>
            </div>
            <div class="text-sec">
                Student can find best possible opportunities.
            </div>
        </div>
        <div class="row2">
            <div class="icon-sec">
                <i class="fa-solid fa-check" style="color: black;"></i>
            </div>
            <div class="text-sec">
                Campus recruitement is help to make Good relationship between Organization & Campus.
            </div>
        </div>
    </div>

    <style>
    .section4 {
        width: 100%;
        height: auto;
        padding: 10px;
        padding-top: 110px;
        padding-bottom: 110px;
        /* display: none; */
    }

    .row1 {
        text-align: center;
        padding-bottom: 10px;
    }

    .line1 {
        display: block;
        width: 25%;
        border-bottom: 0.1rem solid black;
        margin: auto;
        margin-bottom: 10px;
    }

    .line2 {
        display: block;
        width: 22%;
        border-bottom: 0.1rem solid black;
        margin: auto;
        margin-bottom: 10px;
    }

    .line3 {
        display: block;
        width: 19%;
        border-bottom: 0.1rem solid black;
        margin: auto;
        margin-bottom: 10px;
    }
    </style>
    <div class="section4 ">
        <!-- Here row is for headaing  -->
        <div class="row1">
            <h2>Visited Companies</h2>
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </div>

        <style>
        .container1 {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding: 50px;
        }
        </style>
        <div class="container1">
            <div class="card text-center " style="width: 18rem; height: 15rem;">
                <div class="card-body">
                    <img src="img/bisag.png" alt="" style="width: 50%; height: auto; margin-bottom: 10px;">
                    <h5 class="card-title" style="margin-top: 50px;">BISAG-N</h5>
                </div>
            </div>
            <div class="card text-center " style="width: 18rem; height: 15rem;">
                <div class="card-body">
                    <img src="img/tcs.png" alt="" style="width: 50%; height: auto; margin-bottom: 10px;">
                    <h5 class="card-title" style="margin-top: 50px;">TCS</h5>
                </div>
            </div>
            <div class="card text-center " style="width: 18rem; height: 15rem;">
                <div class="card-body">
                    <img src="img/infosys.png" alt=""
                        style=" margin-top: 20px; width:45%; height: auto; margin-bottom: 10px;">
                    <h5 class="card-title" style="margin-top: 50px;">Infosys</h5>
                </div>
            </div>

        </div>
    </div>

<!-- Footer -->
    <footer class="footer">
        <div class="contain1">
            <div class="row">
                <div class="footer-col">

                    <h4>Placement Cell</h4>
                    <ul>
                        <li><a style="font-size: 14px;" href="#">Ganpat Vidyanagar Mehsana-Gozaria, Highway, Kherva, Gujarat 384012.</a></li>
                        <li><a style="font-size: 0.8rem;" href="#"><b>Phone:</b> 9874563210</a></li>
                        <li><a style="font-size: 0.8rem;" href="#"><b>Email:</b> ganpatuniversity@gnu.ac.in</a></li>
                        
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="aboutus.php">about us</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                        <!-- <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li> -->
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <!-- <li><a href="#">FAQ</a></li> -->
                        <li><a href="aboutus.php">Feedbacks</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="jquery/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>