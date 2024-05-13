<?php

    require_once("../controller/loginCheck.php");

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Login</title>
</head>

<body>
    <table class="login-table" cellspacing="0">
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="campaings.php">Campaings</a>
                        <a href="giveaways.php">Giveaways</a>
                        <a class="active" href="signup.php">Sign Up</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="login-card">
                    <form class="login-form" method="POST" action="" enctype="">
                        
                        <h2 class="login-text">Log in to your account</h2>
                        <hr>

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="" onkeyup="checkUserName()"/>
                        <span class="error-message" id="usernameError"></span>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="" onkeyup="checkPassword()"/>
                        <span class="error-message" id="passwordError"></span>

                        <p class="error-text" id="error-message" style="color: red;"><b><?= $error ?></b></p>
                        <input class="remember-me" type="checkbox" name="remember_me" value='true'>
                        <label class="remember-me" for="checkbox">Remember Me</label>

                        <br>

                        <input type="submit" name="submit" value="Submit" id="submitButton" disabled />
                        <a class="forget-pass" href="forgetPassword.php">Forget Password?</a>

                    </form>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <br><br><br>
                <?php include('footer.php'); ?>
            </td>
        </tr>
    </table>

    <script>
        function checkFormValidity() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;

            let usernameError = document.getElementById('usernameError').innerText;
            let passwordError = document.getElementById('passwordError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                username === '' ||
                password === '' ||
                usernameError !== '' ||
                passwordError !== ''
            ) {
                submitButton.disabled = true;
            } 
            else {
                submitButton.disabled = false;
            }
        }

        function checkChar(ch) {
            return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || ch === '.' || ch === ' ' || !isNaN(ch);
        }

        function checkUserName() {
            let username = document.getElementById('username').value;

            if (username === '') {
                document.getElementById('usernameError').innerHTML = 'Username cannot be empty.';
            } else {
                for (let i = 0; i < username.length; i++) {
                    if (!checkChar(username[i])) {
                        document.getElementById('usernameError').innerHTML = 'Username can only contain letters, numbers or  dots.';
                        break;
                    }
                }

                if (username.split(' ').length > 1) {
                    document.getElementById('usernameError').innerHTML = 'Username cannot contain more than one word.';
                } else if (username.length > 15) {
                    document.getElementById('usernameError').innerHTML = 'Username cannot exceed 15 characters.';
                } else {
                    document.getElementById('usernameError').innerHTML = '';
                }
            }
            checkFormValidity();
        }

        function checkPassword() {
            let password = document.getElementById('password').value;

            if (password === '') {
                document.getElementById('passwordError').innerHTML = 'Password cannot be empty.';
            } else if (password.length < 8) {
                document.getElementById('passwordError').innerHTML = 'Password must be at least 8 characters long.';
            } else {
                document.getElementById('passwordError').innerHTML = '';
            }
            checkFormValidity();
        }

    </script>
</body>

</html>