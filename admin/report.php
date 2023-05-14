<?php
include('../vendor/autoload.php');

$con = mysqli_connect("localhost", "root", "", "campus");


// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['enable_html_tables' => true]);

$recruiterId = array();
$jobId = array();
$data = "";
$table = "";

$recruiter = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `accountStatus`="active"');

while ($row = mysqli_fetch_assoc($recruiter)) {

    $job = mysqli_query($con, 'SELECT * FROM `job` WHERE `recruiterId`=' . $row['recruiterId'] . '');

    if ($num = mysqli_num_rows($job) > 0) {
        while ($row1 = mysqli_fetch_assoc($job)) {

            $application = mysqli_query($con, 'SELECT * FROM `application` WHERE `jobId`=' . $row1['jobId'] . '');
            if ($num = mysqli_num_rows($application) > 0) {
                $recruiterId[] += $row['recruiterId'];
                $jobId[] += $row1['jobId'];
            }
        }
    }
}

sort($jobId);
$recruiterId = array_unique($recruiterId);

// foreach ($recruiterId as $item) {
//     echo $item . "\n";
// }

$data .= '<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
    <link rel="stylesheet" href="./css/report.css">
</head>
<body>
    <h1>Campus Recruiter Management System</h1>
    <h4 class="sub-title">Report on total registration per jobs</h4>';

foreach ($recruiterId as $item) {

    $recruiter = mysqli_query($con, 'SELECT * FROM `recruiter` WHERE `recruiterId`=' . $item . '');
    while ($row = mysqli_fetch_assoc($recruiter)) {
        $data .= '<p class="companyName">' . $row['companyName'] . '</p>';

        $job = mysqli_query($con, 'SELECT * FROM `job` WHERE `recruiterId`=' . $row['recruiterId'] . '');

        while ($row1 = mysqli_fetch_assoc($job)) {
            if (in_array($row1['jobId'], $jobId)) {
                $application = mysqli_query($con, 'SELECT * FROM `application` WHERE `jobId`=' . $row1['jobId'] . '');
                $total_application = mysqli_num_rows($application);
                $data .= '<p class="jobName">Job Name : ' . $row1['jobTitle'] . '</p><p>Total Application: ' . $total_application . '</p>';

                $data .='
                <table>
                    <thead>
                    <tr>
                        <th>Application No.</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Apply date</th>
                        <th>Resume</th>
                        </tr>
                    </thead>
                    <tbody>';
                while ($row3 = mysqli_fetch_assoc($application)) {

                    $student = mysqli_query($con, 'SELECT * FROM `student` WHERE `studentId`=' . $row3['studentId'] . '');
                    $row4 = mysqli_fetch_assoc($student);

                    $data .= '<tr> <td>' . $row3['app_no'] . '</td>
                        <td>' . $row3['studentName'] . '</td>
                        <td>' . $row3['studentEmail'] . '</td>
                        <td>' . $row3['applyedDate'] . '</td>
                        <td><a href="../student/Resume/' . $row4['studentResume'] . '" target="_blank">view</a></td></tr>';
                }
                $data .= '  </tbody></table>';
            }
        }
    }
}

$data .= '</body></html>';

// echo $data;
$stylesheet = file_get_contents('./css/report.css');
$mpdf->writeHtml($stylesheet, 1);
$mpdf->writeHtml($data);
$mpdf->output();
