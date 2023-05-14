<?php
session_start();
if(isset($_SESSION["login"]))
{
    header("location:myApplication.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    * {
        margin: 0%;
        padding: 0%;
    }

    body {
        font-family: Arial;
        color: white;
    }

    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .left {

        left: 0;

        /*background-color: #20374D;*/
    }

    .right {
        right: 0;
        left: 50;
        /*background-color: #FFB800;*/
    }

    .HOME {
        margin-top: 600px;
        margin-right: 20px;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .centered img {
        width: 150px;
        display: absolute;
        border-radius: 50%;
    }

    .btn {
        width: 100%;
        color: white;
        margin-top: 10px;
        background-color: #20374D;
    }

    .back {
        position: absolute;
        width: 200px;
        height: 30px;
        left: 450px;
        top: 600px;
    }

    .bg-image {
        position: absolute;
        width: 100%;
        height: 100vh;
    }

    .form-box {
        background-color: white;
        color: black;
        width: 50%;
        padding: 20px;
        border-radius: 10px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>

</head>

<body>
    <img src="image/bg-std login.jpg" class="bg-image" alt="student_image">


    <div class="container center">


        <div class="column split left">

            <img class="img-responsive centered" src="image/Group 160.png" alt="logo" width="40%" height="auto">

        </div>
        <!-- <div class="column split right" style="text-align: left;">
            <h2 style="text-align: center;">STUDENT LOGIN</h2>
            <form method="post" action="/php/check_login.php">
                <input type="text" name="enrollment" id="enrollment">
                <input type="password" name="password" id="password">
                <input type="button" name="submit" id="btn" value="submit">
            </form>
        </div>  -->


        <div class="column split right" style="text-align: left;">
            <h2 style="text-align: center;">STUDENT LOGIN</h2>
            <form method='post' action='/php/check_login.php'>
                <div class="centered form-box">

                    <label for="enrollment" class="label-1">Student Id</label>
                    <div class="form-group">
                        <input placeholder="Student Id" type="number" name="enrollment" id="enrollment"
                            class="form-control">
                    </div>
                    <label for="password">Password</label>
                    <div class="form-group">
                        <input placeholder="Password" type="password" id="password" name="pass" class="form-control">
                    </div>
                    <input type="checkbox" onclick="Toggle1()">
                    <strong>Show Password</strong>
                    <input type="button" class="btn" onclick="check_login()" name="" value="LOGIN">

                    <a href="sendEmail.php">Forget password?</a>
                </div>

            </form>
            <div class="column split right HOME" style="text-align: right;">
                <h4>HOME</h4>
            </div>
        </div>
        <script>
        // Change the type of input to password or text
        function Toggle1() {
            var temp = document.getElementById("password");
            var cpass = document.getElementById("cpassword");
            if (temp.type === "password") {
                temp.type = "text";
                cpass.type = "text";
            } else {
                temp.type = "password";
                cpass.type = "password";
            }
        }

        var element = "";

        function _(element) {
            return document.getElementById(element).value;
        }

        function check_login() {
            var id = _('enrollment');
            var password = _('password');

            // console.log(id);
            // console.log(password);
            var data = "enrollment=" + id + "&password=" + password;

            var XRH = new XMLHttpRequest();

            XRH.onload = function() {
                studentData = JSON.parse(this.responseText);
                if (studentData.status) {
                        window.location.href="myApplication.php";
                } else {
                    alert(studentData.msg);
                }
            }

            XRH.open('POST', './php/check_login.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);

        }
        </script>
        <script src="../jquery/jquery-3.6.3.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>