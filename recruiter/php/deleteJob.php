<?php
include '../../dbconnect.php';
$Jobid=$_POST['id'];
// $enrollment=65498;

$result=mysqli_query($con,"SELECT * FROM `job` WHERE `jobId` = $Jobid");

if(mysqli_num_rows($result)==0)
{
    $result=array("status"=>false,"msg"=>"Job does not Exist.");
}
else{
    if(mysqli_query($con,"DELETE FROM `job` WHERE `jobId` = $Jobid") && mysqli_query($con,'DELETE FROM `application` WHERE `jobId`= '.$Jobid.''))
    {  
        $result=array("status"=>true,"msg"=>"Delete Successfully...!");
    }
    else
    {
        $result=array("status"=>true,"msg"=>"Delete Failed...!");
    }
}


echo json_encode($result);
?>