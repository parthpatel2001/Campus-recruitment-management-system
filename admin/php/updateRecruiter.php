<?php
include 'dbconnect.php';

$id=$_POST['recruiterId'];
$status=$_POST['status'];

$result1=mysqli_query($con,"SELECT * FROM `recruiter` WHERE `recruiterId`='$id'");
if(mysqli_num_rows($result1)>0)
{
    if($status == "blocked")
    {
        mysqli_query($con,"UPDATE `recruiter` SET `accountStatus`='$status' WHERE `recruiterId`='$id'");
        $result=array("status"=>true,"msg"=>"Blocked Successfully.");
    }
    elseif($status == "deleted")
    {
        mysqli_query($con,"UPDATE `recruiter` SET `accountStatus`='$status' WHERE `recruiterId`='$id'");
        $result=array("status"=>true,"msg"=>"Deleted Successfully.");
    }
    else
    {
        mysqli_query($con,"UPDATE `recruiter` SET `accountStatus`='$status' WHERE `recruiterId`='$id'");
        $result=array("status"=>true,"msg"=>"Unblocked Successfully.");
    }
    
}
else{
    $result=array("status"=>false,"msg"=>"Data Not found.");
}
echo json_encode($result);
