<?php
include '../../dbconnect.php';
$records=array();
session_start();

//fetch recruiter data
$result2=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$_SESSION['recruiterId'].'');
$row2=mysqli_fetch_assoc($result2);

// fetch application data
$result1=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].'');

while($row1=mysqli_fetch_assoc($result1))
{
    $result=mysqli_query($con,'SELECT * FROM `application` WHERE `jobId`='.$row1['jobId'].'');

    while($row=mysqli_fetch_assoc($result))
    {
        $result3=mysqli_query($con,'SELECT * FROM `student` WHERE `studentId`='.$row['studentId'].'');
        $row3=mysqli_fetch_assoc($result3); 

        $records []= array("application_on"=>$row['app_no'],"jobTitle"=>$row1['jobTitle'],"studentId"=>$row['studentId'],"jobId"=>$row['jobId'],"applyedDate"=>$row['applyedDate'],"studentName"=>$row['studentName'],"studentEmail"=>$row['studentEmail'],"companyName"=>$row2['companyName'],"studentResume"=>$row3['studentResume']);

    }
}

sort($records, SORT_ASC);
echo json_encode($records);
