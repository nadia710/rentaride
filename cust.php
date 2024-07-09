<?php
require_once 'dataConnectISP.php';
session_start();

$sql = "SELECT rc.*, li.name 
        FROM rentcar rc 
        JOIN list_isp li ON rc.email = li.email 
        ORDER BY rc.date DESC";
$result = $mysqli->query($sql);
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
            width: 30px;
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
           margin-top: 20px;
           background-color: #f4f4f4;
           border-radius: 8px;
           overflow: hidden;
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        td, th {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .label {
            padding: 8px 25px;
            border-radius: 18px;
            display: inline-block;
        }

        .pending {
            background-color: #8a6284;
            color: white;
        }

        .using {
            background-color: #836a9c;
            color: white;
        }

        .completed {
            background-color: #66856b;
            color: white;
        }

        .update-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .update-button:hover {
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
            <a href="home.php">
                <img src="homeicon.png">
            </a>
        </div>
    </div>

    <form role="form" method="post" action="inforent.php">
        <div class="sign-out">
            <i class="fa fa-sign-out fa-flip-horizontal"></i>
        </div>
        <div class="container">
            <div class="a">
                <div class="ul">
                    <ul>
                        <li><a class="active" href="cust.php" style="color: black">CUSTOMER</a></li>
                        <li><a class="active" href="carSupplier.php">CAR SUPPLIERS</a></li>
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
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row["name"];
                                $car = $row["car"];
                                $color = $row["color"];
                                $date = $row["date"];
                                $status = $row["status"];
                        ?>
                        <tr onclick="window.location.href='inforent.php?email=<?php echo $row['email'];?>&car=<?php echo $row['car'];?>&color=<?php echo $row['color'];?>&date=<?php echo $row['date'];?>';">
                            <td><?php echo strtoupper($name); ?></td>
                            <td style="color: #6b7278"><?php echo $date; ?></td>
                            <td>
                                <span class="label 
                                    <?php 
                                        echo ($status == 'pending') ? 'pending' : 
                                             (($status == 'using') ? 'using' : 
                                             'completed'); 
                                    ?>">
                                    <?php echo strtoupper ($status); ?>
                                </span>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>No rentals found.</td></tr>";
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
