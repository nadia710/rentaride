<?php

	require_once 'dataConnectISP.php';
	session_start();
	
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		
		$stmt = $mysqli->prepare("SELECT * FROM list_isp WHERE email = ?");
		if(!$stmt){
			echo "Prepare failed : (". $mysqli->errno .")" . $mysqli->error . "<br>";
		}
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows > 0){
			$user_data = $result->fetch_assoc();
			echo "User data : " . json_encode($user_data) . "<br>";
			
			$email = $_POST['email'] ?? '';
			$car = $_POST['car'] ?? '';
			$plate = $_POST['plate'] ?? '';
			$color = $_POST['color'] ?? '';
			$gear = $_POST['gear'] ?? '';
			$total = $_POST['total'] ?? '';
			
			//Insert data into carsupp table
			$stmt = $mysqli->prepare ("INSERT INTO carsupp (email, car, plate, color, gear, total)
			VALUES (?, UPPER(?), UPPER(?), UPPER(?), UPPER(?), ?)");
			
			if(!$stmt){
				echo "Prepare failed : (". $mysqli->errno . ") " . $mysqli->error . "<br>";
			}
			$stmt->bind_param("ssssss", $user_data['email'], $car, $plate, $color, $gear, $total);
			
			if($stmt->execute()){
				echo "Data succesfully inserted into carsupp table.";
				header("Location: updateSupp.php");
				exit();
			}
			else{
				echo "Error : " . $stmt->error. "<br>";
			}
		}
		else{
			echo "No user found with the provided email.";
		}
	}
	else{
		echo "No email found in session.";
	}
?>