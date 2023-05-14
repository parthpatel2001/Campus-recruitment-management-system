<?php
session_start();
include './php/dbconnect.php';


if(isset($_POST['send_otp']))
{
    $to_email=$_POST['email'];
    
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
            header('location:AdminReset.php');
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

}
?>
<html>  
    <head>
        <title>Admin Forget Page</title>
        <link rel="stylesheet" type="text/css" href="css/forgetPassword.css">
        <link rel="stylesheet" href="./css/adminlogin.css">
    </head>
    <body>
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div class="admin-forget">
            <img src="img/profile_pic.png" class="pr1">
            <img src="img/lock.png" class="lock">
            <form action="" method="post">  
                <p>Forgot Your Password</p> <br>
                <input type="text" name="email" placeholder="Type Your Email">
               
                <input type="submit" name="send_otp" value="Send" required>
                <a href="../home.php" style="text-decoration: none;color: white;">back to home</a>
                
            </form>
        </div>   
    </body>
</html>