<?php

require_once('../controller/dashboard.php');
require_once('../controller/acquireGiveawayCheck.php');

$user_type = "";
$item_category = "";
$item_name = "";

// Check if user_type is received from the first form
if (isset($_POST['user_type'])) {
    $user_type = $_POST['user_type'];
}

if (isset($_POST['item_category'])) {
    $item_category = $_POST['item_category'];
}

if (isset($_POST['item_name'])) {
    $item_name = $_POST['item_name'];
}

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Acquire Giveaway</title>
</head>

<body>
    <table class="acquire-table" cellspacing="0" width=100%>
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="../view/home.php">Home</a>
                        <a href="../view/giveaways.php">Giveaways</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="../view/logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form class="acquire-form" method="POST" action="" enctype="multipart/form-data">
                    <fieldset class="acquire-field">
                        <legend>APPLY TO ACQUIRE GIVEAWAY</legend>

                        <input type="hidden" name="user_type" value="<?= $user_type ?>">
                        <input type="hidden" name="item_category" value="<?= $item_category ?>">
                        <input type="hidden" name="item_name" value="<?= $item_name ?>">

                        <label for="name">Full Name:</label>
                        <input type="text" name="name" value="" id="name" onkeyup="checkFullName()">
                        <span class="error-message" id="nameError"><b><?= $nameError ?></b></span>

                        <label for="address">Address:</label>
                        <input type="text" name="address" value="" id="address" onkeyup="validateAddress()">
                        <span class="error-message" id="addressError"><b><?= $addressError ?></b></span>

                        <label for="email">Email:</label>
                        <input type="text" name="email" value="" id="email" onkeyup="checkMail()">
                        <span class="error-message" id="emailError"><b><?= $emailError ?></b></span>

                        <label for="phone">Phone Number:</label>
                        <input type="text" name="phone" value="" id="phone" onkeyup="checkPhone()">
                        <span class="error-message" id="phoneError"><b><?= $phoneError ?></b></span>

                        <span class="error-message"><b><?= $error ?></b></span>

                        <div class="buttons">
                            <input class="reject-btn" type="reset" name="reset" value="Reset" />
                            <input class="accept-btn" type="submit" name="submit" value="Submit" id="submitButton" disabled/>
                        </div>

                    </fieldset>
                </form>
            </td>
        </tr>
    </table>

    <script>
        function checkFormValidity() {
            let fullname = document.getElementById('name').value;
            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            let address = document.getElementById('address').value;

            let fnameError = document.getElementById('nameError').innerText;
            let phoneError = document.getElementById('phoneError').innerText;
            let mailError = document.getElementById('emailError').innerText;
            let addressError = document.getElementById('addressError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                fullname === '' ||
                phone === '' ||
                email === '' ||
                address === '' ||
                fnameError !== '' ||
                phoneError !== '' ||
                mailError !== '' ||
                addressError !== ''

            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }

        function checkFullName() {
            let name = document.getElementById('name').value;
            let nameLen = name.split(' ');

            if (name === '') {
                document.getElementById('nameError').innerHTML = 'Full name can not be empty.';
            }
            else if (nameLen.length < 2) {
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

        function checkPhone() {
            let phone = document.getElementById('phone').value;

            if (phone === '') {
                document.getElementById('phoneError').innerHTML = 'Phone number cannot be empty.';
            } else {
                let errorFound = false;
                for (let i = 0; i < phone.length; i++) {
                    if (!Number.isInteger(parseInt(phone[i]))) {
                        document.getElementById('phoneError').innerHTML = 'Phone number can only contain numbers.';
                        errorFound = true;
                        break;
                    }
                }

                if (!errorFound) {
                    if (phone.length < 11) {
                        document.getElementById('phoneError').innerHTML = 'Phone number must be 11 characters long.';
                    } else if (phone.length > 11) {
                        document.getElementById('phoneError').innerHTML = 'Phone number must not be more than 11 characters long.';
                    } else {
                        document.getElementById('phoneError').innerHTML = '';
                    }
                }
            }
            checkFormValidity();
        }

        function checkMail() {
            let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('emailError').innerHTML = 'Email cannot be empty.';
            } 
            else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('emailError').innerHTML = 'Invalid email address.';
            } 
            else {
                document.getElementById('emailError').innerHTML = '';
            }
            checkFormValidity();
        }

        function validateAddress() {
            let address = document.getElementById('address').value;

            if (address.trim() === '') {
                document.getElementById('addressError').innerHTML = "Address cannot be empty.";
            } 
            else {
                let isValid = true;
                for (let i = 0; i < address.length; i++) {
                    let char = address[i];
                    if (
                        !(char >= 'A' && char <= 'Z') &&
                        !(char >= 'a' && char <= 'z') &&
                        !(char >= '0' && char <= '9') &&
                        !(char === ' ') &&
                        !(char === ',') &&
                        !(char === '-') &&
                        !(char === '.')
                    ) {
                        isValid = false;
                        break;
                    }
                }
                if (!isValid) {
                    document.getElementById('addressError').innerHTML = "Address can only contain letters, numbers, spaces, commas, hyphens, and periods.";
                } 
                else if (address.length > 255) {
                    document.getElementById('addressError').innerHTML = "Address is too long. Maximum length is 255 characters.";
                }
                else {
                    document.getElementById('addressError').innerHTML = "";
                }
            }
            checkFormValidity();
        }
    </script>

    <?php include('footer.php'); ?>

</body>

</html>
