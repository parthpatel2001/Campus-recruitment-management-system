<?php

$username="root";
$password="";
$dbname="campus";
$con = mysqli_connect("localhost",$username,$password,$dbname);

if(!$con)
{
    echo mysqli_connect_error();
}

?>