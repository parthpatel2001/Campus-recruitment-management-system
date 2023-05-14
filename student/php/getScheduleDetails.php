<?php
include './../../dbconnect.php';
session_start();

$record = array();
$query = mysqli_query($con,'SELECT * FROM `application` WHERE `studentId` = '.$_SESSION['studentId'].'');
while($row=mysqli_fetch_assoc($query))
{
    $query1 = mysqli_query($con,'SELECT * FROM `schedule` WHERE `jobId` = '.$row['jobId'].'');
    $query2 = mysqli_query($con,'SELECT * FROM `job` WHERE `jobId` = '.$row['jobId'].'');
    $job = mysqli_fetch_assoc($query2);
    while($schedule = mysqli_fetch_assoc($query1))
    {
    $record [] = array("scheduleId"=>$schedule['scheduleId'],"jobId"=>$schedule['jobId'],"jobTitle"=>$job['jobTitle'],"scheduleCreateddate"=>$schedule['scheduleCreateddate'],"scheduleTitle"=>$schedule['scheduleTitle'],"scheduleDecription"=>$schedule['scheduleDecription'],"schedulePlacementdate"=>$schedule['schedulePlacementdate'],"scheduleStatus"=>$schedule['scheduleStatus']);

    }
}
echo json_encode($record);
?>