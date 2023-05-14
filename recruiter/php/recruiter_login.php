<?php
session_start();
include '../../dbconnect.php';
$email=$_POST['email'];
$password=$_POST['password'];
$_SESSION["recruiter"]=false;

$query='SELECT * FROM `recruiter` WHERE `recruiterEmail`="'.$email.'"';
$result= mysqli_query($con, $query);
if($row=mysqli_fetch_assoc($result))
{
    if($email==$row['recruiterEmail'] && $password == $row['recruiterPassword'])
    {
        $_SESSION["recruiterId"]=$row['recruiterId'];
        $_SESSION["recruiterName"]=$row['recruiterName'];
        $_SESSION["recruiterEmail"]=$row['recruiterEmail'];
        $_SESSION["recruiterProfilepic"]=$row['recruiterProfilepic'];
        $_SESSION["companyName"]=$row['companyName'];
        $_SESSION["recruiter"]=true;
        // $path=$_SESSION["path"];
        ?><script>
            window.location.href = "../recruiterDashboard.php";
       </script><?php
    }
    else
    {
        ?><script>if(confirm("Invalide Email and Password..")){
            window.location.href = "../recruiterLogin.php";
       }else{
        window.location.href = "../recruiterLogin.php";
       }
       </script>
       <?php
        $_SESSION["recruiter"]=false;
    }
}
else
{
    ?>
    <script>
if (confirm("Data not found...!!")) {
    window.location.href = "../recruiterLogin.php";
} else {
    window.location.href = "../recruiterLogin.php";
}
</script>
<?php
    $_SESSION["login"]=false;

}
?>