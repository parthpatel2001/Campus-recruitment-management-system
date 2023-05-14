<?php
include 'dbconnect.php';
session_start();
$records=array();

$query=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `accountStatus`="active"');

while($row2=mysqli_fetch_assoc($query))
{
    $result1=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$row2['recruiterId'].'');
    
    while($row1=mysqli_fetch_assoc($result1))
    {
        $result=mysqli_query($con,"SELECT * FROM `application` WHERE `jobId`=".$row1['jobId']."");
        while($row=mysqli_fetch_assoc($result))
        {
            $result3=mysqli_query($con,'SELECT * FROM `student` WHERE `studentId`='.$row['studentId'].'');
            $row3=mysqli_fetch_assoc($result3);
            $records []=array("application_on"=>$row['app_no'],"jobTitle"=>$row1['jobTitle'],"studentId"=>$row['studentId'],"jobId"=>$row['jobId'],"applyedDate"=>$row['applyedDate'],"studentName"=>$row['studentName'],"studentEmail"=>$row['studentEmail'],"companyName"=>$row2['companyName'],"studentResume"=>$row3['studentResume']);

        }

    }
}



// $result=mysqli_query($con,"SELECT * FROM `application`");
// while($row=mysqli_fetch_assoc($result))
// {
    
//     // Fetch Job data from table
//     $result1=mysqli_query($con,'SELECT * FROM `job` WHERE `jobId`='.$row['jobId'].'');
//     $row1=mysqli_fetch_assoc($result1);

//     // Fetch recruiter data from table
//     $result2=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row1['recruiterId'].'');
//     $row2=mysqli_fetch_assoc($result2);

//     //Fetch Student data from table
//     $result3=mysqli_query($con,'SELECT * FROM `student` WHERE `studentId`='.$row['studentId'].'');
//     $row3=mysqli_fetch_assoc($result3);
//     $records []=array("application_on"=>$row['app_no'],"jobTitle"=>$row1['jobTitle'],"studentId"=>$row['studentId'],"jobId"=>$row['jobId'],"applyedDate"=>$row['applyedDate'],"studentName"=>$row['studentName'],"studentEmail"=>$row['studentEmail'],"companyName"=>$row2['companyName'],"studentResume"=>$row3['studentResume']);
//     // $records []= array("application_on"=>$row['app_no'],"jobTitle"=>$row1['jobTitle'],"studentId"=>$row['studentId'],"jobId"=>$row['jobId'],"applyedDate"=>$row['applyedDate'],"studentName"=>$row['studentName'],"studentEmail"=>$row['studentEmail'],"companyName"=>$row2['companyName'],"studentResume"=>$row3['studentResume']);
// }

echo json_encode($records);
