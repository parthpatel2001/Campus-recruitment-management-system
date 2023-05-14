<?php
session_start();
include '../../dbconnect.php';

$jobId=$_POST['jobId'];
$jobTitle=$_POST['title'];
$vacancy=$_POST['vacancy'];
$type=$_POST['type'];
$exprience=$_POST['exprience'];
$stipend=$_POST['stipend'];
$lastdate=date('d-m-Y',strtotime($_POST['lastdate']));
$salary=$_POST['salary'];
$category=$_POST['category'];
$jobMode=$_POST['workMode'];
$location=$_POST['location'];

// $query="INSERT INTO `job`VALUES ('',$id,'$jobTitle','$type','$jobMode','$category','$stipend','$salary','$lastdate','$location','$vacancy','$exprience')";

$query1="UPDATE `job` SET `jobTitle`='$jobTitle',`jobType`='$type',`jobMode`='$jobMode',`jobCategory`='$category',`stipend`='$stipend',`jobSalary`='$salary',`lastdate`='$lastdate',`jobLocation`='$location',`jobVacancy`='$vacancy',`jobExperience`='$exprience' WHERE `jobId`='$jobId'";
if(mysqli_query($con,$query1))
    {
        echo '<script>if(confirm("Update Successfully.")){ window.location.href = "../rjob.php"; }</script>';
    }
else
    {
echo '<script>if(confirm("Update Failed.")){ window.location.href = "../rjob.php"; }</script>';
    }

?>