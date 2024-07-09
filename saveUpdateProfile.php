<?php
    require_once 'dataConnectISP.php';
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('You need to log in first.'); window.location.assign('loginISP.php');</script>";
        exit;
    }

    $email = $_SESSION['email'];

    // First, retrieve the email from the list_isp table
    $stmt = $mysqli->prepare("SELECT email FROM list_isp WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
    } else {
        echo "<script>alert('Email not found in list_isp.'); window.location.assign('home.php');</script>";
        exit;
    }

    // Now, retrieve the user profile based on the email from list_isp
    $stmt = $mysqli->prepare("SELECT * FROM user_profile WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();
        $ic = $rows['ic'];
        $name = $rows['name'];
        $phone = $rows['phone'];
        $user = $rows['user'];
        $gender = $rows['gender'];
        $password = $rows['password'];
    } else {
        echo "<script>alert('No user profile found with the given email.'); window.location.assign('home.php');</script>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $icN = strtoupper($_POST['ic']);
        $n = strtoupper($_POST['name']);
        $e = strtoupper($_POST['email']);
        $p = strtoupper($_POST['phone']);
        $u = strtoupper($_POST['user']);
        $g = strtoupper($_POST['gender']);
        $pw = strtoupper($_POST['password']);

        $stmt = $mysqli->prepare("UPDATE user_profile SET ic = ?, name = ?, email = ?, phone = ?, user = ?, gender = ? WHERE email = ?");
        $stmt->bind_param("sssssss", $icN, $n, $e, $p, $u, $g, $pw);
        $result = $stmt->execute();

        if ($result) {
            echo "<script>alert('Success! Your data has been updated!');
                  window.history.go(-1); // Redirect to previous page
                  </script>";
            exit; // Make sure to exit after redirecting
        } else {
            echo "<script>alert('Failed! Error updating data, please try again.');</script>";
        }
    }
?>
