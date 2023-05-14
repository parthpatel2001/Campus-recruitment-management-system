<?php
include './../../dbconnect.php';
session_start();

$studentName = $_POST['studentName'];
$studentContact = $_POST['studentContact'];
$studentAddress = $_POST['studentAddress'];

$result = "";
$query = mysqli_query($con,'SELECT * FROM `student` WHERE `studentId` = '.$_SESSION['studentId'].'');
$student = mysqli_fetch_assoc($query);

$old_profile = $student['studentProfilepicture'];
$old_resume = $student['studentResume'];

if(mysqli_query($con,'UPDATE `student` SET `studentName`="'.$studentName.'",`studentPhone`="'.$studentContact.'",`studentAddress`="'.$studentAddress.'" WHERE `studentId` = '.$_SESSION['studentId'].''))
{
    $result = array("status" => true, "msg" => "Update Successfull.");

    if (isset($_FILES['studentProfile']['name']) and !empty($_FILES['studentProfile']['name'])) {

        if (unlink("../ProfilePicture/" . $old_profile)) {

            $new_profile_pic = $_FILES["studentProfile"]["name"];
            $img_target_dir = "../ProfilePicture/";
            $image_ext = explode('.', $new_profile_pic);
            $ext = end($image_ext);
            $new_image_name = rand(100, 9999999) . '.' . $ext;
            $newimage = $img_target_dir . $new_image_name;

            if(move_uploaded_file($_FILES["studentProfile"]["tmp_name"], $newimage)&& mysqli_query($con,'UPDATE `student` SET `studentProfilepicture`="'.$new_image_name.'" WHERE `studentId`='.$_SESSION['studentId'].''))
            {
                $result = array("status" => true, "msg" => "Update Successfull.");
            }
        }
    }

    if(isset($_FILES['studentResume']['name']) and !empty($_FILES['studentResume']['name']))
    {
        if (unlink("../Resume/" . $old_resume)) {
            $new_resume = $_FILES["studentResume"]["name"];
            $resume_target_dir = "../Resume/";
            $resume_ext = explode('.', $new_resume);
            $ext = end($resume_ext);
            $new_resume_name = rand(100, 9999999) . '.' . $ext;
            $newfile = $resume_target_dir . $new_resume_name;

            if(move_uploaded_file($_FILES["studentResume"]["tmp_name"], $newfile)&& mysqli_query($con,'UPDATE `student` SET `studentResume`="'.$new_resume_name.'" WHERE `studentId`='.$_SESSION['studentId'].''))
            {
                $result = array("status" => true, "msg" => "Update Successfull.");
            }
        }
    }

    $query = mysqli_query($con,'SELECT * FROM `student` WHERE `studentId` = '.$_SESSION['studentId'].'');
    $student = mysqli_fetch_assoc($query);

    $_SESSION["studentId"]=$student['studentId'];
    $_SESSION["studentName"]=$student['studentName'];
    $_SESSION["studentEmail"]=$student['studentEmail'];
    $_SESSION["studentProfilepicture"]=$student['studentProfilepicture'];
    $_SESSION["lastLogin"]=  $student["lastLogin"];

}
echo json_encode($result);
