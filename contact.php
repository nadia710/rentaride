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

        .card {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 50px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card.left {
            top: 30%;
            left: 25%;
        }

        .card.right {
            top: 30%;
            right: 25%; 
        }

        .card .icon {
            width: 60px;
            height: 60px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .card .icon i {
            font-size: 30px;
            color: #333;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .card p {
            margin-bottom: 0;
            font-size: 16px;
            color: #666;
        }

        .card .call-us {
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
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
        <img src="CONTACT.jpg">

        <div class="card left">
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <h3>VISIT US</h3>
            <p>Segamat, Johor</p>
        </div>

        <div class="card right">
            <div class="icon">
                <i class="fas fa-phone"></i>
            </div>
            <h3>CALL US</h3>
            <p><a href="tel:123456789" class="call-us">123-456-789</a></p>
        </div>
    </div>
</body>
</html>
