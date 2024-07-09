<?php
	require_once 'dataConnectISP.php';
	session_start();

	// Check if the user is logged in
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];

		// Prepare the query
		$stmt = $mysqli->prepare("SELECT email FROM list_isp WHERE email =?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['email'] = $row["email"]; // Set the session variable only once
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
		<script src="https://kit.fontawesome.com/18f5dc28c3.js" crossorigin="anonymous"></script>
		
		<style>
			body {
				background-color: black;
				font-size: 16px;
				margin: 0;
				padding: 0;
				font-family: 'Open Sans', sans-serif;
			}
			
			img{
				width : 300px;
			}
			
			.topbar {
				display : flex;
				justify-content : space-between;
				align-items : center;
				padding : 10px;
			}
			
			.topbar img{
				width : 50%;
			}
			
			.link{
				width : 50%;
				display : flex;
				justify-content : flex-end;
				margin-top : 20px;
			}
			
			.link a{
				background-color: black;
				margin-right: 20px;
				color: white;
				text-decoration: none;
			}
			
			.link a:hover{
				color : #c7c3c3;
			}
			
			.link img{
				width : 45px;
				margin-top : -13px;
			}
			
			.container{
				display : flex;
			}
			
			.sidebar{
				height : 100vh;
				width : 40%;
				background-color : black;
				color : white;
				padding : 10px;
				overflow-y : auto;
				position: relative;
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
				width : 60%;
				padding : 20px;
				background-color : #e4e9f0;
				flex-direction : column;
			}
			
			ul{
				list-style-type : none;
				margin : 0;
				padding : 0;
				overflow-y : auto;
			}
			
			li{
				float : left;
				padding : 0;
			}
			
			li a{
				display : block;
				color : #babcbf;
				text-align : center;
				text-decoration : none;
				padding : 0px 140px;
			}
			
			li a:hover{
				color : black;
			}
			
			.main hr{
				margin-bottom : 10px;
				border : 1px solid #babcbf;
			}
			
			.dropdown input{
				border-radius : 20px;
				padding : 3px;
				background-color : #b0b2b5;
				box-shadow : none;
				border : none;
			}
			
			.dropdown{
				padding : 10px;
				margin-bottom : 10px;
				padding : 0 10px 20px;
			}
			
			.dropdown radio{
				border : none;
			}
			
			.main button{
				border-radius : 20px;
				width : 90px;
				border : none;
				padding : 10px;
				background-color : #b0b2b5;
			}
			
			.user-container {
				display: flex;
				justify-content: center;
			}
			
			.user {
				font-size: 100px;
			}
			
			.sign-out {
				cursor: pointer;
				text-align: right;
			}

			.update-button {
				background-color: white;
				border: none;
				color: black;
				padding: 10px 24px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				border-radius: 20px;
			}
		</style>
		
		<script>
			function confirmLogout() {
				if (confirm("Are you sure you want to log out?")) {
					window.location.href = "loginISP.php";
				}
			}
		</script>
	</head>
	
	<body>
		<div class="topbar">
			<div class="img">
				<img src="LOGO.png">
			</div>
			
			<div class="link">
				<a href="contact.php">CONTACT US</a>
				<a href="about.php">ABOUT US</a>
				
				<a href="suppProfile.php">
					<img src="homeicon.png">
				</a>
			</div>
		</div>
		
		<form role="form" method="post" action="saveAddcarSupp.php">	
			<div class="container">
				<div class="sidebar">
					<div class="sign-out" onclick="confirmLogout()">
						<i class="fa fa-sign-out fa-flip-horizontal fa-2x" data-fa-transform="right-9"></i>
					</div>
					<div class="profile">
						<center>
							<div class="user-container">
								<div class="user">
									<i class="fa-solid fa-circle-user"></i>
								</div>
							</div>
							<h2>HI!</h2>
						</center>
						<hr>

						<?php
						if(isset($_SESSION['email'])) {
							require_once 'dataConnectISP.php'; 

							$email = $_SESSION['email'];
							$sql = "SELECT * FROM list_isp WHERE email = '$email'";
							$result = $mysqli->query($sql);

							if ($result && $result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$ic = $row["ic"];
								$name = $row["name"];
								$phone = $row["phone"];
								$user = $row["user"];
								$gender = $row["gender"];
								?>

								<label for="ic">IC NUMBER</label> <label style="margin-left: 52px"> : </label>
								<label for="icN"><?php echo htmlspecialchars($ic); ?></label>
								<hr>

								<label for="name">FULL NAME</label> <label style="margin-left: 50px"> : </label>
								<label for="n"><?php echo htmlspecialchars(strtoupper($name)); ?></label>
								<hr>

								<label for="email">EMAIL ADDRESS</label> <label style="margin-left: 15px"> : </label>
								<label for="e"><?php echo htmlspecialchars($_SESSION['email']); ?></label>
								<hr>

								<label for="phone">PHONE NUMBER</label> <label style="margin-left: 15px"> : </label>
								<label for="p"><?php echo htmlspecialchars($phone); ?></label>
								<hr>

								<label for="user">USER TYPE</label> <label style="margin-left: 57px"> : </label>
								<label for="u"><?php echo htmlspecialchars(strtoupper($user)); ?></label>
								<hr>

								<label for="gender">GENDER</label> <label style="margin-left: 76px"> : </label>
								<label for="g"><?php echo htmlspecialchars(strtoupper($gender)); ?></label>
								<hr>
								<br><br>

								<center>
									<button type="button" class="update-button" name="updatebtn" onclick="window.location.href='updateProf.php'">UPDATE PROFILE</button>
								</center>
							<?php
							} else {
								echo '<p>No profile data found.</p>';
							}
						} else {
							echo '<p>User session not found. Please log in.</p>';
						}
						?>
					</div>
				</div>
				
				<div class="main">
					<ul>
						<li><a href="addCarSupp.php" style="color:black">ADD NEW CAR</a></li>
						<li><a href="updateSupp.php">UPDATE DETAILS</a></li>
					</ul>
					
					<div class="dropdown">
						<hr>
						<input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">

						<label for="model">CAR MODEL : </label><br>
						<input type="text" id="car" name="car" required>
						<br><br>
						
						<label for="plate">NO PLATE : </label><br>
						<input type="text" id="plate" name="plate" required>
						<br><br>
						
						<label for="color">COLOUR : </label><br>
						<input type="text" id="color" name="color" required>
						<br><br>
						
						<label for="total">TOTAL RENT PER HOUR : </label><br>
						<input type="text" id="total" name="total" required>
						<br><br>
						
						<label for="gear">TYPE OF GEAR : </label><br>
						<input type="radio" id="auto" name="gear" value="auto" required>
						<label for="option1">AUTO</label>
						<input type="radio" id="manual" name="gear" value="manual" required>
						<label for="option2">MANUAL</label><br>
					</div>
					
					<button type="submit" name="submitbtn">SUBMIT</button>
				</div>
			</div>
		</form>
	</body>
</html>
