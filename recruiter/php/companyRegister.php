<?php
session_start();
include '../../dbconnect.php';
$companyName= $_POST['companyName'];
$companyEmail=$_POST['companyEmail'];
$companyWebsitelink=$_POST['companyWeblink'];
$companyLocation=$_POST['companyLocation'];
$description=$_POST['companyDesc'];
$companyAddress=$_POST['companyAddress'];

$query = mysqli_query($con,'SELECT * FROM `recruiter` WHERE `companyEmail`="'.$companyEmail.'"');
$num = mysqli_num_rows($query);

if($num == 0)
{
// create a new name for image
$img_target_dir="../company logo/";
$image_ext = explode('.', $_FILES["companyLogo"]["name"]);
$ext = end($image_ext);
$image_name = rand(100, 9999999) . '.' . $ext;
$companyLogo = $img_target_dir.$image_name;

$result = "";
if (move_uploaded_file($_FILES["companyLogo"]["tmp_name"], $companyLogo) )
  {
    if(mysqli_query($con,'UPDATE `recruiter` SET `companyName`="'.$companyName.'",`companyLogo`="'.$image_name.'",`companyDescription`="'.$description.'",`companyEmail`="'.$companyEmail.'",`companyWebsite`="'.$companyWebsitelink.'",`companyLocation`="'.$companyLocation.'",`companyAddress`="'.$companyAddress.'",`accountStatus`="active" WHERE `recruiterId`='.$_SESSION['recruiterId'].'')) {      
        $result = array("status"=>TRUE,"msg"=>"Registration Successfull.");
    $_SESSION["companyName"]="done";

      } else {
        $result = array("status"=>FALSE,"msg"=>"Registration failed.");
      }
  }
}
else
{
  $result = array("status"=>FALSE,"msg"=>"This Email is already Registed...");
}
echo json_encode($result);

?>