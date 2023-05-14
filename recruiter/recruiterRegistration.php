<html>
    <head>
        <title>Recruiter Registration Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <style>
        body{
            margin: 0;
            padding: 0;
            background: url(img/bg3.jpg);
            background-size: 100% ;
            background-position: center;
            background-repeat: no-repeat;
            font-family: sans-serif;        
        }
        .recruiter-regi{
            width: 400px; 
            height:200 px; 
            background: rgba(255, 255, 255, 0.5);
            color: #000000; 
            top: 43%; 
            right: 1%; 
            position: absolute; 
            transform: translate(-50%, -45%); 
            box-sizing: border-box; 
            padding: 70px 30px;
            padding-bottom: 10px;
            border-radius: 44px;
        }

        .logo{
            width: 150px;
            height: auto;
            position: absolute;
            top: 10px;
            margin-right:40%;
            margin-left: 1%;    
        }

        .recruiter-regi h1{
            margin-top: -8px;
            padding: 0 0 30px;
            text-align: center;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .recruiter-regi p{
            margin:0;
            padding: 0;
            font-weight: bold;
        }

        .recruiter-regi input{
            border: none;
            border-bottom: 1px solid #080808;
            background: transparent;
            outline: none;
            height: 35px;
            color: #0f0e0e;
            font-size: 16px;
            width: 100%;
            margin-bottom: 20px;
        }

        

        .recruiter-regi input[type="submit"]
        {
            margin: auto;
            border: none;
            outline: none;
            width: 100px;
            height: 35px;
            background: #CC9494;
            position: static;
            color: #fff;
            font-size: 18px;
            border-radius: 10px;
            text-align: center;
            align-items: center;
            display: grid;
        }

        .recruiter-regi input[type="submit"]:hover
        {
            cursor: pointer;
            background: #39dc79;
            color: #000;
        }

        .recruiter-regi span{
            padding-top: 10px;
        }

        .recruiter-regi a{
            
           padding-top: 10px;
        }
    </style>

    <body>
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div class="recruiter-regi">
                                        
            
            <h1 style="margin-top: 20px;">Register Now</h1>
            <form  method="post"  action="./php/addRecruiter.php" enctype="multipart/form-data">
                <p>First Name:</p>
                <input type="text" name="fname" id="fname" placeholder="Enter Name">
                <p>Last Name:</p>
                <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
                
                <p>Profile Picture :</p>
                <input  type="file"  name="profile" id="profile" accept=".png, .jpg, .jpeg">
                <p>Email:</p>
                <input type="text" name="email" id="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write the email in sequence:username@gmail.com" required>
                <p>Passwprd:</p>
                <input type="password" name="psw" id="psw" placeholder="Enter Password" required>
                
                <p>Mobile:</p>
                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" pattern="[6789][0-9]{9}" title="Plese enter valid mobile number which is starting with 6,7,8 or 9." required>
                <p>Address:</p>
                <input type="text" name="address" id="address" placeholder="Enter Address">
                <input type="submit" name="submit" value="Submit"><br>
                <span>Already on CRMS?</span>
                <a href="recruiterLogin.php">Login here</a>
            </form>

        </div>
        
    </body>
</html>

