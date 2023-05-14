<?php
session_start();
include '../../dbconnect.php';

$job_records = array();

$query = mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].'');
while($row=mysqli_fetch_assoc($query))
{
    //Get application Details
    $query1 = mysqli_query($con,'SELECT * FROM `application` WHERE `jobId`= '.$row['jobId'].'');
    $total_application=mysqli_num_rows($query1);
    $job_records[] = array("jobId"=>$row['jobId'],"jobName"=>$row['jobTitle'],"totalApplication"=>$total_application); 
}
// Define the column to sort on
$column = "totalApplication";

// Define the sorting function
function compare($a, $b) {
    if ($a[$GLOBALS['column']] == $b[$GLOBALS['column']]) {
        return 0;
    }
    return ($a[$GLOBALS['column']] > $b[$GLOBALS['column']]) ? -1 : 1;
}

if($job_records != "")
{
usort($job_records,"compare");
$top_five = array_slice($job_records, 0, 5);
}

echo json_encode($top_five);
