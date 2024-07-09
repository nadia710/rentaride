<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-A-Ride Sign Up</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('LOGINSIGNUP.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .container {
            background: #242629;
            padding: 10px 50px 40px;
            border-radius: 20px;
            color: white;
            width: 80%;
            margin-bottom: 10px;
        }
        
        .container label {
            padding: 10px;
            display: block;
            margin-bottom: 5px;
        }
        
        .container input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 90%;
        }
        
        .container a {
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
        }
        
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        
        .clearbtn, .signupbtn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .clearbtn {
            background: #f44336;
            color: black;
        }
        
        .signupbtn {
            background: #2b637a;
            color: black;
        }
        
        .signup-form p {
            margin-top: 10px;
        }
        
        .signup-from a {
            color: #007BFF;
        }
        
        .signup-form a:hover {
            text-decoration: underline;
        }
        
        .container select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form role="form" method="post" action="saveSignUpISP.php" onsubmit="return validateForm()">
        <div class="container">
            <h1><center> Sign Up </h1>
            <p><center> Create your account </center></p>
            <hr>
                
            <center><input type="text" placeholder="Enter Your IC" name="ic"></center>
            <center><input type="text" placeholder="Enter Your Name" name="name"></center>
            <center><input type="email" placeholder="Email" name="email" id="email"></center>
            <center><input type="text" placeholder="Phone Number" name="phone"></center>
            <center>
                <select name="gender" id="gender">
                    <option value="choose">CHOOSE ONE</option>
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                </select>
            </center>
            <center>
                <select name="user" id="user">
                    <option value="choose">CHOOSE ONE</option>
                    <option value="customer">CUSTOMER</option>
                    <option value="supplier">CAR SUPPLIER</option>
                    <option value="admin">ADMIN</option>
                </select>
            </center>
            <center><input type="password" placeholder="Password" name="password" id="password" required></center>
            <center><label><input type="checkbox" name="show" onclick="showPassword()"> Show Password</label></center>
                
            <div class="buttons">
                <button type="reset" class="clearbtn">Clear</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
            
            <center><label><a href="loginISP.php">Already have an account?</a></label></center>
            <br>
        </div>
    </form>
    
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function validateForm() {
            var email = document.getElementById("email").value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            var userSelect = document.getElementById("user").value;
            var password = document.getElementById("password").value.trim().toLowerCase();
            
            if (userSelect === "admin" && password !== "rentaride") {
                alert("You are not authorized to sign up as an admin. Please contact the company.");
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>
