<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 60px;
            background-color: #7DB669;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="radio"] {
            display: inline-block;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Registration Form</h1>
    <form id="registrationForm" onsubmit="return validateForm()">
    <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password (6-12 characters):</label>
        <input type="password" id="password" name="password" required minlength="6" maxlength="12"><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
         <br>
         <br>
         <label for="bloodGroup">Blood Group:</label>
        <select id="bloodGroup" name="bloodGroup">
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="O+">O+</option>
            <option value="A-">A-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>
            <option value="O-">O-</option>
        </select><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>

        <input type="submit" value="Register">
    </form>

    <script>
        function validateForm() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const genderInputs = document.querySelectorAll('input[name="gender"]');

            // Validate password
            if (passwordInput.value !== confirmPasswordInput.value) {
                alert('Passwords do not match. Please try again.');
                return false;
            }

            // Validate gender
            let genderSelected = false;
            genderInputs.forEach(input => {
                if (input.checked) {
                    genderSelected = true;
                }
            });
            if (!genderSelected) {
                alert('Please select a gender.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
