<?php
    require_once 'dataConnectISP.php';
    session_start();

    // Fetch the current email from session or request
    $email = $_REQUEST['email'] ?? $_SESSION['email'];

    if ($email) {
        // Use prepared statements to prevent SQL injection
        $stmt = $mysqli->prepare("SELECT * FROM list_isp WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();
        $stmt->close();

        // If no user found, redirect or show error
        if (!$rows) {
            echo '<script type="text/javascript">alert("No user found with this email.");</script>';
            exit(); // Exit script after alert
        }

        // Populate variables with data from database
        $ic = $rows['ic'];
        $name = $rows['name'];
        $email = $rows['email'];
        $phone = $rows['phone'];
        $user = $rows['user'];
        $gender = $rows['gender'];
        $password = $rows['password'];
    }

    if(isset($_POST['update'])){
        $icN = strtoupper($_POST['icN']);
        $n = strtoupper($_POST['n']);
        $e = strtoupper($_POST['e']);
        $p = strtoupper($_POST['p']);
        $u = strtoupper($_POST['u']);
        $g = strtoupper($_POST['g']);
        $pw = isset($_POST['pw']) ? strtoupper($_POST['pw']) : $password; // Use different variable for password

        // Use prepared statements to prevent SQL injection
        $stmt = $mysqli->prepare("UPDATE list_isp SET ic = ?, name = ?, email = ?, phone = ?, user = ?, gender = ?, password = ? WHERE email = ?");
        $stmt->bind_param("ssssssss", $icN, $n, $email, $p, $u, $g, $pw, $email);
        $result = $stmt->execute();
        $stmt->close();

        if($result){
            echo '<script type="text/javascript">';
            echo 'alert("Success! Your profile has been updated");';
            echo 'window.history.go(-1);'; // Redirect to previous page
            echo '</script>';
        } else {
            echo '<script type="text/javascript">alert("Failed! Error updating profile, please try again.");</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <style>
        .container {
            background: #242629;
            padding: 10px 50px 40px;
            border-radius: 20px;
            color: white;
            width: 50%;
            margin: auto;
            margin-top: 50px;
        }

        .container label {
            display: block;
            margin: 10px 0 5px;
        }

        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .container button {
            padding: 10px;
            width: 100%;
            border-radius: 10px;
            background-color: #1e90ff;
            border: none;
            color: white;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #0a74da;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <div class="container">
            <h2>UPDATE DETAILS</h2>
            <label for="ic">IC NUMBER</label>
            <input type="text" id="ic" name="icN" value="<?php echo htmlspecialchars($ic); ?>">

            <label for="name">FULL NAME</label>
            <input type="text" id="name" name="n" value="<?php echo htmlspecialchars($name); ?>">

            <label for="email">EMAIL ADDRESS</label>
            <input type="text" id="email" name="e" value="<?php echo htmlspecialchars($email); ?>">

            <label for="phone">PHONE NUMBER</label>
            <input type="text" id="phone" name="p" value="<?php echo htmlspecialchars($phone); ?>">

            <label for="user">USER TYPE</label>
            <input type="text" id="user" name="u" value="<?php echo htmlspecialchars($user); ?>">

            <label for="gender">GENDER</label>
            <input type="text" id="gender" name="g" value="<?php echo htmlspecialchars($gender); ?>">

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="pw" value="<?php echo htmlspecialchars($password); ?>">

            <button type="submit" name="update">Save Data</button>
        </div>
    </form>
</body>
</html>
