<?php
session_start();
if (isset($_SESSION["adminLogin"])) {
    header("location:AdminDashboard.php");
}
?>
<html>

<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>

<body>
    <div class="admin-login">
        <img src="img/profile_pic.png" class="pr1">
        <h1>Login Here</h1>
            <p>Username</p>
            <input type="text" name="username"  id="username"placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" id="password" name="password" placeholder="Enter Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="submit" name="submit" onclick="login()" value="Login">
            <a href="AdminForget.php">Forget Password</a>
            <a href="../home.php" style="margin-left: 55px;">back to home</a>
        
    </div>

    <script>


        function login() {
            var username =document.getElementById('username').value ;
            var password =document.getElementById('password').value;

            // console.log(id);
            // console.log(password);
            var data = "username=" + username + "&password=" + password;

            var XRH = new XMLHttpRequest();

            XRH.onload = function() {
                var result = JSON.parse(this.responseText);
                if (result.status) {
                    
                    window.location.href = "AdminDashboard.php";
                } else {
                    alert(result.msg);
                }
            }

            XRH.open('POST', './php/adminlogin.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);

        }
    </script>
</body>

</html>