<?php
    require_once 'dataConnectISP.php';
    session_start();
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
                position: relative; /* Added to position sign-out icon absolutely */
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
                position: absolute;
                right: 10px;
                top: 10px;
                cursor: pointer;
                color: white;
            }

            .status-box {
                display: inline-block;
                padding: 5px 10px;
                color: white;
                border-radius: 10px;
                text-transform: uppercase;
            }

            .status-pending {
                background-color: #a27fad;
				color : black;
            }

            .status-using {
                background-color: #77759c;
				color : black;
            }

            .status-completed {
                background-color: #638271;
				color : black;
            }
        </style>

        <script>
            function confirmLogout() {
                if (confirm("Are you sure you want to log out?")) {
                    window.location.href = "loginISP.php";
                }
            }
        </script>
    </head>
    
    <body>
        <div class="topbar">
            <div class="img">
                <img src="LOGO.png">
            </div>

            <div class="link">
                <a href="contact.php">CONTACT US</a>
                <a href="about.php">ABOUT US</a>
                <a href="custProfile.php">
                    <img src="homeicon.png">
                </a>
            </div>
        </div>

        <form role="form" method="post">
            <div class="container">
                <div class="sidebar">
                    <div class="profile">
                        <div class="sign-out" onclick="confirmLogout()">
                            <i class="fa fa-sign-out fa-flip-horizontal fa-2x" data-fa-transform="right-9"></i>
                        </div>
                        <div class="user-container">
                            <div class="user">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                        </div>
                        <center><h2>HI!</h2></center>
                        <hr>

                        <?php
                        $email = $_SESSION['email'];
                        $sql = "SELECT * FROM list_isp WHERE email = '$email';";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $ic = $row["ic"];
                                $name = $row["name"];
                                $email = $row["email"];
                                $phone = $row["phone"];
                                $user = $row["user"];
                                $gender = $row["gender"];
                        ?>

                        <label for="ic">IC NUMBER</label> <label style="margin-left: 52px"> : </label>
                        <label for="icN"><?php echo $ic; ?></label>
                        <hr>

                        <label for="name">FULL NAME</label> <label style="margin-left: 50px"> : </label>
                        <label for="n"><?php echo $name; ?></label>
                        <hr>

                        <label for="email">EMAIL ADDRESS</label> <label style="margin-left: 15px"> : </label>
                        <label for="e"><?php echo $_SESSION['email']; ?></label>
                        <hr>

                        <label for="phone">PHONE NUMBER</label> <label style="margin-left: 15px"> : </label>
                        <label for="p"><?php echo $phone; ?></label>
                        <hr>

                        <label for="user">USER TYPE</label> <label style="margin-left: 57px"> : </label>
                        <label for="u"><?php echo $user; ?></label>
                        <hr>

                        <label for="gender">GENDER</label> <label style="margin-left: 76px"> : </label>
                        <label for="g"><?php echo $gender; ?></label>
                        <hr>
                        <br><br>

                        <center>
                            <button type="button" class="update-button" name="updatebtn" onclick="window.location.href='updateProf.php'">UPDATE PROFILE</button>
                        </center>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="main">
                    <ul>
                        <li><a href="available.php">CAR AVAILABLE</a></li>
                        <li><a href="">RENT OUR CAR</a></li>
                        <li><a href="status.php" style="color: black">STATUS RENT</a></li>
                    </ul>

                    <div class="dropdown">
                        <table id="carTable">
                            <thead>
                                <tr>
                                    <th>CAR</th>
                                    <th>COLOUR</th>
                                    <th>DATE</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM rentcar WHERE email = '$email' ORDER BY date DESC;";
                                    $result = $mysqli->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $car = $row["car"];
                                            $color = $row["color"];
                                            $date = $row["date"];
                                            $status = $row["status"];
                                            $status_class = '';

                                            if (strtolower($status) == 'pending') {
                                                $status_class = 'status-pending';
                                            } elseif (strtolower($status) == 'using') {
                                                $status_class = 'status-using';
                                            } elseif (strtolower($status) == 'completed') {
                                                $status_class = 'status-completed';
                                            }
                                            ?>
                                            <tr>
                                                <td align='center'><?php echo $car; ?></td>
                                                <td><?php echo strtoupper($color); ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><span class="status-box <?php echo $status_class; ?>"><?php echo strtoupper($status); ?></span></td>
                                            </tr>
                                            <?php
                                        }
                                    } 
                                    else {
                                        echo "<tr><td colspan='4'>No results found</td></tr>";
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
