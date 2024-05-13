<?php

require_once('../controller/campaingCheck.php');

$error = "";

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Create Campaing</title>
    <style>
        


    </style>
</head>

<body>
    <table class="create-camp-table" cellspacing="0" width=100%>
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="campaings.php">Campaings</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <form class="camp-form" method="POST" action="" enctype="multipart/form-data">
                    <fieldset>
                        <legend>CREATE CAMPAING</legend>
                        <label for="fundfor">Who are you fundraising for?</label>
                        <select name="fundfor" id="fundfor" onchange="validateFundFor()">
                            <option value="">Choose an option</option>
                            <option value="Ownself">Yourself</option>
                            <option value="Someone else">Someone else</option>
                            <option value="Charity">Charity</option>
                            <option value="Palestine">Palestine 🇵🇸</option>
                            <option value="Institute Club">School/ College/ University Club</option>
                        </select>
                        <span class="error-message" id="fundforError"></span>

                        <label for="phoneNumber">Contact Number:</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" value="" onkeyup="validatePhoneNumber()">
                        <span class="error-message" id="phoneError"></span>

                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="" onkeyup="validateEmail()">
                        <span class="error-message" id="emailError"></span>

                        <label for="address">Enter the address where the funds will go:</label>
                        <input type="text" name="address" id="address" value="" onkeyup="validateAddress()">
                        <span class="error-message" id="addressError"></span>

                        <label for="zipcode">Enter the postal code/ zip code of the location:</label>
                        <input type="text" name="zipcode" id="zipcode" value="" onkeyup="validateZipCode()">
                        <span class="error-message" id="zipError"></span>
                        
                        <label for="reason">Reason of fundraising:</label>
                        <select name="reason" id="reason" onchange="validateReason()">
                            <option value="">Choose an option</option>
                            <option value="Animals">Animals</option>
                            <option value="Business">Business</option>
                            <option value="Community">Community</option>
                            <option value="Creative">Creative</option>
                            <option value="Education">Education</option>
                            <option value="Emergencies">Emergencies</option>
                            <option value="Environment">Environment</option>
                            <option value="Events">Events</option>
                            <option value="Faith">Faith</option>
                            <option value="Family">Family</option>
                            <option value="Funeral">Funeral & Memorial</option>
                            <option value="Medical">Medical</option>
                            <option value="Bills">Monthly Bills</option>
                            <option value="Newlyweds">Newlyweds</option>
                            <option value="Other">Other</option>
                            <option value="Sports">Sports</option>
                            <option value="Travel">Travel</option>
                            <option value="Gaza Relief">Gaza Relief 🇵🇸</option>
                            <option value="Volunteer">Volunteer</option>
                            <option value="Wishes">Wishes</option>
                        </select>
                        <span class="error-message" id="reasonError"></span>

                        <label for="amount">How much would you like to raise?</label>
                        <input type="text" name="amount" id="amount" value="" onkeyup="validateAmount()">
                        <span class="error-message" id="amountError"></span>

                        <label for="bank_type">Select Payment Option:</label>
                        <input type="radio" name="bank_type" id="bank" value="Bank" onchange="validateBankType()">
                        <label class="payment-option" for="bank">Bank</label>
                        <input type="radio" name="bank_type" id="mobile_bank" value="Mobile bank">
                        <label class="payment-option" for="mobile_bank">Mobile Bank</label>
                        <br>
                        <span class="error-message" id="bankTypeError"></span>
                        
                        <label for="bank_name">Bank Name:</label>
                        <select name="bank_name" id="bank_name" onchange="validateBankName()">
                            <option value="">Choose an option</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                            <option value="Brac Bank">BRAC Bank</option>
                            <option value="City Bank">City Bank</option>
                            <option value="UCB">UCB Bank</option>
                            <option value="DBBL">Dutch Bangla Bank</option>
                            <option value="Rocket">Rocket</option>
                        </select>
                        <span class="error-message" id="bankNameError"></span>
                        
                        <label for="account_number">Account Number:</label>
                        <input type="text" name="account_number" id="account_number" value="" onkeyup="validateAccountNumber()">
                        <span class="error-message" id="accountNumberError"></span>

                        <div class="buttons">
                            <input type="reset" name="reset" value="Reset" />
                            <input type="submit" name="submit" value="Submit" id="submitButton" disabled />
                        </div>
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>

    <script>
        function checkFormValidity() {
            let fundfor = document.getElementById('fundfor').value;
            let phoneNumber = document.getElementById('phoneNumber').value;
            let email = document.getElementById('email').value;
            let address = document.getElementById('address').value.trim();
            let zipcode = document.getElementById('zipcode').value;
            let reason = document.getElementById('reason').value;
            let amount = document.getElementById('amount').value;
            let bank_type = document.getElementById('bank_type').value;
            let bank_name = document.getElementById('bank_name').value;
            let account_number = document.getElementById('account_number').value;

            let fundforError = document.getElementById('fundforError').innerText;
            let phoneError = document.getElementById('phoneError').innerText;
            let emailError = document.getElementById('emailError').innerText;
            let addressError = document.getElementById('addressError').innerText;
            let zipError = document.getElementById('zipError').innerText;
            let reasonError = document.getElementById('reasonError').innerText;
            let amountError = document.getElementById('amountError').innerText;
            let bankTypeError = document.getElementById('bankTypeError').innerText;
            let bankNameError = document.getElementById('bankNameError').innerText;
            let accountNumberError = document.getElementById('accountNumberError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                fundfor === '' ||
                phoneNumber === '' ||
                email === '' ||
                address === '' ||
                zipcode === '' ||
                reason === '' ||
                amount === '' ||
                bank_type === '' ||
                bank_name === '' ||
                account_number === '' ||
                fundforError !== '' ||
                phoneError !== '' ||
                emailError !== '' ||
                addressError !== '' ||
                zipError !== '' ||
                reasonError !== '' ||
                amountError !== '' ||
                bankTypeError !== '' ||
                bankNameError !== '' ||
                accountNumberError !== ''
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }

        function validateFundFor() {
            let fundfor = document.getElementById('fundfor').value;

            if (fundfor === '') {
                document.getElementById('fundforError').innerHTML = "Please select who you are fundraising for.";
            }
            else {
                document.getElementById('fundforError').innerHTML = "";
            }
            checkFormValidity();
        }
        
        function validatePhoneNumber() {
            let phoneNumber = document.getElementById('phoneNumber').value;
            
            if (phoneNumber === '') {
                document.getElementById('phoneError').innerHTML = "Please enter a phone number.";
            } 
            else if (phoneNumber.length !== 11 || phoneNumber[0] !== '0' || phoneNumber[1] !== '1') {
                document.getElementById('phoneError').innerHTML = "Invalid phone number. Please enter a valid phone number.";
            }
            checkFormValidity();
        }

        function validateEmail() {
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

        function validateZipCode() {
            let zipcode = document.getElementById('zipcode').value.trim();

            if (zipcode === '') {
                document.getElementById('zipError').innerHTML = "Zip code cannot be empty.";
            }
            else {
                for (let i = 0; i < zipcode.length; i++) {
                    if (zipcode[i] < '0' || zipcode[i] > '9') {
                        document.getElementById('zipError').innerHTML = "Zip code should be numeric.";
                    }
                    else {
                        document.getElementById('zipError').innerHTML = "";
                    }
                }
            }
            checkFormValidity();    
        }


        function validateReason() {
            let reason = document.getElementById('reason').value;

            if (reason === '') {
                document.getElementById('reasonError').innerHTML = "Please select a reason.";
            }
            else {
                document.getElementById('reasonError').innerHTML = "";
            }
            checkFormValidity();
        }

        function validateAmount() {
            let amount = document.getElementById('amount').value;

            if (amount === '') {
                document.getElementById('amountError').innerHTML = "Please enter the amount you would like to raise.";
            } 
            else {
                for (let i = 0; i < amount.length; i++) {
                    if (amount[i] < '0' || amount[i] > '9') {
                        document.getElementById('amountError').innerHTML = "Amount should be numeric.";
                    }
                    else {
                        document.getElementById('amountError').innerHTML = "";
                    }
                }
            }
            checkFormValidity();
        }

        function validateBankType() {
            let bank_type = document.getElementsByName('bank_type').value;

            if (!(bank_type[0].checked || bank_type[1].checked)) {
                document.getElementById('bankTypeError').innerHTML = "Please select a bank type.";
            } 
            else {
                document.getElementById('bankTypeError').innerHTML = '';
            }
            checkFormValidity();

        }

        function validateBankName() {
            let bank_name = document.getElementById('bank_name').value;
            let bankNameError = document.getElementById('bankNameError');

            bankNameError.innerHTML = '';
            if (bank_name === '') {
                document.getElementById('bankNameError').innerHTML = "Please select a bank name.";
            }
            else {
                document.getElementById('bankNameError').innerHTML = "";
            }
            checkFormValidity();
        }

        function validateAccountNumber() {
            let bank_type = document.querySelector('input[name="bank_type"]:checked').value;
            let account_number = document.getElementById('account_number').value;
            let accountNumberError = document.getElementById('accountNumberError');

            if (account_number === '') {
                accountNumberError.innerHTML = "Please enter an account number.";
            } 
            else {
                if (bank_type === "Mobile bank") {
                    if (account_number.length !== 11 || isNaN(account_number)) {
                        accountNumberError.innerHTML = "Account number for Mobile bank should be 11 digits numeric.";
                    }
                    else {
                        accountNumberError.innerHTML = "";
                    }
                } 
                else if (bank_type === "Bank") {
                    let accountLength = account_number.length;
                    if (accountLength < 9 || accountLength > 13 || isNaN(account_number)) {
                        accountNumberError.innerHTML = "Account number for Bank should be between 9 to 13 digits numeric.";
                    }
                    else {
                        accountNumberError.innerHTML = "";
                    }
                }
                else {
                    accountNumberError.innerHTML = "";
                }
                
            }
            checkFormValidity();
        }

    </script>

</body>

<?php include('footer.php'); ?>

</html>