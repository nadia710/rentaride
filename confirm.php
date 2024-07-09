<?php
require_once 'dataConnectISP.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
	<style>
		body {
			font-size: 16px;
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
		}
		
        table {
            border-collapse: collapse;
            width: 70%;
        }
		
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
		
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center>
        <h3 style='font-size:20px'>Customer Information</h3>
        <br><br>
        <table id='myTable'>
            <?php
            // Retrieve session variables
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $car = isset($_SESSION['car']) ? $_SESSION['car'] : '';
            $color = isset($_SESSION['color']) ? $_SESSION['color'] : '';
            $time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
            $addressRent = isset($_SESSION['addressRent']) ? $_SESSION['addressRent'] : '';
            $destination = isset($_SESSION['destination']) ? $_SESSION['destination'] : '';
            $sendpick = isset($_SESSION['sendpick']) ? $_SESSION['sendpick'] : '';
            $date = isset($_SESSION['date']) ? $_SESSION['date'] : '';
            $total = isset($_SESSION['total']) ? $_SESSION['total'] : '';

            // Check if session variables are set
            if ($email && $car && $color && $date) {
                $sql = "SELECT * FROM rentcar WHERE email = ? AND car = ? AND color = ? AND date = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ssss", $email, $car, $color, $date);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $car = htmlspecialchars($row["car"], ENT_QUOTES, 'UTF-8');
                        $color = htmlspecialchars($row["color"], ENT_QUOTES, 'UTF-8');
                        $time = htmlspecialchars($row["time"], ENT_QUOTES, 'UTF-8');
                        $addressRent = htmlspecialchars($row["addressRent"], ENT_QUOTES, 'UTF-8');
                        $destination = htmlspecialchars($row["destination"], ENT_QUOTES, 'UTF-8');
                        $sendpick = htmlspecialchars($row["sendpick"], ENT_QUOTES, 'UTF-8');
                        $date = htmlspecialchars($row["date"], ENT_QUOTES, 'UTF-8');
                        $total = htmlspecialchars($row["total"], ENT_QUOTES, 'UTF-8');
                        
                        // Calculate the total based on time
                        ?>

                        <tr>
                            <th>CAR</th>
                            <td><?php echo $car; ?></td>
                        </tr>
                        <tr>
                            <th>COLOR</th>
                            <td><?php echo $color; ?></td>
                        </tr>
                        <tr>
                            <th>TIME</th>
                            <td><?php echo $time; ?></td>
                        </tr>
                        <tr>
                            <th>ADDRESS</th>
                            <td><?php echo strtoupper($addressRent); ?></td>
                        </tr>
                        <tr>
                            <th>DESTINATION</th>
                            <td><?php echo strtoupper($destination); ?></td>
                        </tr>
                        <tr>
                            <th>SEND/PICK UP</th>
                            <td><?php echo strtoupper($sendpick); ?></td>
                        </tr>
                        <tr>
                            <th>DATE</th>
                            <td><?php echo $date; ?></td>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <td>RM <?php echo $total; ?></td>
                        </tr>
                        
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }
            } else {
                echo "<tr><td colspan='10'>Session variables are not set</td></tr>";
            }
            ?>
        </table>
        <br>
        <button onclick="location.href='confirmlast.php'" type="button" class="btn btn-success">
            <b>CONFIRM ORDER</b>
        </button>
    </center>
</body>
</html>
