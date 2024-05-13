<?php

require_once('../model/db.php');

// Check if the form was submitted
if (isset($_POST['reject'])) {
    // Get the campaing ID from the form
    $campaing_id = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($campaing_id)) {
        // Connect to the database
        $con = getConnection();
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Delete the campaing from the tempcamp table
        $sql_delete = "DELETE FROM tempcamp WHERE id = $campaing_id";
        $result_delete = mysqli_query($con, $sql_delete);

        if ($result_delete) {
            header('location: ../view/manageCampaings.php');
            exit();
        } else {
            echo "Error deleting campaing from tempcamp table.";
        }

        mysqli_close($con);
    } else {
        echo "Invalid campaing ID.";
    }
}

?>
