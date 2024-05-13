<?php

require_once('../model/db.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
    header('location: login.php');
    exit();
} 
else {
    // Determine user type
    $dashboardlink = '';
    if (isset($_SESSION['admin'])) {
        $dashboardlink = 'dashboardAdmin.php';
        $user_type = 'admin';
    }
    elseif (isset($_SESSION['Donor'])) {
        $dashboardlink = 'dashboardDonor.php';
        $user_type = 'Donor';
    }
    elseif (isset($_SESSION['Fund Raiser'])) {
        $dashboardlink = 'dashboardFundRaiser.php';
        $user_type = 'Fund Raiser';
    }

    // Fetch all rows from the tempcamp table
    $con = getConnection();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM giveaways WHERE user_type = '$user_type'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>