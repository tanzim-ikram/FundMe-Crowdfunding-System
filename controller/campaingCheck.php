<?php

// $error = "";
require_once('../model/db.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
    header('location: ../view/login.php');
    exit();
} 

else {

    // Determine user type
    $user_type = '';
    $dashboardlink = '';
    $username = '';
    if (isset($_SESSION['admin'])) {
        $user_type = 'admin';
        $dashboardlink = 'dashboardAdmin.php';
        $username = 'Tanzim';
    } 
    elseif (isset($_SESSION['Fund Raiser'])) {
        $user_type = 'Fund Raiser';
        $dashboardlink = 'dashboardFundRaiser.php';
        $username = 'Ikram';
    }

    // Save form data to the database
    $fundfor = isset($_REQUEST['fundfor']) ? $_REQUEST['fundfor'] : "";
    $contact_number = isset($_REQUEST['contact_number']) ? $_REQUEST['contact_number'] : "";
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
    $zipcode = isset($_REQUEST['zipcode']) ? $_REQUEST['zipcode'] : "";
    $reason = isset($_REQUEST['reason']) ? $_REQUEST['reason'] : "";
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : "";
    $bank_type = isset($_REQUEST['bank_type']) ? $_REQUEST['bank_type'] : "";
    $bank_name = isset($_REQUEST['bank_name']) ? $_REQUEST['bank_name'] : "";
    $account_number = isset($_REQUEST['account_number']) ? $_REQUEST['account_number'] : "";

    $fundforError = $phoneError = $emailError = $addressError = $zipError = $reasonError = $amountError = "";
    $bankTypeError = $bankNameError = $accountNumberError = "";

    // Check if the form was submitted
    if (isset($_POST['submit'])) {        

        // -------------------------------------FundFor Validation Starts-------------------------------------
        if (empty($fundfor)) {
            $fundforError = "Please select who you are fundraising for.";
        }
        // -------------------------------------FundFor Validation Ends-------------------------------------

        // --------------------------------------Phone Number Validation Starts--------------------------------------
        if (empty($contact_number)) {
            $phoneError = "Please enter a phone number.";
        }
        
        elseif (strlen($contact_number) != 11 || $contact_number[0] != '0' || $contact_number[1] != '1') {
            $phoneError = "Invalid phone number. Please enter a valid phone number.";
        }
        // ---------------------------------------Phone Number Validation Ends---------------------------------------

        // --------------------------------------Email Validation Starts--------------------------------------
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Please enter an email address.";
        }

        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format.";
        }
        // ---------------------------------------Email Validation Ends---------------------------------------

        // -------------------------------------Address Validation Starts-------------------------------------
        // Remove leading and trailing whitespaces
        $trimmed_address = trim($address);

        // Check if the address is empty
        if (empty($trimmed_address)) {
            $addressError = "Address cannot be empty.";
        }

        // Check if the address contains only alphanumeric characters, spaces, commas, hyphens, and periods
        elseif (!preg_match('/^[a-zA-Z0-9\s,-.]+$/', $trimmed_address)) {
            $addressError = "Address can only contain letters, numbers, spaces, commas, hyphens, and periods.";
        }

        // Check if the address is too long
        elseif (strlen($trimmed_address) > 255) {
            $addressError = "Address is too long. Maximum length is 255 characters.";
        }
        // --------------------------------------Address Validation Ends--------------------------------------

        // -------------------------------------Zip Code Validation Starts-------------------------------------
        if (empty($zipcode)) {
            $zipError = "Zip code cannot be empty.";
        } 
        elseif (!is_numeric($zipcode)) {
            $zipError = "Zip code should be numeric.";
        }
        // --------------------------------------Zip Code Validation Ends--------------------------------------

        // -------------------------------------Reason Validation Starts-------------------------------------
        if (empty($reason)) {
            $reasonError = "Please select a reason.";
        }
        // --------------------------------------Reason Validation Ends--------------------------------------

        // -------------------------------------Amount Validation Starts-------------------------------------
        if (empty($amount)) {
            $amountError = "Please select a reason.";
        } 

        elseif (!is_numeric($amount)) {
            $amountError = "Amount should be numeric.";
        }
        // -------------------------------------Amount Validation Ends-------------------------------------

        // ------------------------------------Bank Type Validation Starts------------------------------------
        if (empty($bank_type)) {
            $bankTypeError = "Please select a bank type.";
        } 
        elseif ($bank_type === "Mobile bank") {
            // Validate account number for Mobile bank
            if (strlen($account_number) !== 11 || !is_numeric($account_number)) {
                $accountNumberError = "Account number for Mobile bank should be 11 digits numeric.";
            } else {
                // Reset the account number error if it was previously set
                $accountNumberError = "";
            }
        } 
        elseif ($bank_type === "Bank") {
            // Validate account number for Bank
            $accountLength = strlen($account_number);
            if ($accountLength < 9 || $accountLength > 13 || !is_numeric($account_number)) {
                $accountNumberError = "Account number for Bank should be between 9 to 13 digits numeric.";
            } else {
                // Reset the account number error if it was previously set
                $accountNumberError = "";
            }
        }        
        // -------------------------------------Bank Type Validation Ends-------------------------------------

        // ------------------------------------Bank Name Validation Starts------------------------------------
        if (empty($bank_name)) {
            $bankNameError = "Please select a bank name.";
        }
        // -------------------------------------Bank Name Validation Ends-------------------------------------

        // -------------------------------------Account Number Validation Starts-------------------------------------
        if (empty($account_number)) {
            $accountNumberError = "Please enter an account number.";
        } 
        // --------------------------------------Account Number Validation Ends--------------------------------------

        if (empty($fundforError) && empty($phoneError) && empty($emailError) && empty($addressError) && empty($zipError) && empty($reasonError) && empty($amountError) && empty($bankTypeError) && empty($bankNameError) && empty($accountNumberError)) {

            // Insert into database
            $con = getConnection();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO tempcamp (fundfor, contact_number, email, address, zipcode, reason, amount, user_type, username, bank_type, bank_name, account_number) VALUES ('{$fundfor}', '{$contact_number}', '{$email}', '{$address}', '{$zipcode}', '{$reason}', '{$amount}', '{$user_type}', '{$username}', '{$bank_type}', '{$bank_name}', '{$account_number}')";

            $result = mysqli_query($con, $sql);
            if ($result) {
                header('location: ../view/createCampaings.php');
                exit();
            } 
            else {
                $error = "Create campaigns failed. Please try again.";
            }
        } 
        
        else {
            // Errors occurred
            $error = "Create campaigns failed. Please try again.";
        }
    }
}

?>