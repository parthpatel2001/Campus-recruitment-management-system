<?php
session_start();
include './../../dbconnect.php';

$_SESSION['status']=false;

	$studentId=$_POST['studentId'];
	// $studentId=122;
    
    $query=mysqli_query($con,'SELECT * FROM `student` WHERE `studentId`='.$studentId.'');

    if($num=mysqli_num_rows($query)==1)
    {
		$row=mysqli_fetch_assoc($query);
		$to_email=$row['studentEmail'];
		$timestamp =  $_SERVER["REQUEST_TIME"];
		$_SESSION['time'] = $timestamp;

        $otp =rand(100000,999999);
        $subject = "Forget Password";
        $body = "Your OTP : ".$otp."\nDo not share a OTP.";
        $headers = "From:crms7142001@gmail.com";
        if(mail($to_email, $subject, $body, $headers))
        {
            $_SESSION['studentId']=$studentId;
			$_SESSION['studentEmail']=$to_email;
            $_SESSION['otp']=$otp;
            $_SESSION['status']=true;
            $status=array("status"=>true,"msg"=>"OTP send mail Successfull..!!");        
        }
        else
        {
            $status=array("status"=>false,"msg"=>"Failed to send mail..!!");        
        }
    }
	else{
        $status=array("status"=>false,"msg"=>"The Enrollment dose not exist in our Database..!!");
	}
echo json_encode($status);
?>
