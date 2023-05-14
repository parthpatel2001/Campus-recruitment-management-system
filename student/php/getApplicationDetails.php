<?php
include '../../dbconnect.php';
session_start();
$records = array();
$query = mysqli_query($con,'SELECT * FROM `application` WHERE `studentId` = '.$_SESSION['studentId'].'');
while($row=mysqli_fetch_assoc($query))
{
    $query1 = mysqli_query($con,'SELECT * FROM `job` WHERE `jobId` = '.$row['jobId'].'');
    $row1=mysqli_fetch_assoc($query1);

    $query2 = mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId` = '.$row1['recruiterId'].'');
    $row2=mysqli_fetch_assoc($query2);
    $records []= array("application_on"=>$row['app_no'],"jobTitle"=>$row1['jobTitle'],"studentId"=>$row['studentId'],"jobId"=>$row['jobId'],"applyedDate"=>$row['applyedDate'],"studentName"=>$row['studentName'],"studentEmail"=>$row['studentEmail'],"companyName"=>$row2['companyName']);

}
echo json_encode($records);