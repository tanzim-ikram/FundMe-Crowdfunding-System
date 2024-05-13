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
        if (isset($_POST['send'])) {
            // Handle form submission
            
            // Retrieve giveaway ID
            $applicant_id = isset($_POST['id']) ? $_POST['id'] : '';
            
            // Connect to the database
            $con = getConnection();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // Delete the giveaway from the database
            $sql_delete = "DELETE FROM giveawayapplication WHERE id = '{$applicant_id}'";
            if (mysqli_query($con, $sql_delete)) {
                echo "Giveaway sent successfully.";
            } else {
                echo "Error sending giveaway: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);
        }
    }
}

?>
