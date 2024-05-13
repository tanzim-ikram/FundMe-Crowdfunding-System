<?php

require_once('../model/db.php');

session_start();

if (isset($_POST['remove_from_favorite'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
        // If not logged in, redirect to the login page
        header('location: ../view/login.php');
        exit();
    }

    // Get the campaign ID to remove from favorites
    $campaing_id = $_POST['campaing_id'];

    // Remove the campaign from the favorites table (favcamp)
    $con = getConnection();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the user type from the session
    $user_type = '';
    if (isset($_SESSION['admin'])) {
        $user_type = 'admin';
    } elseif (isset($_SESSION['Donor'])) {
        $user_type = 'Donor';
    } elseif (isset($_SESSION['Fund Raiser'])) {
        $user_type = 'Fund Raiser';
    }

    // Delete the campaign from favcamp
    $sql_delete = "DELETE FROM favcamp WHERE campaing_id = '$campaing_id' AND user_type = '$user_type'";
    $result_delete = mysqli_query($con, $sql_delete);

    if ($result_delete) {
        // Campaign removed from favorites successfully
        header('location: ../view/favcamp.php');
        exit();
    } else {
        $error = "Error removing campaign from favorites.";
    }

    mysqli_close($con);
}
?>
