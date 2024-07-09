<?php

	//server information
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "userisp";
	
	//create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	
	//check connection
	if($mysqli->connect_error)
	{
		die("Connection failed : ". $mysqli->connect_error);
	}
	
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$ic = $_POST['ic'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$user = $_POST['user'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];
	}
			
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
			
	$sql = "INSERT INTO list_isp (ic, name, email, phone, user, gender, password) 
			VALUES ('$ic', '$name', '$email', '$phone', '$user', '$gender', '$password')";
	$result = mysqli_query($mysqli, $sql);
			
	if($result == '')
	{
		?> <script type="text/javascript"> alert ("Please insert the information!");  </script> <?php
	}
	if($result != '')
	{
		?> <script type="text/javascript"> alert ("Sign up successfully.");  </script> <?php
			echo "<script>window.location.assign('loginISP.php')</script>";
	}
	else
	{
		?> <script type="text/javascript"> alert ("ERROR: Email already exist.");  </script><?php
	}
?>		