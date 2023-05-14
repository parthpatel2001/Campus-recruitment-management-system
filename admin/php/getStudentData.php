<?php
//Connect to database and select table
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";

$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Retrieve records for current page
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$total_pages=mysqli_num_rows($result);


$records=array(); 
//Display records
if ($result->num_rows > 0) {
  while($row =mysqli_fetch_assoc($result)) {
    $records[] = array("studentId"=>$row["studentId"],"studentName"=>$row["studentName"],"studentEmail"=>$row["studentEmail"],"studentPassword"=>$row["studentPassword"],"studentPhone"=>$row["studentPhone"],"studentAddress"=>$row["studentAddress"],"studentProfilepicture"=>$row["studentProfilepicture"],"studentCollagename"=>$row["studentCollagename"],"studentBranch"=>$row["studentBranch"],"studentCurrentsemester"=>$row["studentCurrentsemester"],"studentCGPA"=>$row["studentCGPA"],"tenth_Percentage"=>$row["10th_Percentage"],"twelveth_Percentage"=>$row["12th_Percentage"],"studentStartingyear"=>$row["studentStartingyear"],"studentEndingyear"=>$row["studentEndingyear"],"studentResume"=>$row["studentResume"],"lastLogin"=>$row["lastLogin"],"totalPages"=>$total_pages);
  }
} 
echo json_encode($records);

$conn->close();
?>