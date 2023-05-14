<?php
include '../../dbconnect.php';

//Get Recruiter Details
$query = mysqli_query($con,'SELECT * FROM `recruiter` ');

$company_job_records=array();
$column1 = "totalJob";

// Define the sorting function
function compare1($a, $b) {
    if ($a[$GLOBALS['column1']] == $b[$GLOBALS['column1']]) {
        return 0;
    }
    return ($a[$GLOBALS['column1']] > $b[$GLOBALS['column1']]) ? -1 : 1;
}

while($recruiter=mysqli_fetch_assoc($query))
{
    //Get Job Details
    $query1 = mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$recruiter['recruiterId'].' ');
    $total_job= mysqli_num_rows($query1);
    $company_job_records[] = array("companyName"=>$recruiter['companyName'],"totalJob"=>$total_job); 

}
usort($company_job_records,"compare1");
$top_five_jobs = array_slice($company_job_records, 0, 5);


// Fetch top job data in our system show i graph

    $query = mysqli_query($con,'SELECT * FROM `job` ');
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

usort($job_records,"compare");
$top_five = array_slice($job_records, 0, 5);

$records=array("company_job_records"=>$top_five_jobs,"jobRecord"=>$top_five);
echo json_encode($records);
?>
