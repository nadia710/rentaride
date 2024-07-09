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
		<style>
        body {
            background-color: black;
            font-size: 16px;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }

		img {
			width: 300px;
		}

		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
		}

		.topbar img {
			width: 50%;
		}

		.link {
			width: 50%;
			display: flex;
			justify-content: flex-end;
			margin-top: 20px;
		}

		.link a {
			background-color: black;
			margin-right: 20px;
			color: white;
			text-decoration: none;
		}

		.link a:hover {
			color: #c7c3c3;
		}

		.link img {
			width: 45px;
			margin-top: -10px;
		}

		.container {
			display: flex;
			height: 100vh;
		}

		.sidebar {
			width: 40%;
			background-color: black;
			color: white;
			padding: 10px;
			overflow-y: auto;
		}

		.sidebar input {
			background-color: black;
			color: white;
			border: none;
		}

		hr {
			margin-bottom: 10px;
			border: 1px solid white;
		}

		.sign-out {
			position: absolute;
			top: 10px;
			right: 10px;
			font-size: 24px;
		}

		.a {
			background-color: #e4e9f0;
			width: 100%;
			overflow-y: auto;
			padding: 20px;
		}

		.a a.active {
			color: #babcbf;
			text-decoration: none;
			margin-top: 20px;
			margin-right: 20px;
			margin-left: 20px;
		}

		.a a:hover {
			color: black;
		}

		.a ul {
			list-style-type: none;
			margin-top: 0;
			padding: 0;
			overflow-y: auto;
		}
			
		li {
			float: left;
			padding: 0;
		}

		.a li a {
			display: block;
			color: #babcbf;
			text-align: center;
			text-decoration: none;
			padding: 0px 70px;
		}

		.a li a:hover {
			color: black;
		}

		.ul hr {
			margin-bottom: 10px;
			border: 1px solid #babcbf;
		}
		
		table {
           width: 100%;
           border-collapse: collapse;
		}

        td, th {
            padding: 12px;
            text-align: center;
            border-bottom: 2px solid #ddd;
        }

        tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }
        
        .label.gender {
            display: inline-block;
            padding: 10px 40px;
            border-radius: 20px;
            color: black;
        }
        .label.gender.male {
            background-color: #83a4cc;
        }
        .label.gender.female {
            background-color: #bf8acf;
        }
		</style>
	</head>
	
	<body>
		<div class="topbar">
			<div class="img">
				<img src="LOGO.png">
			</div>
			
			<div class="link">
				<a href="contact.php">CONTACT US</a>
				<a href="about.php">ABOUT US</a>
				
				<a href="#">
					<img src="homeicon.png">
				</a>
			</div>
		</div>
		
		<form role="form" method="post">	
			<div class="container">
				<div class="a">
					<div class="ul">
						<ul>
							<li><a class="active" href="cust.php">CUSTOMER</a></li>
							<li><a class="active" href="carSupplier.php" style="color: black">CAR SUPPLIERS</a></li>
							<li><a class="active" href="update.php">SYSTEM UPDATE APPROVAL</a></li>
							<li><a class="active" href="rental.php">CAR RENTAL</a></li>
							<li><a class="active" href="report.php">REPORT</a></li>
						</ul>
						<hr>
					</div>
					
					<div class="listCust">
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>Gender</th>
								</tr>
							</thead>
							<tbody>
							<?php	
								$sql = "SELECT * FROM list_isp WHERE user = 'supplier' ORDER BY email ASC";
								$result = $mysqli->query($sql);
								
								if($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$ic = $row["ic"];
										$name = $row["name"];
										$email = $row["email"];
										$phone = $row["phone"];
										$user = $row["user"];
										$gender = $row["gender"];
										$password = $row["password"];
										?>
										<tr onclick="window.location.href='infosupp.php?email=<?php echo $row['email'];?>&user=<?php echo $row['user'];?>';">
											<td><?php echo strtoupper($name); ?></td>
											<td><span class="label gender <?php echo strtolower($gender); ?>"><?php echo strtoupper($gender); ?></span></td>
										</tr>
										<?php
									}
								} else {
									echo "<tr><td colspan='2'>No suppliers found.</td></tr>";
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
