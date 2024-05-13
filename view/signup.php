<?php

// require_once("../controller/signupCheck.php");
require_once('../controller/dashboard.php');

?>

<html>

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Sign Up</title>
    <script>
        function submitForm() {
            let role = document.getElementById('role').value;
            let fullName = document.getElementById('name').value;
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let phoneNumber = document.getElementById('phoneNumber').value;
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
            let gender = document.getElementById('gender').value;

            // JSON with form data
            let formData = {
                'urole': role,
                'fName': fullName,
                'uName': username,
                'e_mail': email,
                'phone_Number': phoneNumber,
                'passWord': password,
                'confirm_Password': confirmPassword,
                'gender_': gender
            };

            // Converting into a JSON string
            let jsonData = JSON.stringify(formData);
            // alert(jsonData);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/signupCheck.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send('user=' + jsonData);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    if (this.responseText.trim() === "Data insertion successful!") {
                        window.location.href = "../view/login.php";
                    }
                    else {
                        document.getElementById('error').innerHTML = "Error: " + this.responseText;
                    }
                }
            }
        }
    </script>


</head>

<body>
    <table class="signup-main-table" cellspacing="0">
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="campaings.php">Campaings</a>
                        <a href="giveaways.php">Giveaways</a>
                        <?= $enterOption ?>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="signup-card">
                    <form class="signup-form" id="signupForm" action="" method="POST" enctype="">
                        <h2>Create Account</h3>
                            <hr>
                            <table class="signup-sub-table" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <label for="role">Select Role:</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="role" id="role" value="Donor" onkeyup="checkRole()" /> Donor
                                        <input type="radio" name="role" id="role" value="Fund Raiser" onkeyup="checkRole()" /> Fund Raiser
                                        <br>
                                        <span class="error-message" id="roleError"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="fullName">Full Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="fullName" id="name" onkeyup="checkFullName()" value="" />
                                        <span class="error-message" id="nameError"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="username">Username:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" id="username" onkeyup="checkUserName()" value="" />
                                        <span class="error-message" id="usernameError"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email">Email:</label>
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="email" onkeyup="checkMail()" value="" />
                                        <span class="error-message" id="emailError"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="phoneNumber">Phone Number:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="phoneNumber" id="phoneNumber" onkeyup="checkPhone()" value="" />
                                        <span class="error-message" id="phoneNumberError"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="password">Password:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="password" id="password" onkeyup="checkPassword()" value="" />
                                        <span class="error-message" id="passwordError"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="confirmPassword">Confirm Password:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="confirmPassword" id="confirmPassword" onkeyup="checkRepassword()" value="" />
                                        <span class="error-message" id="confirmPasswordError"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="gender">Gender:</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="gender" id="gender" value="Male" onkeyup="checkGender()" /> Male
                                        <input type="radio" name="gender" id="gender" value="Female" onkeyup="checkGender()" /> Female
                                        <input type="radio" name="gender" id="gender" value="Other" onkeyup="checkGender()" /> Other
                                        <br>
                                        <span class="error-message" id="genderError"></span>
                                    </td>
                                </tr>
                            </table>
                            <div class="buttons">
                                <p class="error-message"></p>
                                <br>
                                <h3 id="error"></h3>
                                <br>
                                <input type="button" value="Sign Up" name="submit" id="submitButton" onclick="submitForm()" />
                                <input type="reset" value="Reset" name="reset" />
                            </div>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <?php include('footer.php'); ?>
            </td>
        </tr>
    </table>

    <script>
        function checkFormValidity() {
            let role = document.querySelector('input[name="role"]:checked');
            let gender = document.querySelector('input[name="gender"]:checked');
            let fullname = document.getElementById('name').value;
            let username = document.getElementById('username').value;
            let phone = document.getElementById('phoneNumber').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('confirmPassword').value;

            let roleError = document.getElementById('roleError').innerText;
            let fnameError = document.getElementById('nameError').innerText;
            let usernameError = document.getElementById('usernameError').innerText;
            let phoneError = document.getElementById('phoneNumberError').innerText;
            let mailError = document.getElementById('emailError').innerText;
            let passwordError = document.getElementById('passwordError').innerText;
            let repasswordError = document.getElementById('confirmPasswordError').innerText;
            let genderError = document.getElementById('genderError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                role === '' ||
                gender === '' ||
                fullname === '' ||
                username === '' ||
                phone === '' ||
                email === '' ||
                password === '' ||
                repassword === '' ||
                password !== repassword
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }

        function checkRole() {
            let option = document.getElementsByName('role');

            if (!(option[0].checked || option[1].checked)) {
                document.getElementById('roleError').innerHTML = "Please Select Your Role";
            } else {
                document.getElementById('roleError').innerHTML = '';
            }
            checkFormValidity();
        }

        function checkGender() {
            let genders = document.getElementsByName("gender");
            let isChecked = false;

            for (let i = 0; i < genders.length; i++) {
                if (genders[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                document.getElementById('genderError').innerHTML = 'Please select your gender.';
            } else {
                document.getElementById('genderError').innerHTML = '';
            }
            checkFormValidity();
        }

        function checkFullName() {
            let name = document.getElementById('name').value;
            let nameLen = name.split(' ');

            if (name === '') {
                document.getElementById('nameError').innerHTML = 'Full name can not be empty.';
            } else if (nameLen.length < 2) {
                document.getElementById('nameError').innerHTML = 'Can not be less than 2 words';
            } else {
                document.getElementById('nameError').innerHTML = '';
            }

            for (let i = 0; i < name.length; i++) {
                if (!checkChar(name[i])) {
                    document.getElementById('nameError').innerHTML = 'Name can only contain letters, dots, or spaces.';
                    break;
                }
            }
            checkFormValidity();
        }

        function checkChar(ch) {
            return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || ch === '.' || ch === ' ' || !(ch >= '0' && ch <= '9');
        }

        function checkFirstChar(ch) {
            return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z');
        }

        function checkUserName() {
            let username = document.getElementById('username').value;

            if (username === '') {
                document.getElementById('usernameError').innerHTML = 'Username cannot be empty.';
            } else {
                for (let i = 0; i < username.length; i++) {
                    if (!checkChar(username[i])) {
                        document.getElementById('usernameError').innerHTML = 'Username can only contain letters, numbers, dots, or spaces.';
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

        function checkPhone() {
            let phone = document.getElementById('phoneNumber').value;

            if (phone === '') {
                document.getElementById('phoneNumberError').innerHTML = 'Phone number cannot be empty.';
            } else {
                let errorFound = false;
                for (let i = 0; i < phone.length; i++) {
                    if (!Number.isInteger(parseInt(phone[i]))) {
                        document.getElementById('phoneNumberError').innerHTML = 'Phone number can only contain numbers.';
                        errorFound = true;
                        break;
                    }
                }

                if (!errorFound) {
                    if (phone.length < 11) {
                        document.getElementById('phoneNumberError').innerHTML = 'Phone number must be 11 characters long.';
                    } else if (phone.length > 11) {
                        document.getElementById('phoneNumberError').innerHTML = 'Phone number must not be more than 11 characters long.';
                    } else {
                        document.getElementById('phoneNumberError').innerHTML = '';
                    }
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

        function checkRepassword() {
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('confirmPassword').value;

            if (repassword !== password) {
                document.getElementById('confirmPasswordError').innerHTML = 'Passwords do not match.';
            } else {
                document.getElementById('confirmPasswordError').innerHTML = '';
            }
            checkFormValidity();
        }

        function checkMail() {
            let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('emailError').innerHTML = 'Email cannot be empty.';
            } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('emailError').innerHTML = 'Invalid email address.';
            } else {
                document.getElementById('emailError').innerHTML = '';
            }
            checkFormValidity();
        }
    </script>
</body>

</html>