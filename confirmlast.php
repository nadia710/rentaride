<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			body {
				background-color: #f3f4f6;
				font-family: 'Arial', sans-serif;
				margin: 0;
				padding: 0;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
			}
			
			.confirmation-box {
				background-color: #fff;
				padding: 40px 30px;
				text-align: center;
				border-radius: 15px;
				box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
				max-width: 500px;
				width: 90%;
			}
			
			.confirmation-box h1 {
				color: #4CAF50;
				font-size: 28px;
				margin-bottom: 20px;
				font-weight: bold;
			}
			
			.confirmation-box p {
				font-size: 18px;
				color: #555;
				margin-bottom: 30px;
			}
			
			.confirmation-box .fa {
				color: #4CAF50;
				font-size: 60px;
				margin-bottom: 20px;
			}

			.confirmation-box button {
				background-color: #4CAF50;
				color: white;
				padding: 15px 30px;
				font-size: 16px;
				border: none;
				border-radius: 25px;
				cursor: pointer;
				transition: background-color 0.3s, transform 0.3s;
			}

			.confirmation-box button:hover {
				background-color: #45a049;
				transform: translateY(-2px);
			}

			.confirmation-box button:active {
				background-color: #3e8e41;
			}
		</style>
	</head>
	<body>
		<div class="confirmation-box">
			<i class="fa fa-check-circle"></i>
			<h1>YOUR ORDER IS CONFIRMED!</h1>
			<p>Thank you for renting a car with us.</p>
			<button onclick="window.location.href='custProfile.php'">Go to Home</button>
		</div>
	</body>
</html>
