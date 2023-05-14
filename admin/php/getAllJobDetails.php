<?php
include '../../dbconnect.php';
$records = array();

//Fetch Job data
$result = mysqli_query($con, 'SELECT * FROM `job`');
while ($row = mysqli_fetch_assoc($result)) {
    // fetch only recruiter data
    $result1 = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId`=' . $row["recruiterId"] . '');
    $row2 = mysqli_fetch_assoc($result1);
    if ($row2['accountStatus'] == "active") {
        if ($row['jobType'] == "ij") {
            $records[] = array("jobId" => $row["jobId"], "recruiterId" => $row2["recruiterId"], "recruiterName" => $row2["recruiterName"], "recruiterEmail" => $row2["recruiterEmail"], "recruiterPassword" => $row2["recruiterPassword"], "recruiterPhone" => $row2["recruiterPhone"], "recruiterProfilepic" => $row2["recruiterProfilepic"], "companyName" => $row2["companyName"], "companyLogo" => $row2["companyLogo"], "companyDescription" => $row2["companyDescription"], "companyEmail" => $row2["companyEmail"], "companyWebsite" => $row2["companyWebsite"], "companyLocation" => $row2["companyLocation"], "companyAddress" => $row2["companyAddress"], "accountStatus" => $row2["accountStatus"], "jobTitle" => $row["jobTitle"], "jobType" => "Internship + Job", "jobMode" => $row["jobMode"], "jobCategory" => $row["jobCategory"], "jobSalary" => $row["jobSalary"], "lastdate" => $row["lastdate"], "jobLocation" => $row["jobLocation"], "jobVacancy" => $row["jobVacancy"], "jobExperience" => $row["jobExperience"], "jobStipend" => $row['stipend']);
        } else {
            $records[] = array("jobId" => $row["jobId"], "recruiterId" => $row2["recruiterId"], "recruiterName" => $row2["recruiterName"], "recruiterEmail" => $row2["recruiterEmail"], "recruiterPassword" => $row2["recruiterPassword"], "recruiterPhone" => $row2["recruiterPhone"], "recruiterProfilepic" => $row2["recruiterProfilepic"], "companyName" => $row2["companyName"], "companyLogo" => $row2["companyLogo"], "companyDescription" => $row2["companyDescription"], "companyEmail" => $row2["companyEmail"], "companyWebsite" => $row2["companyWebsite"], "companyLocation" => $row2["companyLocation"], "companyAddress" => $row2["companyAddress"], "accountStatus" => $row2["accountStatus"], "jobTitle" => $row["jobTitle"], "jobType" => $row["jobType"], "jobMode" => $row["jobMode"], "jobCategory" => $row["jobCategory"], "jobSalary" => $row["jobSalary"], "lastdate" => $row["lastdate"], "jobLocation" => $row["jobLocation"], "jobVacancy" => $row["jobVacancy"], "jobExperience" => $row["jobExperience"], "jobStipend" => $row['stipend']);
        }
    }
}

echo json_encode($records);
