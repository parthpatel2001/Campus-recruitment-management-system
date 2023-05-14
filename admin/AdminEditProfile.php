<?php
include '../dbconnect.php';
session_start();
if (!isset($_SESSION["adminLogin"])) {
    header("location:AdminLogin.php");
}

$query = mysqli_query($con, 'SELECT * FROM `admin` WHERE `adminEmail` = "' . $_SESSION['email'] . '"');
$admin = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin edit Profile</title>
    <link rel="stylesheet" href="./css/editProfile.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navbar">
        <img src="img/logo.png" class="logo" alt="Website Logo" onsubmit="return on_form_sbmt()">
        <div class="right-navbar">
            <a href="AdminDashboard.php">Dashboard</a>
            <a href="student.php">Student</a>
            <a href="recruiter.php">Recruiter</a>
            <div class="dropdown">
                <button class="dropdownbtn">
                    Services <i class="fa fa-caret-down"></i>
                    <div class="dropdown-list">
                        <a href="job.php">Job</a>
                        <a href="feedback.php">Feedback</a>
                        <a href="application.php">Application</a>
                        <a href="../logout.php">Logout</a>
                    </div>
                </button>
            </div>
            <div class="profile_pic">
                <img onclick="showtext()" src="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" alt="Admin Profile pic">
            </div>
        </div>
    </div>



    <!-- Design Form Section -->
    <h2 style=" color:#201f1f ; margin: 2% 0px 0px 2%;"> ADMIN PROFILE</h2>

    <div class="section-1">
        <div class="col-1">

            <p><b>ADMIN PICTURE</b></p>
            <img src="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" alt="Admin Profile" id="profile-image" >
            <label for="change_profile" class="profile">
                Change Image
                <input id="change_profile" onchange="loadFile(event)" type="file"  accept=".png, .jpg, .jpeg" value="./profilePicture/<?php echo $_SESSION['adminpic']; ?>" />
            </label>

        </div>

        <div class="col-2">
            <p><b><br> ADMIN INFORMATION</b></p><br>
            <div class="sec-2">

                <div class="row1">
                    <p>Name<label style="color: red;">*</label>:</p>
                    <input type="text" name="name" id="name" value="<?php echo $admin['adminName'] ?>">
                </div>
                <div class="row1">
                    <p>Email<label style="color: red;">*</label> :</p><br>
                    <input type="email" name="email" id="email" value="<?php echo $admin['adminEmail'] ?>" readonly>
                </div>
                <div class="row1">
                    <input type="button" name="submit" id="submit" onclick="updateAdmin()" value="Update">
                </div>

            </div>
        </div>
    </div>

    <!-- Design custom footer -->
    <div class="footer">
        <div class="container">
            <div class="line"></div>
            <div class="line2">
                <div class="col1">
                    © 2023, GUNI Placementcell.
                </div>
                <div class="col1">
                    <div class="icon">
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../jquery/jquery-3.6.3.min.js"></script>
    <script>

        let image = document.getElementById("profile-image");

        // change Profile Picture
        var loadFile = function(event) {
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function updateAdmin()
        {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;

            if(name == "")
            {
            alert('Please fill name field...');
            }
            else
            {
            var fileimage = document.getElementById('change_profile');
            // fetch vale from form
            var data = new FormData();
            data.append("name",name);
            data.append("email",email);
            data.append("profile", fileimage.files[0]);

            $.ajax({

                url: "./php/updateAdmin.php",
                method: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var result = JSON.parse(data);

                    if(result.status)
                    {
                        alert(result.msg);
                        location. reload();
                    }
                    else
                    {
                        alert(result.msg);

                    }
                   
                }
            });
            }
        }
    </script>
</body>

</html>