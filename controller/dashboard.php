<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['admin']) || isset($_SESSION['Donor']) || isset($_SESSION['Fund Raiser'])) {
    $enterOption = '<a class="active" href="logout.php">Logout</a>';
} else {
    $enterOption = '<a class="active" href="login.php">Login</a>';
}

// Determine user type
// $dashboardlink = '';
if (isset($_SESSION['admin'])) {
    $dashboardlink = 'dashboardAdmin.php';
} 
elseif (isset($_SESSION['Donor'])) {
    $dashboardlink = 'dashboardDonor.php';
}
elseif (isset($_SESSION['Fund Raiser'])) {
    $dashboardlink = 'dashboardFundRaiser.php';
}

?>