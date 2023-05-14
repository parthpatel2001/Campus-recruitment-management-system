<?php
include '../dbconnect.php';
session_start();
if (!isset($_SESSION["student"])) {
    header("location:studentLogin.php");
}

$query = mysqli_query($con, 'SELECT * FROM `student` WHERE `studentId` = ' . $_SESSION['studentId'] . '');
$student = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student edit Profile</title>
    <link rel="stylesheet" href="./css/editProfile.css">
    <script src="https://kit.fontawesome.com/a5bda29c88.js" crossorigin="anonymous"></script>
</head>


<body>
    <div class="navbar">
        <img src="image/logo.png" class="logo" alt="Website Logo" onsubmit="return on_form_sbmt()">
        <div class="right-navbar">
            <a href="myApplication.php">My Applications</a>
            <a href="myJob.php">Jobs</a>
            <a href="schedule.php">Schedule</a>
            <a href="logout.php">Logout</a>

            <div class="profile_pic">
                <img onclick="showtext()" src="./ProfilePicture/<?php echo $_SESSION['studentProfilepicture']; ?>" alt="Admin Profile pic">
            </div>
        </div>
    </div>



    <!-- Design Form Section -->
    <h2 style=" color:#201f1f ; margin: 2% 0px 0px 2%;"> STUDENT PROFILE</h2>

    <div class="section-1">
        <div class="col-1">

            <p><b>STUDENT PICTURE</b></p>
            <img src="./ProfilePicture/<?php echo $_SESSION['studentProfilepicture']; ?>" class="profile_pic1" id="profile_pic1" alt="Recruiter Profile">
            <label for="change_profile" class="profile">
                Change Image
                <input type="file" name="change_profile" id="change_profile" accept=".png, .jpg, .jpeg" onchange="loadFile(event)">
            </label>


            <div class="resume_sct">
                <img src="./image/PDF_file_icon.png" alt="">
                <div class="info-pro">
                    <a href="./Resume/<?php echo $student['studentResume']; ?>" target="_blank" id="fileName">
                        <?php echo $student['studentResume']; ?>
                    </a>
                </div>

            </div>
            <label for="change_resume" class="profile">
                Change Resume
                <input type="file" name="change_resume" id="change_resume" accept=".pdf">
            </label>




        </div>

        <div class="col-2">
            <p><b><br> STUDENT INFORMATION</b></p><br>
            <div class="sec-2">

                <div class="row1">
                    <p>Name :</p>
                    <input type="text" name="name" id="name" value="<?php echo $student['studentName']; ?>">
                </div>
                <div class="row1">
                    <p>Email :</p><br>
                    <input type="email" name="email" id="email" value="<?php echo $student['studentEmail']; ?>" readonly>
                </div>
                <div class="row1">
                    <p>Phone :</p><br>
                    <input type="number" name="phone" id="phone" value="<?php echo $student['studentPhone']; ?>">
                </div>

                <div class="row1">
                    <p>College Name :</p><br>
                    <input type="text" name="cname" id="cname" value="<?php echo $student['studentCollagename']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>Branch :</p><br>
                    <input type="text" name="branch" id="branch" value="<?php echo $student['studentBranch']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>Current Semester :</p><br>
                    <input type="number" name="sem" id="sem" value="<?php echo $student['studentCurrentsemester']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>CGPA :</p><br>
                    <input type="number" name="phone" id="phone" value="<?php echo $student['studentCGPA']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>10th Percentage:</p><br>
                    <input type="number" name="Percentage" id="Percentage" value="<?php echo $student['10th_Percentage']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>12th Percentage :</p><br>
                    <input type="number" name="per" id="per" value="<?php echo $student['12th_Percentage']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>Starting Year :</p><br>
                    <input type="number" name="syear" id="syear" value="<?php echo $student['studentStartingyear']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>Ending Year:</p><br>
                    <input type="number" name="eyear" id="eyear" value="<?php echo $student['studentEndingyear']; ?>" readonly>
                </div>

                <div class="row1">
                    <p>Address :</p><br>
                    <textarea name="address" id="address"><?php echo $student['studentAddress']; ?></textarea>
                </div>




            </div>

            <div class="row1" style="border: 0px;">
                <button onclick="updateStudent()">Update</button>
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
        //Global variable
        let fileInput = document.getElementById('change_resume');
        let resume_link = document.getElementById('fileName');
        let image = document.getElementById("profile_pic1");

        // change Profile Picture
        var loadFile = function(event) {
            image.src = URL.createObjectURL(event.target.files[0]);
        };


        fileInput.addEventListener('change', function(event) {

            // Get file name
            let fileName = fileInput.files[0].name;
            resume_link.innerText = fileName;
        });

        function updateStudent() {
            var studentName = document.getElementById('name').value;
            var studentContact = document.getElementById('phone').value;
            var studentAddress = document.getElementById('address').value;
            var studentProfile = document.getElementById('change_profile');
            var studentResume = document.getElementById('change_resume');


            if (studentName == "" || studentContact == "" || studentAddress == "") {
                alert('Please fill name field...');
            } else if (!/^(0|91)?[6-9][0-9]{9}$/.test(studentContact)) {
                alert('Please enter valid contact number...!');
            } else {
                // fetch vale from form
                var data = new FormData();
                data.append("studentName", studentName);
                data.append("studentContact", studentContact);
                data.append("studentAddress", studentAddress);

                if (studentProfile.files.length > 0) {
                    data.append("studentProfile", studentProfile.files[0]);
                }
                if (studentResume.files.length > 0) {
                    data.append("studentResume", studentResume.files[0]);
                }

                $.ajax({

                    url: "./php/updateStudent.php",
                    method: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        // console.log(data);
                        var result = JSON.parse(data);
                        if (result.status) {
                            alert(result.msg);
                            location.reload();
                        } else {
                            alert(result.msg);
                        }

                    }
                });

            }
        }
    </script>
</body>

</html>