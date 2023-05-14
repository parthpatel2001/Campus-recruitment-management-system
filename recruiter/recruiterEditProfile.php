<?php
session_start();
include '../dbconnect.php';


if (!isset($_SESSION["recruiter"])) {
    header("location:recuiterLogin.php");
}


$query = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId` = ' . $_SESSION['recruiterId'] . '');
$recruiter = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Recruiter Edit Profile</title>
    <link rel="stylesheet" href="./css/editProfile.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
</head>

<style>


</style>

<body>
    <!-- Navigation Menu -->

    <div class="navbar">
        <img src="./img/logo.png" class="logo" alt="Website Logo" onsubmit="return on_form_sbmt()">
        <div class="right-navbar">
        <a href="recruiterDashboard.php">Dashboard</a>
            <a href="rjob.php">Job</a>
            <a href="application.php">Application</a>
            <a href="schedule.php">Schedule</a>
            <a href="logout.php">logout</a> 
            
            <div class="profile_pic">
                <img onclick="showtext()" src="./Profile/<?php echo $_SESSION['recruiterProfilepic']; ?>" alt="Admin Profile pic">
            </div>
        </div>
    </div>

    <!-- Design Form Section -->
    <h2 style=" color:#201f1f ; margin: 2% 0px 0px 2%;"> RECRUITER PROFILE</h2>

    <!-- Design Recruiter Edit Profile -->
    <div class="section-1">
        <div class="col-1">

            <p><b>Recruiter Profile Pic</b></p>
            <img src="Profile/<?php echo $recruiter['recruiterProfilepic']; ?>" alt="Recruiter Profile" id="profile-image" accept=".png, .jpg, .jpeg">
            <label for="change_profile" class="profile" onchange="loadFile(event)">
                Change Profile
                <input id="change_profile" type="file" />
            </label>

            <!-- <input type="file" name="submit" value="Change Profile"> -->
            <p><b>Company Logo</b></p>
            <img src="company logo/<?php echo $recruiter['companyLogo']; ?>" alt="Company Logo" id="companylogo" accept=".png, .jpg, .jpeg">
            <label for="change_logo" class="profile" onchange="loadLogo(event)">
                Change Logo
                <input id="change_logo" type="file" />
            </label>
            <!-- <input type="button" name="submit" value="Change Logo"> -->

        </div>

        <div class="col-2">
            <p><b><br> RECRUITER INFORMATION</b></p><br>
            <div class="sec-2">
                <form>
                    <div class="row1">
                        <p>Recruiter Id :</p><br>
                        <input type="number" name="employee_id" id="employee_id" readonly value="<?php echo $recruiter['recruiterId']; ?>">
                    </div>
                    <div class="row1">
                        <p>Name :</p>
                        <input type="text" name="name" id="name" onkeydown="return /[a-zA-Z \.]/i.test(event.key)" value="<?php echo $recruiter['recruiterName']; ?>">
                    </div>

                    <div class="row1">
                        <p>Email :</p><br>
                        <input type="email" name="email" id="email" readonly value="<?php echo $recruiter['recruiterEmail']; ?>">
                    </div>
                    <div class="row1">
                        <p>Phone :</p><br>
                        <input type="number" name="phone" id="phone" value="<?php echo $recruiter['recruiterPhone']; ?>">
                    </div>


                    <p><b><br><br> COMPANY INFORMATION</b></p><br>

                    <div class="row1">
                        <p>Name :</p><br>
                        <input type="text" name="cname" id="cname" onkeydown="return /[a-zA-Z \.]/i.test(event.key)" value="<?php echo $recruiter['companyName']; ?>">
                    </div>
                    <div class="row1">
                        <p>email :</p><br>
                        <input type="email" name="cemail" id="cemail" value="<?php echo $recruiter['companyEmail']; ?>">
                    </div>
                    <div class="row1">
                        <p>Website Link :</p><br>
                        <input type="url" name="website_link" id="website_link" value="<?php echo $recruiter['companyWebsite']; ?>">
                    </div>
                    <div class="row1">
                        <p>Location :</p><br>

                        <input type="url" name="clocation" id="clocation" onkeydown="return /[a-zA-Z \.]/i.test(event.key)" value="<?php echo $recruiter['companyLocation']; ?>">





                        </select>
                    </div>
                    <div class="row1">
                        <p>Address : :</p><br>
                        <input type="text" name="address" id="address" value="<?php echo $recruiter['companyAddress']; ?>">
                    </div>
                    <div class="row1">
                        <p>Description :</p><br>
                        <textarea name="description" id="description"><?php echo $recruiter['companyDescription']; ?></textarea>
                    </div>
                    <div class="row1">
                        <input type="button" name="submit" id="submit" value="Update" onclick="updateRecruiter()">
                    </div>
                </form>
            </div>
        </div>
        <div class="sec-1">
            <!-- <p><b>Recruiter Profile Pic</b></p> -->
        </div>
    </div>
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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            let image = document.getElementById("profile-image");
            let logo = document.getElementById("companylogo");

            // change Profile Picture
            var loadFile = function(event) {
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            // change Company Logo
            var loadLogo = function(event) {
                logo.src = URL.createObjectURL(event.target.files[0]);
            };


            function updateRecruiter() {

                var recruiterName = document.getElementById('name').value;
                var recruiterPhone = document.getElementById('phone').value;
                var recruiterProfilepic = document.getElementById('change_profile');
                var companyName = document.getElementById('cname').value;
                var companyLogo = document.getElementById('change_logo');
                var companyDescription = document.getElementById('description').value;
                var companyEmail = document.getElementById('cemail').value;
                var companyWebsite = document.getElementById('website_link').value;
                var companyLocation = document.getElementById('clocation').value;
                var companyAddress = document.getElementById('address').value;

                if (recruiterName == "" || recruiterPhone == "" || companyName == "" || companyDescription == "" || companyEmail == "" || companyWebsite == "" || companyLocation == "" || companyAddress == "") {
                    alert('Please fill name field...');
                } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(companyEmail)) {

                    alert('Invalid email');

                } else if (!/^(0|91)?[6-9][0-9]{9}$/.test(recruiterPhone)) {
                    alert('Please enter valid contact number...!');
                } else {
                    // fetch vale from form
                    var data = new FormData();

                    data.append("recruiterName", recruiterName);
                    data.append("recruiterPhone", recruiterPhone);
                    data.append("companyName", companyName);
                    data.append("companyDescription", companyDescription);
                    data.append("companyEmail", companyEmail);
                    data.append("companyWebsite", companyWebsite);
                    data.append("companyLocation", companyLocation);
                    data.append("companyAddress", companyAddress);

                    if (recruiterProfilepic.files.length > 0) {
                        data.append("recruiterProfilepic", recruiterProfilepic.files[0]);
                    }
                    if (companyLogo.files.length > 0) {
                        data.append("companyLogo", companyLogo.files[0]);
                    }

                    $.ajax({

                        url: "./php/updateRecruiterDetails.php",
                        method: "POST",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // console.log(data);
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