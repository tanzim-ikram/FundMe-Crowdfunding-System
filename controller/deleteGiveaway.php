<?php

require_once('../model/db.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
    header('location: ../view/login.php');
    exit();
} 
else {
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if form is submitted
        if (isset($_POST['delete'])) {
            // Handle form submission
            
            // Retrieve giveaway ID
            $giveaway_id = isset($_POST['id']) ? $_POST['id'] : '';
            
            // Connect to the database
            $con = getConnection();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // Delete the giveaway from the database
            $sql_delete = "DELETE FROM giveaways WHERE giveaway_id = '{$giveaway_id}'";
            if (mysqli_query($con, $sql_delete)) {
                echo "Giveaway deleted successfully.";
            } else {
                echo "Error deleting giveaway: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);
        }
    }
}

?>
