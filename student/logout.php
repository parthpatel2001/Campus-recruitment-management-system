<?php
include '../dbconnect.php';
session_start();
// Updaet last login
mysqli_query($con,'UPDATE `student` SET `lastLogin`="'.date("d-m-Y") .'" WHERE `studentId`='.$_SESSION["studentId"].'');

session_destroy();  

echo '<script>window.location.href = "../home.php"; </script>';

?>