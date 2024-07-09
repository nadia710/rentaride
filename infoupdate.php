<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'userisp');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $status = $_POST['status'];
        $car = $_GET['car'];
        $email = $_GET['email'];
        $plate = $_GET['plate'];
        $color = $_GET['color'];
        $sql = "UPDATE carsupp SET status='$status' WHERE car='$car' and email='$email' and plate='$plate' and color='$color'";

        if ($mysqli->query($sql) === TRUE) {
            echo '<script>alert("STATUS HAS BEEN UPDATED!!"); window.location.href="update.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
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
            <a href="#">
                <img src="homeicon.png">
            </a>
        </div>
    </div>

    <form role="form" method="post" action="infoupdate.php?email=<?php echo $_GET['email']; ?>&car=<?php echo $_GET['car']; ?>&plate=<?php echo $_GET['plate']; ?>&color=<?php echo $_GET['color']; ?>">
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
                    <?php
                        $email = $_GET['email'];
                        $car = $_GET['car'];
                        $plate = $_GET['plate'];
                        $color = $_GET['color'];
                        $sql = "SELECT * FROM carsupp WHERE email = '$email' AND car = '$car' AND plate = '$plate' AND color = '$color';";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $email = $row["email"];
                                $gear = $row["gear"];
                                $color = $row["color"];
                                $plate = $row["plate"];
                                $car = $row["car"];
                                $status = $row["status"];
                    ?>
                    <table>
                        <tr>
                            <td><?php echo $car; ?></td>
                            <td style="font-size: 13px; color: #9aa5b8;"><?php echo $plate; ?></td>
                            <td><?php echo $color; ?></td>
                        </tr>
                    </table>
                    <hr>
                    <label>GEAR</label><br>
                    <label><?php echo $gear; ?></label>
                    <hr>
                    <label for="status">STATUS</label><br>
                    <select name="status" required>
                        <option value="pending" <?php if ($status == 'pending') echo 'selected'; ?>>PENDING</option>
                        <option value="approved" <?php if ($status == 'approved') echo 'selected'; ?>>APPROVED</option>
                    </select>
                    <hr>
                    <button type="submit" name="updatebtn" class="update-button">UPDATE STATUS</button>
                    <?php
                            }
                        }
                        $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
