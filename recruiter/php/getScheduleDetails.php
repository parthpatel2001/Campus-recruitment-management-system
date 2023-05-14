<?php
session_start();
$con = mysqli_connect("localhost","root","","campus");
$query=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId` = '.$_SESSION['recruiterId'].'');

$record = array();

while($job = mysqli_fetch_assoc($query))
{
    $query1=mysqli_query($con,'SELECT * FROM `schedule` WHERE `jobId` = '.$job['jobId'].'');
    while($schedule = mysqli_fetch_assoc($query1))
    {
        // echo $schedule['scheduleDecription'];
        $record [] = array("scheduleId"=>$schedule['scheduleId'],"jobId"=>$schedule['jobId'],"jobTitle"=>$job['jobTitle'],"scheduleCreateddate"=>$schedule['scheduleCreateddate'],"scheduleTitle"=>$schedule['scheduleTitle'],"scheduleDecription"=>$schedule['scheduleDecription'],"schedulePlacementdate"=>$schedule['schedulePlacementdate'],"scheduleStatus"=>$schedule['scheduleStatus']);
        
    }
}

echo json_encode($record);
