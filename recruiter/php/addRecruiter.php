<?php
include '../../dbconnect.php';

$name = $_POST['fname'] . " " . $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$password = $_POST['psw'];
$query = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterEmail`="' . $email . '"');

if ($num = mysqli_num_rows($query) == 0) {
    // create a new name for image

    $img_target_dir = "./../Profile/";
    $image_ext = explode('.', $_FILES["profile"]["name"]);
    $ext = end($image_ext);
    $image_name = rand(100, 9999999) . '.' . $ext;
    $recruiterLogo_dir = $img_target_dir . $image_name;


    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $recruiterLogo_dir)) {
        $query='INSERT INTO `recruiter` VALUES ("" ,"' . $name . '","' . $email . '","' . $password . '",' . $mobile . ',"' . $image_name . '","","","","","","","","")';
        if (mysqli_query($con,$query)) {
            ?>
            <script>
                if(confirm('Registration Successfull.'))
                {
                    window.location.href="../recruiterLogin.php"
                }
                else
                {
                    window.location.href="../recruiterLogin.php"
                }
            </script>
            <?php
        }
    } else {
        ?>
            <script>
                if(confirm('Registration failed.'))
                {
                    window.location.href="../recruiterRegistration.php"
                }
                else
                {
                    window.location.href="../recruiterRegistration.php"
                }
            </script>
            <?php
        
    }
} else {
    ?>
    <script>
        if(confirm('This Email is already Registed...'))
                {
                    window.location.href="../recruiterRegistration.php"
                }
                else
                {
                    window.location.href="../recruiterRegistration.php"
                }
    </script>
    <?php
}
?>