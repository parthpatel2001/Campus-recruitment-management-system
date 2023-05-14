<?php
include 'dbconnect.php';

function createRandomPassword()
{

    $chars = "ABCDEFJHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;
}


$studentEnrollment = $_POST['studentEnrollment'];
$studentName = $_POST['studentName'];
$studentEmail = $_POST['studentEmail'];
$studentPassword = createRandomPassword();
$studentPhone = $_POST['studentPhone'];
$studentAddress = $_POST['studentAddress'];
$pp_path = "NA";
$studentCollagename = $_POST['studentCollagename'];
$studentBranch = $_POST['studentBranch'];
$studentCurrentsemester = $_POST['studentCurrentsemester'];
$studentCGPA = $_POST['studentCGPA'];
$tenthmark = $_POST['tenthmark'];
$twelvethmark = $_POST['twelvethmark'];
$studentStartingYear = $_POST['studentStartingYear'];
$studentEndingYear = $_POST['studentEndingYear'];
$studentResume = "NA";
$lastlogin = "NA";

$result = mysqli_query($con, "SELECT * FROM `student` WHERE `studentEmail`= '$studentEmail' OR `studentId`=$studentEnrollment");

if (mysqli_num_rows($result) > 0) {



    $result1 = array("status" => false, "msg" => "Enrollment or email is already Exist.");
} else {
    $query1 = "INSERT INTO `student`(`studentId`, `studentName`, `studentEmail`, `studentPassword`, `studentPhone`, `studentAddress`, `studentProfilepicture`, `studentCollagename`, `studentBranch`, `studentCurrentsemester`, `studentCGPA`, `10th_Percentage`, `12th_Percentage`, `studentStartingyear`, `studentEndingyear`, `studentResume`, `lastLogin`) VALUES ($studentEnrollment,'$studentName','$studentEmail','$studentPassword','$studentPhone','$studentAddress','$pp_path','$studentCollagename','$studentBranch',$studentCurrentsemester,'$studentCGPA','$tenthmark','$twelvethmark', $studentStartingYear, $studentEndingYear,'$studentResume','$lastlogin')";

    $to_email = $studentEmail;
    $subject = "Greeting From Placement Cell ";
    $body = "Dear Student,\n\nYour Registration has completed in Placement cell. \n\n You can login using Your Enrollment and Password given below .\n\nEnrollment :$studentEnrollment \nPassword : $studentPassword \n\n Link: http://localhost:3000/student/studentLogin.php \n\nThank You.";
    $headers = "From:crms7142001@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {
        if (mysqli_query($con, $query1)) {

            $result1 = array("status" => true, "msg" => "Inserted Successfully.");
        } else {
            $result1 = array("status" => false, "msg" => "Insertion Failed..");
        }
    } else {
        $result1 = array("status" => false, "msg" => "Failed to send mail.");
    }
}
echo json_encode($result1);
