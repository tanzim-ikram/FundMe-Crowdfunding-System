<?php

require_once('../model/userModel.php');

$error = "";
$emailError = "";
$passwordError = "";
$confirmPassError = "";

$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$newPassword = isset($_REQUEST['newPassword']) ? $_REQUEST['newPassword'] : "";
$confirmPassword = isset($_REQUEST['confirmPassword']) ? $_REQUEST['confirmPassword'] : "";


if (isset($_POST["submit"])) {

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format!";
    }

    if (empty($newPassword)) {
        $passwordError = "Please enter a new password.";
    }

    if (empty($confirmPassword)) {
        $confirmPassError = "Please retype the new password.";
    }

    if ($newPassword && strlen($newPassword) < 6) {
        $passwordError = "Password must be at least 6 characters";
    }

    if ($confirmPassword != $newPassword) {
        $confirmPassError = "Passwords did not match. Try again.";
    }

    elseif (useremail($email)) {

        if ($newPassword == $confirmPassword) {
            session_start();

            $updatePassword = updatePassword($_SESSION['userid'], $newPassword);

            if ($updatePassword == true) {
                header('location:../view/login.php');
            } 

            else {
                $error = "Somthing went wrong. Try again.";
            }
        }

        else {
            $error = "Password doesn't match.";
        }
    } 

    else {
        $error = "The email doesn't exist!";
    }
}
