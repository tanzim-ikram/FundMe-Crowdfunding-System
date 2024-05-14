<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            background-color: #1877F2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
       
    </style>
    <script>
        function validateForm() {
            const emailOrPhone = document.forms["loginForm"]["email"].value;
            const password = document.forms["loginForm"]["psw"].value;

            if (emailOrPhone === "") {
                document.getElementById("emailError").innerText = "Email or phone number is required.";
                return false;
            } else {
                document.getElementById("emailError").innerText = "";
            }

            // Regular expression to validate email format
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(emailOrPhone)) {
                document.getElementById("emailError").innerText = "Please enter a valid email address.";
                return false;
            } else {
                document.getElementById("emailError").innerText = "";
            }

            if (password === "") {
                document.getElementById("passwordError").innerText = "Password is required.";
                return false;
            } else {
                document.getElementById("passwordError").innerText = "";
            }

            if (password.length < 6 || password.length > 8) {
                document.getElementById("passwordError").innerText = "Password must be between 6 and 8 characters.";
                return false;
            } else {
                document.getElementById("passwordError").innerText = "";
            }
        }
    </script>
</head>
<body>

<h2>Login Form</h2>

<form name="loginForm" action="/action_page.php" method="post" onsubmit="return validateForm()">
    <div class="container">
        <label for="email"><b>Email or Phone Number</b></label>
        <input type="text" placeholder="Enter Email or Phone Number" name="email" required>
        <span id="emailError" class="error-message"></span>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <span id="passwordError" class="error-message"></span>

        <button type="submit">Login</button>
    </div>
</form>

  <div class="links">
    <span class=""><a href="forgotpassword.php">Forgot password?</a></span> 
    <span class=""><a href="registration.php">Register new</a></span>
    <style>

h2 {
            text-align: center; 
        }
        .links {
            text-align: center; 
        }

    </style>
  </div>
</form> 

</body>
</html>
