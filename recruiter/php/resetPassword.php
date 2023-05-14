<?php
session_start();
include '../../dbconnect.php';
$otp=$_POST['otp'];
$password=$_POST['pass'];

if(isset($_SESSION['otp']))
{
$timestamp =  $_SERVER["REQUEST_TIME"];  
if(($timestamp - $_SESSION['time']) > 120)  
{
    echo json_encode(array("status"=>false, "message"=>"OTP expired. Pls. try again."));
    session_destroy();
}
elseif($_SESSION['otp']==$otp)
{
    if(mysqli_query($con,'UPDATE `recruiter` SET `recruiterPassword`="'.$password.'" WHERE `recruiterEmail`="'.$_SESSION['email'].'"'))
    {
        echo json_encode(array("status"=>true, "message"=>"Password Updated Successfull."));
        session_destroy();
    }
    else
    {
        echo json_encode(array("status"=>false, "message"=>"Password Update failed."));
    }
}
else
{
    echo json_encode(array("status"=>false, "message"=>"Invalid Password"));
}
}
else
{
    echo json_encode(array("status"=>false, "message"=>"OTP expired. Pls. try again."));
}

?>
