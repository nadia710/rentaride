<?php
	require_once 'dataConnectISP.php';
	session_start();

	if ($mysqli->connect_error) {
		die("Connection failed: ". $mysqli->connect_error);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		// Use prepared statements to prevent SQL injection
		$stmt = $mysqli->prepare("SELECT * FROM list_isp WHERE email =? AND password = ?");
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows === 1) {
			$user = $result->fetch_assoc();

			if ($user['user'] == 'admin') {
				$_SESSION['email'] = $user['name'];
				?> <script type="text/javascript"> alert("Login successfully.");  </script> <?php
				echo "<script>window.location.assign('home.php')</script>";
				exit;
			} 
			elseif ($user['user'] == 'customer') {
				$_SESSION['email'] = $user['email'];
				?> <script type="text/javascript"> alert("Login successfully.");  </script> <?php
				echo "<script>window.location.assign('custProfile.php')</script>";
				exit;
			}
			elseif ($user['user'] == 'supplier'){
				$_SESSION['email'] = $user['email'];
				?> <script type="text/javascript"> alert("Login succesfully."); </script> <?php
				echo "<script>window.location.assign('suppProfile.php')</script>";
				exit;
			}
		} 
		else {
		   ?> <script type="text/javascript"> alert("Username or Password is incorrect");  </script><?php
		   echo "<script>window.location.assign('loginISP.php')</script>";
		}
	}
?>