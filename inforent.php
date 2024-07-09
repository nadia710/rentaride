<?php
require_once 'dataConnectISP.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $car = $_POST['car'];
    $color = $_POST['color'];
    $date = $_POST['date'];
    $new_status = $_POST['status'];

    $sql = "UPDATE rentcar SET status = '$new_status' WHERE email = '$email' AND car = '$car' AND color = '$color' AND date = '$date'";
    if ($mysqli->query($sql) === TRUE) {
        header("Location: cust.php?email=$email&car=$car&color=$color&date=$date");
        exit();
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}

$current_status = '';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $car = $_GET['car'];
    $color = $_GET['color'];
    $date = $_GET['date'];

    $sql = "SELECT * FROM rentcar WHERE email = '$email' AND car = '$car' AND color = '$color' AND date = '$date'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_status = $row['status'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
		<style>
        body {
            background-color: white;
            font-size: 16px;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }
        .container {
            padding: 50px;
            max-width: 900px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .update-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .update-button:hover {
            background-color: #45a049;
        }
        .status-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            appearance: none;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Rental Information</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Car:</label>
                <input type="text" name="car" value="<?php echo isset($_GET['car']) ? $_GET['car'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Color:</label>
                <input type="text" name="color" value="<?php echo isset($_GET['color']) ? $_GET['color'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="text" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="status-select <?php echo strtolower($current_status); ?>" onchange="updateStatusColor(this)">
                    <option value="pending"<?php echo $current_status == 'pending' ? ' selected' : ''; ?>>Pending</option>
                    <option value="using"<?php echo $current_status == 'using' ? ' selected' : ''; ?>>Using</option>
                    <option value="completed"<?php echo $current_status == 'completed' ? ' selected' : ''; ?>>Completed</option>
                </select>
            </div>
            <div class="form-footer">
                <button type="submit" class="update-button">Update</button>
            </div>
        </form>
    </div>

    <script>
        function updateStatusColor(select) {
            select.classList.remove('pending', 'using', 'completed');
            select.classList.add(select.value.toLowerCase());
        }
    </script>
</body>
</html>
