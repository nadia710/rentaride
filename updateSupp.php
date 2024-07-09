<?php
	require_once 'dataConnectISP.php';
	session_start();
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
				overflow-y : auto;
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
			
			table {
				width: 100%;
				border-collapse: collapse;
			}

			th, td {
				padding: 12px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}

			tbody tr:hover{
				background-color : #ddd;
				cursor : pointer;
			}
			
			.user-container {
				display: flex;
				justify-content: center;
			}
			
			.user {
				font-size: 100px;
			}
			
			.sign-out {
				position: absolute;
				right: 10px;
				top: 10px;
				cursor: pointer;
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
						<li><a href="addCarSupp.php">ADD NEW CAR</a></li>
						<li><a href="updateSupp.php" style="color:black">UPDATE DETAILS</a></li>
					</ul>
					
					<div class="dropdown">
						<hr>
						<table>
							<thead>
								<tr>
									<th>NO</th>
									<th>CAR MODEL</th>
									<th>NO PLATE</th>
									<th>CAR COLOR</th>
									<th>GEAR</th>
								</tr>
							</thead>
								
							<tbody>
								<?php
									$email = $_SESSION['email'];
									$sql = "SELECT * FROM carsupp WHERE email = '$email' ORDER BY car ASC;";
									$result = $mysqli->query($sql);
									$no = 0;
									
									if($result->num_rows > 0)
									{
										//output data of each row
										while($row = $result->fetch_assoc())    {
											$car = $row["car"];     
											$plate = $row["plate"];
											$color = $row["color"];     
											$gear = $row["gear"];
											$no++;     
											?>
											<tr onclick="window.location.href = 'upCarSupp.php?car=<?php echo $car; ?>&plate=<?php echo $row['plate']; ?>&color=<?php echo $row['color']; ?>';">
												<td align='center'><?php echo $no; ?></td>
												<td align='center'><?php echo $car; ?></td>
												<td><?php echo $plate; ?></td>
												<td><?php echo $color; ?></td>
												<td><?php echo $gear; ?></td>
											</tr>
											<?php
										}
									}
								?>
							<tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
