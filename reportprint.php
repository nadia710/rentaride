<?php
require_once 'dataConnectISP.php';
session_start();

$totalIncome = 0;

if (isset($_GET['month'])) {
    $monthYear = $_GET['month'];
    $dateObj = DateTime::createFromFormat('F Y', $monthYear);
    $startDate = $dateObj->format('Y-m-01');
    $endDate = $dateObj->format('Y-m-t');

    $sql = "SELECT rc.*, li.name 
            FROM rentcar rc 
            JOIN list_isp li ON rc.email = li.email 
            WHERE rc.date BETWEEN '$startDate' AND '$endDate' 
            ORDER BY rc.date ASC";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Error: " . $mysqli->error;
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
            font-size: 16px;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            padding: 10px 20px;
        }

        .topbar img {
            height: 50px;
        }

        .link a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .link a:hover {
            background-color: #575757;
        }

        .link img {
            width: 30px;
            height: 30px;
            vertical-align: middle;
        }

        .container {
            display: flex;
            height: calc(100vh - 70px);
        }

        .content {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .content h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .total {
            font-weight: bold;
            text-align: right;
            padding-right: 20px;
        }

        .total-amount {
            background-color: #d9edf7;
            font-weight: bold;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .buttons a, .buttons button {
            background-color: #333;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover, .buttons button:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>
    <div class="topbar">
        <img src="LOGO.png" alt="Logo">
        <div class="link">
            <a href="contact.php">CONTACT US</a>
            <a href="about.php">ABOUT US</a>
            <a href="home.php">
                <img src="homeicon.png" alt="Home">
            </a>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h2>Report for <?php echo $monthYear; ?></h2>
            <table id="reportTable">
                <thead>
                    <tr>
                        <th colspan="4"><?php echo $monthYear; ?></th>
                    </tr>
                    <tr>
                        <th>NAME</th>
                        <th>DATE</th>
                        <th>TIME(HOURS)</th>
                        <th>INCOME(RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $total = $row['time'] * 10; // Example calculation
                            $totalIncome += $total;
                            echo "<tr>
                                <td>{$name}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['time']}</td>
                                <td>{$total}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No data available for this month</td></tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="3" class="total">Total Income:</td>
                        <td class="total total-amount"><?php echo $totalIncome; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="buttons">
                <a href="report.php">Back</a>
                <button onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.text('Report for <?php echo $monthYear; ?>', 10, 10);
            doc.autoTable({ html: '#reportTable', startY: 20 });

            doc.save('report.pdf');
        }
    </script>
</body>
</html>
