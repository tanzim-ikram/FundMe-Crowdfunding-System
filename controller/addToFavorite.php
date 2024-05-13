<?php

require_once('../model/db.php');

session_start();

if (isset($_POST['add_to_favorite'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
        // If not logged in, redirect to the login page
        header('location: ../view/login.php');
        exit();
    }

    // Get the user type
    $user_type = '';
    if (isset($_SESSION['admin'])) {
        $user_type = 'admin';
    } elseif (isset($_SESSION['Donor'])) {
        $user_type = 'Donor';
    } elseif (isset($_SESSION['Fund Raiser'])) {
        $user_type = 'Fund Raiser';
    }

    // User is logged in, proceed to add campaign to favorites
    $campaing_id = $_POST['campaing_id'];

    // Add the campaign to the favorites table (favcamp)
    $con = getConnection();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the user already has the campaign in favorites
    $sql_check = "SELECT * FROM favcamp WHERE user_type = '{$user_type}' AND campaing_id = '{$campaing_id}'";
    $result_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Campaign already exists in favorites for the current user
        $error =  "Campaign already exists in your favorites.";
    } 
    else {
        // Insert the campaign into favcamp for the current user
        $sql_insert = "INSERT INTO favcamp (user_type, campaing_id) VALUES ('{$user_type}', '{$campaing_id}')";
        $result_insert = mysqli_query($con, $sql_insert);

        if ($result_insert) {
            // Campaign added to favorites successfully
            header('location: ../view/favcamp.php');
        } 
        else {
            $error = "Error adding campaign to favorites.";
        }
    }

    mysqli_close($con);
}
?>