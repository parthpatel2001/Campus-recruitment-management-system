<?php
$studentEnrollment=123;
$studentPassword=123455;
$to_email = "parthpatel20@gnu.ac.in";
$subject = "Greeting From Placement Cell ";
$body = "Dear Student,\n\nYour Registration has completed in Placement cell. \n\n You can login using Your Enrollment and Password given below .\n\nEnrollment :$studentEnrollment \nPassword : $studentPassword \n\n Link: http://localhost:3000/student/studentLogin.php \n\nThank You.";
$headers = "From:crms7142001@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
// mail($to_email, $subject, $body, $headers)
?>