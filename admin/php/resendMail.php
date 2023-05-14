<?php
session_start();
include '../../dbconnect.php';

    $to_email=$_SESSION['email'];
    $query=mysqli_query($con,'SELECT * FROM `admin` WHERE `adminEmail`="'.$to_email.'"');

    if(mysqli_num_rows($query)>0)
    {
        $otp =rand(100000,999999);
        $subject = "Forget Password";
        $body = "Your OTP : ".$otp."\nDo not share a OTP.";
        $headers = "From:crms7142001@gmail.com";
        if(mail($to_email, $subject, $body, $headers))
        {
            $time =  $_SERVER["REQUEST_TIME"];
            $_SESSION['email']=$to_email;
            $_SESSION['time']=$time;
            $_SESSION['otp']=$otp;
            header('location:../AdminReset.php');
        }
        else
        {
            echo'<script>alert("Failed to send mail..!!");</script>';
        
        }
    }
    else
    {
        echo'<script>alert("This email does not exist in our Database..!!");</script>';      
    }
?>