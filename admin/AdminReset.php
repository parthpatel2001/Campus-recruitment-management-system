<?php
session_start();

if(!isset($_SESSION['otp']))
{
    header("location:AdminLogin.php");
}
?>

<html>

<head>
    <title>Admin Forget Page</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" /> -->
    <link rel="stylesheet" href="./css/resetPassword.css">
</head>


<body>
    <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

    <div class="admin-forget">

        <img src="img/open lock1.png" class="lock">
        <h1>Reset Your Password</h1>
        <!-- <form> -->
        <p>Enter OTP :</p>
        <input type="number" name="otp" maxlength="6" id="otp" class="otp">
        <p>New Password :</p>
        <input type="password" id="pass" name="pass">
        <p>Confirm Password :</p>
        <input type="password" name="cpass" id="cpass">
        <p style="margin-bottom: 10px; color:red; display: none;" id="errorMsg">Input Field is empty</p>
        <div class="showpassword">
            <!-- <input type="checkbox" id="showPassword" name="showPassword" value="Bike">
                <label for="showPassword"> Show Password</label> -->
            <input type="checkbox" onclick="Toggle1()">
            <strong>Show Password</strong>
        </div>
        <input type="submit" name="submit" onclick="updatePassword()" value="Done">
        <!-- </form> -->
        <div class="input2">
            <a href="../AdminLogin.php">Back to Login Page</a>
            <a href="./php/resendMail.php" id="otp">Resend OTP</a>
        </div>
    </div>
    <script>

        // Global Variable
        var obj;
        // Change the type of input to password or text
        function Toggle1() {
            var temp = document.getElementById("pass");
            var cpass = document.getElementById("cpass");
            if (temp.type === "password") {
                temp.type = "text";
                cpass.type = "text";
            } else {
                temp.type = "password";
                cpass.type = "password";
            }
        }

        function updatePassword() {
            var OTP = document.getElementById('otp').value;
            var pass = document.getElementById('pass').value;
            var cpass = document.getElementById('cpass').value;
            var errorMsg = document.getElementById('errorMsg');

            var data="otp="+OTP+"&pass="+pass;

            if (OTP == "" || pass == "" || cpass == "") {
                errorMsg.innerHTML = "Input Field is empty...!!";
                errorMsg.style.display = "block";
            } else if (OTP.length != 6) {
                errorMsg.innerHTML = "Please Enter 6 digits in OTP field..";
                errorMsg.style.display = "block";
            } else if (pass != cpass) {
                errorMsg.innerHTML = "Password and Confirm password are not same...!!";
                errorMsg.style.display = "block";
            }else if(!/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/.test(pass))
        {
            errorMsg.innerHTML = "Please make a Strong Password.. (at least use one uppercase character , one lowercase character ,one number ,one special character in password)";
            errorMsg.style.display = "block";
        } else {
                errorMsg.style.display = "none";
                var XRH = new XMLHttpRequest();
                XRH.onload = function() {
                    obj = JSON.parse(this.response);
                    console.log(obj);
                    if(obj.status)
                    {
                        if(confirm(obj.message))
                        {
                        window.location.href="AdminLogin.php";
                        }
                        else
                        {
                        window.location.href="AdminLogin.php";
                        }
                    }
                    else
                    {
                        alert(obj.message);
                    }
                }
            
                XRH.open('POST', './php/resetPassword.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send(data);
        }
    }
    </script>
</body>

</html>