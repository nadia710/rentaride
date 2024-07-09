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
            overflow-x: hidden;
            color: white; /* Adjusted text color */
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: black;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .link a:hover {
            background-color: #555;
        }

        .link img {
            width: 45px;
            margin-top: -10px;
        }

        .contact {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .contact img {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
        }

        .about {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 800px; /* Added max-width for responsiveness */
            padding: 20px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            border-radius: 10px;
        }

        .about h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .about h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .about h3 {
            font-size: 18px;
            margin-bottom: 5px;
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
            <a href="home.php">
                <img src="homeicon.png">
            </a>
        </div>
    </div>
    
    <div class="contact">
        <img src="ABOUT.jpg">

        <div class="about">
            <h1>HISTORY OF ORGANIZATION</h1>
			<br>
			
			<h2>2010</h2>
			<h3>Founded to provide reliable transportation solutions in Segamat.</h3>
			<br>
			
			<h2>2017</h2>
			<h3>Joined the Car Rental Association of Malaysia (CRAM), gaining access to industry resources and best practices.</h3>
			<br>
			
			<h2>2017-2020</h2>
			<h3>Experienced significant growth, reinforcing our position in the market.</h3>
        </div>
    </div>
</body>
</html>
