<!DOCTYPE hmtl>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			body{
				background-color : black;
				font-size : 19;
			}
			
			img{
				width : 200px;
				margin-top : 500px;
			}
			
			.container{
				display : flex;
			}
			
			.sidebar{
				width : 40%;
				background-color : black;
				color : white;
				height : 100%;
				padding : 20px;
				margin-top : -40px;
				top : 0;
				bottom : 0;
			}
			
			.sidebar input{
				background-color : black;
				color : white;
				border : none;
			}
			
			hr{
				margin-bottom : 10px;
				border : 1px solid white;
			}
			
			.main{
				display : flex;
				gap : 40px;
				background-color : #e4e9f0;
				width : 60%;
				height : 100%;
				padding : 20px;
				margin-top : -40px;
			}
			
			.main a {
				display : block;
				text-decoration: none;
			}

			.main a.active {
				color: #babcbf;
			}

			.main a:hover{
				color: black;
			}
		
		</style>
	</head>
	
	<body>
		<div class = "topbar">
			<div class = "img">
				<img src = "LOGO.png">
			</div>
		</div>
		
		<form role = "form" method = "post">
			<div class = "container">
				<div class = "sidebar">
					<div class = "profile">
						<center><i class = "fa fa-user fa-lg fa-fw"></i>
						<h2>HI!</h2></center>
						<hr>
						
						<label for = "ic">IC NUMBER</label> <label style = "margin-left : 52px"> : </label> 
						<input type = "text" id = "ic" name = "ic" required>
						<hr>
						
						<label for = "name">FULL NAME</label> <label style = "margin-left : 50px"> : </label>
						<input type = "text" id = "name" name = "name" required>
						<hr>
						
						<label for = "email">EMAIL ADDRESS</label> <label style = "margin-left :15px"> : </label>
						<input type = "text" id = "email" name = "email" required>
						<hr>
						
						<label for = "phone">PHONE NUMBER</label> <label style = "margin-left : 15px"> : </label>
						<input type = "text" id = "phone" name = "phone" required>
						<hr>
						
						<label for = "user">USER TYPE</label> <label style = "margin-left : 57px"> : </label>
						<input type = "text" id = "user" name = "user" required>
						<hr>
						
						<label for = "birth">DATE OF BIRTH</label> <label style = "margin-left : 25px"> : </label>
						<input type = "text" id = "birth" name = "birth" required>
						<hr>
						
						<label for = "gender">GENDER</label> <label style = "margin-left : 76px"> : </label>
						<input type = "text" id = "gender" name = "gender" required>
						<hr>
					</div>
				</div>
				
				<div class = "main">
					<a class = "active" href = "">CUSTOMER</a>
					<a class = "active" href = "">CAR SUPPLIERS</a>
					<a class = "active" href = "">SYSTEM UPDATE APPROVAL</a>
					<a class = "active" href = "">CAR RENTAL</a>
					<a class = "active" href = "">REPORT</a>
				</div>
			</div>
			
		</form>
	</body>
</html>