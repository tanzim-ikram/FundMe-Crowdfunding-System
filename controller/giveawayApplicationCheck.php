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

    // Fetch giveaway applications based on user type
    $con = getConnection();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Modify the SQL query to filter results based on user type
    $sql = "SELECT * FROM giveawayapplication WHERE posted_by = '$user_type'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
