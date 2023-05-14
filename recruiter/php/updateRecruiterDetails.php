<?php
session_start();
include '../../dbconnect.php';

$recruiterName = $_POST['recruiterName'];
$recruiterPhone = $_POST['recruiterPhone'];
$companyName = $_POST['companyName'];
$companyDescription = $_POST['companyDescription'];
$companyEmail = $_POST['companyEmail'];
$companyWebsite = $_POST['companyWebsite'];
$companyLocation = $_POST['companyLocation'];
$companyAddress = $_POST['companyAddress'];

$query = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId` = ' . $_SESSION['recruiterId'] . '');
$recruiter = mysqli_fetch_assoc($query);

$old_profile_pic = $recruiter['recruiterProfilepic'];
$old_company_logo = $recruiter['companyLogo'];

if (mysqli_query($con, 'UPDATE `recruiter` SET `recruiterName`="' . $recruiterName . '",`recruiterPhone`="' . $recruiterPhone . '",`companyName`="' . $companyName . '",`companyDescription`="' . $companyDescription . '",`companyEmail`="' . $companyEmail . '",`companyWebsite`="' . $companyWebsite . '",`companyLocation`="' . $companyLocation . '",`companyAddress`="' . $companyAddress . '" WHERE `recruiterId` =' . $_SESSION['recruiterId'] . '')) {

    if (isset($_FILES['recruiterProfilepic']['name']) and !empty($_FILES['recruiterProfilepic']['name'])) {

        if (unlink("../Profile/" . $old_profile_pic)) {
            $new_profile_pic = $_FILES["recruiterProfilepic"]["name"];
            $img_target_dir = "../Profile/";
            $image_ext = explode('.', $new_profile_pic);
            $ext = end($image_ext);
            $new_image_name = rand(100, 9999999) . '.' . $ext;
            $newimage = $img_target_dir . $new_image_name;
            if (move_uploaded_file($_FILES["recruiterProfilepic"]["tmp_name"], $newimage) && mysqli_query($con, 'UPDATE `recruiter` SET `recruiterProfilepic`="' . $new_image_name . '" WHERE `recruiterId` =' . $_SESSION['recruiterId'] . '')) {

                $result = array("status" => true, "msg" => "Update Successfull.");
            } else {
                $result = array("status" => false, "msg" => "Failed to update Profile Pic");
            }
        }
    }
    if (isset($_FILES['companyLogo']['name']) and !empty($_FILES['companyLogo']['name'])) {

        if (unlink("../company logo/" . $old_company_logo)) {
            $new_logo = $_FILES["companyLogo"]["name"];
            $img_target_dir = "../company logo/";
            $image_ext = explode('.', $new_logo);
            $ext = end($image_ext);
            $new_logo_name = rand(100, 9999999) . '.' . $ext;
            $newimage = $img_target_dir . $new_logo_name;

            if (move_uploaded_file($_FILES["companyLogo"]["tmp_name"], $newimage) && mysqli_query($con, 'UPDATE `recruiter` SET `companyLogo`="' . $new_logo_name . '" WHERE `recruiterId` =' . $_SESSION['recruiterId'] . '')) {

                $result = array("status" => true, "msg" => "Update Successfull.");
            } else {
                $result = array("status" => false, "msg" => "Failed to update Company Logo");
            }
        }
    }


    $query1 = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId` = ' . $_SESSION['recruiterId'] . '');
    $recruiter = mysqli_fetch_assoc($query1);

    $_SESSION["recruiterId"] = $recruiter['recruiterId'];
    $_SESSION["recruiterName"] = $recruiter['recruiterName'];
    $_SESSION["recruiterEmail"] = $recruiter['recruiterEmail'];
    $_SESSION["recruiterProfilepic"] = $recruiter['recruiterProfilepic'];
    $_SESSION["companyName"] = $recruiter['companyName'];

    $result = array("status" => true, "msg" => "Update Successfull.");
} else {
    $result = array("status" => false, "msg" => "Failed to update");
}

echo json_encode($result);
