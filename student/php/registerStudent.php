<?php
session_start();
include '../../dbconnect.php';

$img_target_dir = "../ProfilePicture/";
$resume_target_dir = "../Resume/";
$password=$_POST['password'];
$uploadOk =1 ;

// Lets genearte new file and image name 
$image_ext = explode('.', $_FILES["profile"]["name"]);
$ext = end($image_ext);
$image_name = rand(100, 9999999) . '.' . $ext;
$newimage = $img_target_dir.$image_name;

$resume_ext = explode('.', $_FILES["resume"]["name"]);
$ext1 = end($resume_ext);
$name = '';
$resume_name = rand(100, 9999999) . '.' . $ext1;
$newresume = $resume_target_dir.$resume_name;


if (move_uploaded_file($_FILES["profile"]["tmp_name"], $newimage) )
  {
    if(move_uploaded_file($_FILES["resume"]["tmp_name"], $newresume)) {
        mysqli_query($con,'UPDATE `student` SET `studentProfilepicture`="'.$image_name.'" ,`studentResume` ="'.$resume_name.'" ,`lastLogin`="",`studentPassword`="'.$password.'" WHERE `studentId`='.$_SESSION["studentId"].'');
        $_SESSION["lastLogin"] = "done";
        $_SESSION["studentProfilepicture"]=$newimage;
        $result = array("status"=>TRUE,"msg"=>"Insertion Successfull.");
      } else {
        $result = array("status"=>TRUE,"msg"=>"Insertion failed.");
      }
  }
echo json_encode($result);
?>