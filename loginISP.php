<?php
	require_once 'dataConnectISP.php';
	session_start();
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		
		<style>
			body{
				font-family : Arial, sans-serif;
				background : #f4f4f4;
				display : flex;
				justify-content : center;
				align-items : center;
				height : 100vh;
				margin : 0;
				background-image : url('LOGINSIGNUP.jpg');
				background-repeat : no-repeat;
				background-size : cover;
			}
			
			.container{
				background : #242629;
				padding : 10px 50px 40px;
				border-radius : 20px;
				color : white;
			}
			
			.container label{
				padding : 10px;
				display : block;
				text-align : left;
				margin-bottom : 5px;
			}
			
			.container input{
				padding : 10px;
				margin-bottom : 10px;
				border : 1px solid #ccc;
				border-radius : 10px;
			}
			
			.container a{
				text-decoration : none;
				color : white;
			}
			
			.buttons{
				display : flex;
				justify-content : space-between;
			}
			
			.clearbtn, .loginbtn{
				padding : 10px 20px;
				border : none;
				border-radius : 4px;
				cursor : pointer;
			}
			
			.clearbtn{
				background : #f44336;
				color : black;
			}
			
			.loginbtn{
				background : #2b637a;
				color : black;
			}
			
			.login-form p{
				margin-top : 10px;
			}
			
			.login-from a{
				color : #007BFF;
			}		
			
			.login-form a : hover{
				text-decoration : underline;
			}
		</style>
	</head>
	
	<body>
		<form role = "form" method = "post" action = "savLoginISP.php">
			<div class = "container">
				<h1><center> LOG-IN TO </h1>
				<p><center> RENT-A-RIDE </center></p>
				<hr>
					
				<center><input type = "text" placeholder = "email" name = "email"></center>
				<center><input type = "password" placeholder = "password" name = "password" required></center>
				<center><label><input type="checkbox" name="show" onclick="showPassword()"> Show Password</label></center>
					
				<center><button type = "clear" class = "clearbtn">CLEAR</button>
				<button type = "login" class = "loginbtn">LOG-IN</button>
				
				<label><a href = "signupISP.php">Don't have account yet?</a></label>
				<br>
			</div>
		</form>
		
		<script>
			function showPassword() {
				var x = document.getElementById("password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>
	</body>
</html>