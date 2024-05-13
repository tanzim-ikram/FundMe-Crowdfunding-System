<?php

require_once("../model/userModel.php");

$error = "";

// Start session
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"]) || isset($_COOKIE["username"])) {
    // Redirect to dashboard based on user role
    if (isset($_SESSION['Donor'])) {
        header('location: ../view/dashboardDonor.php');
    } elseif (isset($_SESSION['admin'])) {
        header('location: ../view/dashboardAdmin.php');
    } elseif (isset($_SESSION['Fund Raiser'])) {
        header('location: ../view/dashboardFundRaiser.php');
    }
    exit();
}

// If the user is not logged in and no "Remember Me" cookie is set, continue with the login process
$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

if (isset($_POST['submit'])) {
    if ($username == "" || $password == "") {
        $error = "Null username/ password!";
    } else {
        $status = login($username, $password);

        if ($status) {
            $row = userrole($username);

            if ($row['role'] == "Donor") {
                $_SESSION['Donor'] = true;
            } 
            elseif ($row['role'] == "admin") {
                $_SESSION['admin'] = true;
            } 
            elseif ($row['role'] == "Fund Raiser") {
                $_SESSION['Fund Raiser'] = true;
            }

            // If the "Remember Me" checkbox is checked, set the cookie
            if (isset($_REQUEST['remember_me']) && $_REQUEST['remember_me'] == "true") {
                setcookie("username", $username, time() + 3600, "/"); // 30 days expiration
            }

            // Redirect to respective dashboard page
            if (isset($_SESSION['Donor'])) {
                header('location: ../view/dashboardDonor.php');
            } 
            elseif (isset($_SESSION['admin'])) {
                header('location: ../view/dashboardAdmin.php');
            } 
            elseif (isset($_SESSION['Fund Raiser'])) {
                header('location: ../view/dashboardFundRaiser.php');
            }
            exit();
        } 
        else {
            $error = "Invalid user!";
        }
    }
}

?>
