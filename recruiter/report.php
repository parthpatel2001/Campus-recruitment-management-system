<?php
session_start();
include('../vendor/autoload.php');
$con = mysqli_connect("localhost", "root", "", "campus");


$jobId = array();
$mpdf = new \Mpdf\Mpdf(['enable_html_tables' => true]);
$data = "";

$query = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId`=' . $_SESSION['recruiterId'] . '');
$recruiter = mysqli_fetch_assoc($query);


$data .= '<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Report</title>
</head>

<body>
    <h1 class="title">Campus Recruitement Management System</h1>

    <p class="sub-title">Report on registration per job in "' . $recruiter['companyName'] . '" company</p>';

    $query2 = mysqli_query($con, 'SELECT * FROM `job` WHERE `recruiterId`=' . $_SESSION['recruiterId'] . '');

    while ($job = mysqli_fetch_assoc($query2)) {
        $query3 = mysqli_query($con, "SELECT * FROM `application` WHERE `jobId`=" . $job['jobId'] . "");
        if ($num = mysqli_num_rows($query3) > 0) {

            $data .= '<p class="jobName">Job Name : ' . $job['jobTitle'] . '</p>';
            $data .= '
            <table>
            <thead>
                <tr>
                    <th>Application no.</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Apply Data</th>
                    <th>Resume</th>
                </tr>
            </thead> 
            <tbody>';
            while ($application = mysqli_fetch_assoc($query3)) {
                $query4 = mysqli_query($con, 'SELECT * FROM `student` WHERE `studentId` = ' . $application['studentId'] . '');
                $student = mysqli_fetch_assoc($query4);

                $data .= '<tr>
                <td>' . $application['app_no'] . '</td>
                <td>' . $application['studentName'] . '</td>
                <td>' . $application['studentEmail'] . '</td>
                <td>' . $application['applyedDate'] . '</td>
                <td><a href="../student/Resume/' . $student['studentResume'] . '" target="_blank">view</a></td>
                </tr>';
            }
            $data .= '</tbody></table>';
        }
    }

    $data .= '  
    </body></html>';
    // echo $data;
    $stylesheet = file_get_contents('./css/report.css');
    $mpdf->writeHtml($stylesheet, 1);
    $mpdf->writeHtml($data);
    $mpdf->output();
    ?>
    

    
  