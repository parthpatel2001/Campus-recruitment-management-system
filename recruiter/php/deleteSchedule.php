<?php
include '../../dbconnect.php';

$scheduleId=$_POST['scheduleId'];

    if(mysqli_query($con,'DELETE FROM `schedule` WHERE `scheduleId` = '.$scheduleId.''))
    {  
        $result=array("status"=>true,"msg"=>"Delete Successfully...!");
    }
    else
    {
        $result=array("status"=>true,"msg"=>"Failed to delete schedule...!");
    }


echo json_encode($result);
?>