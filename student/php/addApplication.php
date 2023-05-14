<?php
include './../../dbconnect.php';
session_start();

$jobid =$_POST['jobId'];
$applyDate=date("d-m-Y");
$studentId=$_SESSION['studentId'];
$studentName=$_SESSION['studentName'];
$studentEmail =$_SESSION['studentEmail'];
// Check first a student had already registed or not for this job
$result1=mysqli_query($con,'SELECT * FROM `application` WHERE `studentId` ='.$_SESSION['studentId'].' AND `jobId`='.$jobid.'');
if($num=mysqli_num_rows($result1) == 0)
{
    $query="INSERT INTO `application`VALUES ('','$studentId','$jobid','$applyDate','$studentName','$studentEmail')";
    if(mysqli_query($con,$query))
    {
        $result = array("status"=>true,"msg"=>"Application submit successfully..");
    }
    else
    {
        $result = array("status"=>false,"msg"=>"Application not  submit..!!!");
    }
}
else
{
    $result = array("status"=>false,"msg"=>"You have alredy applied for this Job...");
}
echo json_encode($result);
?>