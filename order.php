<?php
require_once 'dataConnectISP.php';
session_start();

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Prepare the query
    $stmt = $mysqli->prepare("SELECT * FROM list_isp WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        echo "No user found with the provided email.";
        exit();
    }
} else {
    echo "No email found in session.";
    exit();
}

// Get car details from URL
$car = isset($_GET['car']) ? $_GET['car'] : '';
$plate = isset($_GET['plate']) ? $_GET['plate'] : '';
$color = isset($_GET['color']) ? $_GET['color'] : '';
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
            font-size: 15px;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            color: white;
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
            margin-top: -13px;
        }

        .container {
            display: flex;
        }

        .sidebar {
            height: 100vh;
            width: 40%;
            background-color: black;
            color: white;
            padding: 10px;
            overflow-y: auto;
            position: relative;
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

        .main {
            display: flex;
            width: 60%;
            padding: 20px;
            background-color: #e4e9f0;
            flex-direction: column;
            overflow-y: auto;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            display: flex;
            justify-content: space-around;
            padding-bottom: 15px;
            border-bottom: 2px solid #ccc;
        }

        li {
            padding: 0;
        }

        li a {
            display: block;
            color: #babcbf;
            text-align: center;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        li a:hover {
            color: black;
        }

        .main hr {
            margin-bottom: 10px;
            margin-top: 15px;
            border: 1px solid #babcbf;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #444;
            color: white;
        }

        tbody tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }

        #myInput {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            transition: border-color 0.3s;
        }

        #myInput:focus {
            border-color: #444;
            outline: none;
        }

        button {
            padding: 10px;
            border-radius: 20px;
            background-color: white;
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
            color: white;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .dropdown {
            margin-bottom: 20px;
			color : black;
        }

        .dropdown label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .dropdown input,
        .dropdown select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .dropdown select {
            background-color: white;
            color: black;
            transition: border-color 0.3s;
        }

        .dropdown select:focus,
        .dropdown input:focus {
            outline: none;
            border-color: #444;
        }

        .dropdown button {
            margin-top: 10px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dropdown button:hover {
            background-color: #0056b3;
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

    <form role="form" method="post" action="saveRent.php">
        <div class="container">
            <div class="sidebar">
                <div class="profile">
                    <center>
                        <i class="fa fa-user-circle-o" style="color: white"></i>
                        <h2>HI!</h2>
                    </center>
                    <hr>
                    <label for="ic">IC NUMBER</label>
                    <label style="margin-left: 52px"> : <?php echo htmlspecialchars($user_data['ic']); ?></label>
                    <hr>
                    <label for="name">FULL NAME</label>
                    <label style="margin-left: 50px"> : <?php echo htmlspecialchars($user_data['name']); ?></label>
                    <hr>
                    <label for="email">EMAIL ADDRESS</label>
                    <label style="margin-left: 15px"> : <?php echo htmlspecialchars($user_data['email']); ?></label>
                    <hr>
                    <label for="phone">PHONE NUMBER</label>
                    <label style="margin-left: 15px"> : <?php echo htmlspecialchars($user_data['phone']); ?></label>
                    <hr>
                    <label for="user">USER TYPE</label>
                    <label style="margin-left: 57px"> : <?php echo htmlspecialchars($user_data['user']); ?></label>
                    <hr>
                    <label for="gender">GENDER</label>
                    <label style="margin-left: 76px"> : <?php echo htmlspecialchars($user_data['gender']); ?></label>
                    <hr>
                </div>
            </div>

            <div class="main">
                <ul>
                    <li><a href="available.php">CAR AVAILABLE</a></li>
                    <li><a href="#" style="color: black">RENT OUR CAR</a></li>
                    <li><a href="status.php">STATUS RENT</a></li>
                </ul>
                <hr>
                <input type="hidden" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                <input type="hidden" id="car" name="car" value="<?php echo htmlspecialchars($car); ?>">
                <input type="hidden" id="plate" name="plate" value="<?php echo htmlspecialchars($plate); ?>">
                <input type="hidden" id="color" name="color" value="<?php echo htmlspecialchars($color); ?>">
                <div class="dropdown">
                    <label for="time">TIME (HOURS)</label>
                    <input type="text" id="time" name="time">
                    <label for="addressRent">ADDRESS</label>
                    <input type="text" id="addressRent" name="addressRent">
                    <label for="destination">DESTINATION</label>
                    <input type="text" id="destination" name="destination">
                    <label for="sendpick">SEND/PICK UP</label>
                    <select name="sendpick" id="sendpick">
                        <option value="choose">CHOOSE ONE</option>
                        <option value="send">SEND</option>
                        <option value="pick">PICK UP</option>
                    </select>
                    <label for="date">CAR RENT DATE</label>
                    <input type="date" id="date" name="date">
                </div>
                <button type="reset" name="clearbtn">CLEAR</button><br>
                <button type="submit">SUBMIT</button>
            </div>
        </div>
    </form>
</body>
</html>
