<?php

require_once('../model/db.php');
// require_once('../controller/dashboard.php');

$error = "";
$nameError = "";
$addressError = "";
$emailError = "";
$phoneError = "";

// Retrieve form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$posted_by = isset($_POST['user_type']) ? $_POST['user_type'] : '';
$item_category = isset($_POST['item_category']) ? $_POST['item_category'] : '';
$item_name = isset($_POST['item_name']) ? $_POST['item_name'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Handle form submission

        // --------------------------------------Name Validation Starts--------------------------------------
        if (empty($name)) {
            $nameError = "Full Name cannot be empty.";
        }
        else {
            // Split the full name into parts
            $nameParts = explode(' ', $name);

            // Check if there are at least two parts
            if (count($nameParts) < 2) {
                $nameError = "Full name must contain at least two words.";
            }

            // Check each part for valid characters
            foreach (str_split($name) as $char) {
                if (!preg_match('/^[a-zA-Z.\s]+$/', $char)) {
                    $nameError = "Full name can only contain letters, dots, or spaces.";
                }
            }
        }
        // ---------------------------------------Name Validation Ends---------------------------------------

        // -------------------------------------Address Validation Starts-------------------------------------
        // Remove leading and trailing whitespaces
        $trimmed_address = trim($address);
        
        // Check if the address is empty
        if (empty($trimmed_address)) {
            $addressError = "Address cannot be empty.";
        }
        
        // Check if the address contains only alphanumeric characters, spaces, commas, hyphens, and periods
        if (!preg_match('/^[a-zA-Z0-9\s,-.]+$/', $trimmed_address)) {
            $addressError = "Address can only contain letters, numbers, spaces, commas, hyphens, and periods.";
        }
        
        // Check if the address is too long
        if (strlen($trimmed_address) > 255) {
            $addressError = "Address is too long. Maximum length is 255 characters.";
        }
        // --------------------------------------Address Validation Ends--------------------------------------

        // --------------------------------------Email Validation Starts--------------------------------------
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }
        // ---------------------------------------Email Validation Ends---------------------------------------

        // --------------------------------------Phone Number Validation Starts--------------------------------------
        if (strlen($phone) != 11 || $phone[0] != '0' || $phone[1] != '1') {
            $phoneError = "Invalid phone number. Please enter a valid phone number.";
        }
        // ---------------------------------------Phone Number Validation Ends---------------------------------------
        
        // Validate form fields
        if (empty($nameError) && empty($addressError) && empty($emailError) && empty($phoneError)) {
            
            // Connect to the database
            $con = getConnection();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare the SQL statement using prepared statements
            $sql = "INSERT INTO giveawayapplication (name, address, email, phone, posted_by, item_name, item_category) VALUES ('{$name}', '{$address}', '{$email}', '{$phone}', '{$user_type}', '{$item_name}', '{$item_category}')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Redirect to giveaways.php on success
                header('location: ../view/giveaways.php');
                exit();
            } else {
                // Handle query execution error
                $error = "Create campaigns failed. Please try again.";
            }

            // Close connection
            mysqli_close($con);
        } 
    }
}

?>
