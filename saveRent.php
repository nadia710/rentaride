<?php
require_once 'dataConnectISP.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user is logged in
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Sanitize and retrieve form data
        $car = isset($_POST['car']) ? $_POST['car'] : '';
        $color = isset($_POST['color']) ? $_POST['color'] : '';
        $time = isset($_POST['time']) ? $_POST['time'] : '';
        $addressRent = isset($_POST['addressRent']) ? $_POST['addressRent'] : '';
        $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
        $sendpick = isset($_POST['sendpick']) ? $_POST['sendpick'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $status = 'pending'; // Default status
        $book = 'BOOKED';

        // Debugging: Display the input values
        echo "Debugging Information:<br>";
        echo "Car: $car<br>";
        echo "Color: $color<br>";
        echo "Time: $time<br>";
        echo "Address Rent: $addressRent<br>";
        echo "Destination: $destination<br>";
        echo "Sendpick: $sendpick<br>";
        echo "Date: $date<br>";
        echo "Status: $status<br>";

        // Retrieve plate and total from the carsupp table based on car
        $stmt = $mysqli->prepare("SELECT plate, total FROM carsupp WHERE car = ? LIMIT 1");
        if (!$stmt) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            exit;
        }
        $stmt->bind_param("s", $car);
        $stmt->execute();
        $stmt->bind_result($plate, $car_total);
        $stmt->fetch();
        $stmt->close();

        if (!empty($car_total)) {
            // Calculate the new total as the product of time and car_total
            $total = $time * $car_total;

            // Insert data into the rentcar table
            $stmt = $mysqli->prepare("INSERT INTO rentcar (email, car, color, time, addressRent, destination, sendpick, date, status, book, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
                exit;
            }
            $stmt->bind_param("sssssssssss", $email, $car, $color, $time, $addressRent, $destination, $sendpick, $date, $status, $book, $total);

            if ($stmt->execute()) {
                // Update the book status in the carsupp table
                $update_stmt = $mysqli->prepare("UPDATE carsupp SET book = 'BOOKED' WHERE plate = ?");
                if (!$update_stmt) {
                    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
                    exit;
                }
                $update_stmt->bind_param("s", $plate);
                if ($update_stmt->execute()) {
                    // Set session variables for the rental details
                    $_SESSION['car'] = $car;
                    $_SESSION['color'] = $color;
                    $_SESSION['time'] = $time;
                    $_SESSION['addressRent'] = $addressRent;
                    $_SESSION['destination'] = $destination;
                    $_SESSION['sendpick'] = $sendpick;
                    $_SESSION['date'] = $date;
                    $_SESSION['status'] = $status;
                    $_SESSION['book'] = $book;
                    $_SESSION['total'] = $total;

                    // Redirect to the confirmation page
                    header("Location: confirm.php");
                    exit();
                } else {
                    echo "Error updating book status: " . $update_stmt->error . "<br>";
                }
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
        } else {
            echo "Total not found for the selected car and plate.<br>";
        }
    } else {
        echo "No email found in session.";
    }
}
?>
