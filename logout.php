<?php
session_start();

// mysqli_query($con,'UPDATE `student` SET `lastLogin`= "'.$date.'" WHERE `studentId`="'.$enrollment.'"');

session_destroy();
echo '<script>window.location.href = "home.php"; </script>';
?>