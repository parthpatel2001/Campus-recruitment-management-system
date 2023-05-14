<?php

$username="root";
$password="";
$dbname="campus";
$con = mysqli_connect("localhost","root","","campus");

if(!$con)
{
    echo mysqli_connect_error();
}

?>