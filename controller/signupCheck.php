<?php

require_once('../model/db.php');


// print_r($_REQUEST);

// Retrieve the JSON data from the request body
$jsonData = $_REQUEST['user'];

// Decode the JSON data to an associative array
$formData = json_decode($jsonData);

// Check if $formData is not null
if ($formData !== null) {
    // Access properties of $formData safely
    $role = isset($formData->urole) ? $formData->urole : null;
    $fullName = isset($formData->fName) ? $formData->fName : null;
    $username = isset($formData->uName) ? $formData->uName : null;
    $email = isset($formData->e_mail) ? $formData->e_mail : null;
    $phoneNumber = isset($formData->phone_Number) ? $formData->phone_Number : null;
    $password = isset($formData->passWord) ? $formData->passWord : null;
    $confirmPassword = isset($formData->confirm_Password) ? $formData->confirm_Password : null;
    $gender = isset($formData->gender_) ? $formData->gender_ : null;

    $roleError = "";
    $nameError = "";
    $usernameError = "";
    $passwordError = "";
    $confirmPasswordError = "";
    $emailError = "";
    $phoneNumberError = "";
    $genderError = "";

    if (empty($role) || empty($fullName) || empty($username) || empty($email) || empty($phoneNumber) || empty($password) || empty($confirmPassword) || empty($gender)) {
        echo "All fields are required.";
    } else {
        if (empty($role)) {
            $roleError = "Role cannot be empty.";
        }

        // Name Validation
        if (empty($fullName)) {
            $nameError = "Full Name cannot be empty.";
        } else {
            // Split the full name into parts
            $nameParts = explode(' ', $fullName);

            // Check if there are at least two parts
            if (count($nameParts) < 2) {
                $nameError = "Full name must contain at least two words.";
            }

            // Check each part for valid characters
            foreach ($nameParts as $part) {
                if (!preg_match('/^[a-zA-Z.\s]+$/', $part)) {
                    $nameError = "Full name can only contain letters, dots, or spaces.";
                    break;
                }
            }
        }

        // Username Validation
        if (empty($username)) {
            $usernameError = "Username cannot be empty.";
        } else {
            // Check if username contains only letters, numbers, dots, or spaces
            if (!preg_match('/^[a-zA-Z0-9.\s]+$/', $username)) {
                $usernameError = "Username can only contain letters, numbers, dots, or spaces.";
            }

            // Check if username contains more than one word
            if (count(explode(' ', $username)) > 1) {
                $usernameError = "Username cannot contain more than one word.";
            }

            // Check if username exceeds 15 characters
            if (strlen($username) > 15) {
                $usernameError = "Username cannot exceed 15 characters.";
            }
        }

        // Password Validation
        if (empty($password) || strlen($password) < 5) {
            $passwordError = "Password must be at least five characters long.";
        }

        // Confirm Password Validation
        if (empty($confirmPassword)) {
            $confirmPasswordError = "Confirm Password cannot be empty.";
        } else {
            if ($confirmPassword != $password) {
                $confirmPasswordError = "Passwords do not match.";
            }
        }

        // Email Validation
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }

        // Phone Number Validation
        if (empty($phoneNumber)) {
            $phoneNumberError = "Please enter your phone number.";
        } elseif (strlen($phoneNumber) != 11 || $phoneNumber[0] != '0' || $phoneNumber[1] != '1') {
            $phoneNumberError = "Invalid phone number. Please enter a valid phone number.";
        }

        // Gender Validation
        if (empty($gender)) {
            $genderError = "Please select your gender.";
        }

        // If there are no errors, proceed with database insertion
        if (empty($roleError) && empty($nameError) && empty($usernameError) && empty($passwordError) && empty($confirmPasswordError) && empty($emailError) && empty($phoneNumberError) && empty($genderError)) {
            $con = getConnection();
            $sql = "INSERT INTO users (fullname, username, password, email, role, gender, phoneNumber) VALUES ('$fullName', '$username', '$password', '$email', '$role', '$gender', '$phoneNumber')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "Data insertion successful!";
            } else {
                echo "Error inserting data. Please try again.";
            }
        } else {
            // If there are errors, concatenate and echo them
            $error = $roleError . " " . $nameError . " " . $usernameError . " " . $passwordError . " " . $confirmPasswordError . " " . $emailError . " " . $phoneNumberError . " " . $genderError;
            echo $error;
        }
    }
} 
else {
    echo "Invalid JSON data.";
}

?>