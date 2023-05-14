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

//Determine current page number and number of records to display
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
$page=isset($_POST['page'])?$_POST['page']:1;
$records_per_page = 10;
$offset = ($page - 1) * $records_per_page;

//Retrieve total number of records
$sql = "SELECT COUNT(*) as total FROM student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_records = $row['total'];
$total_pages = ceil($total_records / $records_per_page);

//Retrieve records for current page
$sql = "SELECT * FROM student LIMIT $records_per_page OFFSET $offset";
$result = $conn->query($sql);

$records=array(); 
//Display records
if ($result->num_rows > 0) {
  while($row =mysqli_fetch_assoc($result)) {
    $records[] = array("studentId"=>$row["studentId"],"studentName"=>$row["studentName"],"studentEmail"=>$row["studentEmail"],"studentPassword"=>$row["studentPassword"],"studentPhone"=>$row["studentPhone"],"studentAddress"=>$row["studentAddress"],"studentProfilepicture"=>$row["studentProfilepicture"],"studentCollagename"=>$row["studentCollagename"],"studentBranch"=>$row["studentBranch"],"studentCurrentsemester"=>$row["studentCurrentsemester"],"studentCGPA"=>$row["studentCGPA"],"tenth_Percentage"=>$row["10th_Percentage"],"twelveth_Percentage"=>$row["12th_Percentage"],"studentStartingyear"=>$row["studentStartingyear"],"studentEndingyear"=>$row["studentEndingyear"],"studentResume"=>$row["studentResume"],"lastLogin"=>$row["lastLogin"],"totalPages"=>$total_pages);
  }
} else {
  echo "Data is not found.";
}
echo json_encode($records);

$conn->close();
?>