<?php

session_start();

if($_SESSION["companyName"]=="")
{
    $result=array("status"=>"not register");
}
else
{
    $result=array("status"=>"registed");
}
echo json_encode($result);

?>