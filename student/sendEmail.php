
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	</style>

</head>

<body>
	<img src="image/bg-std login.jpg" class="bg-image">


	<div class="container center">


		<div class="column split left">
			<img class="img-responsive centered" src="image/Group 160.png" alt="logo" width="40%" height="auto">
		</div>

		<div class="column split right" style="text-align: left;">
			<h2 style="text-align: center;">STUDENT LOGIN</h2>
			<div class="centered form-box">
				
					<label class="label-1"></label>
					<div class="form-group">
						<input type="text" class="form-control"  placeholder="Enter Student Id" id="studentId" required>
					</div>
					<h6>NOTE:otp will sent to the registered email</h6>


					</script>
					<input type="button" class="btn" onclick="sendOTP()" value="SEND OTP">
		</div>
	

		<!-- <script src="../jquery/jquery-3.6.3.min.js"> -->

		</script>
		<script>
			// Change the type of input to password or text
			function Toggle() {
				var temp = document.getElementById("typepass");
				if (temp.type === "password") {
					temp.type = "text";
				} else {
					temp.type = "password";
				}
			}

			
			//Send OTP
			function sendOTP() {

				var id =document.getElementById('studentId').value;
				var data = "studentId=" + id;
				var XRH = new XMLHttpRequest();


				XRH.onload = function() {
					// studentData =this.responseText;
					// console.log(studentData);
					var obj=JSON.parse(this.responseText);

					if (obj.status) 
					{
						window.location.href = "resetPassword.php";
					} else {
						alert(obj.msg);
					}
				}

				XRH.open('POST', './php/sendOTP.php');
				XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				XRH.send(data);
			}
		</script>



</body>

</html>