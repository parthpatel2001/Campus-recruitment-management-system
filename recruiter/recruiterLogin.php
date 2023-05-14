<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Recruiter Login Page</title>
        <link rel="stylesheet" type=text/css href="css/style.css">
    </head>
    <body>
        <h1>Welcome To</h1>
        <h1>Campus Recruitment Management System</h1>
        <div class="recruiter-login">
            <div class="heading">
            <img src="img/i1.png" class="pr1">
            <h2>Recruiter Login Page</h2>
            </div>
  
            <style>
                  *{
            margin: 0%;
            padding: 0%;
        }
                .form_box{
                    width: 450px;
                    min-height: 50vh;
              /* background-color: red; */
              margin: auto;
              margin-top: 100px;
              padding-top: 20px;
                }
              
        .col1{
            width: 90%;
            height: 40px;
            margin: auto;
            margin-top: 30px;
            background-color: rgba(0, 0, 0, 0.507);
            padding: 2px 10px;
            border-radius: 50px;
            display: flex;
        }
        .row1{  
            width: 30px;
            height: auto;
            margin-right: 15px;
            display: flex; justify-content: center; align-items: center;
        }
        .row1 img{
            width: 100%;
            height: auto;
        }
        .row2 input{
            margin: 7px 0px;    
            width: 220px;
            height: 25px;
            border: none;
            color: white;            
            background-color: transparent;
            font-size:large;
            cursor: pointer;
            outline: none;
            transition: all 0.5s ease;
        }
        .row2 input :focus{
            border-bottom: 1px solid white;
            background-color: black;
            
        }
        ::placeholder {
            
    color: #ffffff73;
    font-size: 16px;
}
         .col2{
            width: 90%;
            padding-top: 5px;
            margin: auto;
            color: white;
         }  

         #cb{
            margin-left: 15px;
            color: aqua;           
         }
         .col3{
            margin: 90px;
            margin-top: 30px;
            height: auto;
         }
         .col4{
            margin-top: 30px;
            height: auto;
         }
         .btn{
            width: 90%;
            padding: 10px 17px;
            text-align: center;
            border-radius: 30px;
        border:1px solid rgba(72, 127, 245, 0.91);
            background-color: rgba(72, 127, 245, 0.91);
            color: white;
              
        }

            </style>
            <form method="post" action="./php/recruiter_login.php">
               <div class="form_box">
                <div class="col1">
                    <div class="row1"> <img src="img/i2.png"  alt=""></div>
                    <div class="row2"><input type="email" name="email" placeholder="Email" required></div>
                </div>

                <div class="col1">
                    <div class="row1"> <img  src="img/i3.png"  alt=""></div>
                    <div class="row2"><input type="password" name="password" placeholder="Password" required></div>
                </div>
                <div class="col2">
                    <input type="checkbox"  id="cb" name="cb" alt="">
                <label class= "cbl" for="cb"> Remember me</label> 
                <a style="float: right; text-decoration: none;
  color: white;" href="forgetPassword.php">Forget Password? </a>
                </div>
                <div class="col3" > 
                 <button class="btn">Login</button>
                </div>

                
               </div>
               <div class="col4" > 
                    If you wish to hire a student then <a href="recruiterRegistration.php">Click here</a>
            </div>
               </div>
    
            </form>
            
        </div>
            
    </body>
</html>


    



    