<?php

require_once('../model/db.php');

// Check if the form was submitted
if (isset($_POST['accept'])) {
    // Get the campaing ID from the form
    $campaing_id = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($campaing_id)) {
        // Connect to the database
        $con = getConnection();
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch the campaing details from the tempcamp table
        $sql_select = "SELECT * FROM tempcamp WHERE id = $campaing_id";
        $result_select = mysqli_query($con, $sql_select);
        $row = mysqli_fetch_assoc($result_select);

        // Get the current timestamp
        $accepted_time = date('Y-m-d H:i:s');

        // Insert the campaing details into the campaings table along with the accepted time
        $sql_insert = "INSERT INTO campaings (fundfor, contact_number, email, address, zipcode, reason, amount, user_type, username, bank_type, bank_name, account_number, accepted_time)
                        VALUES ('{$row['fundfor']}', '{$row['contact_number']}', '{$row['email']}', '{$row['address']}', '{$row['zipcode']}', '{$row['reason']}', '{$row['amount']}', '{$row['user_type']}', '{$row['username']}', '{$row['bank_type']}', '{$row['bank_name']}', '{$row['account_number']}', '$accepted_time')";
        $result_insert = mysqli_query($con, $sql_insert);

        if ($result_insert) {
            // Delete the campaing from the tempcamp table
            $sql_delete = "DELETE FROM tempcamp WHERE id = $campaing_id";
            $result_delete = mysqli_query($con, $sql_delete);

            if ($result_delete) {
                header('location: ../view/manageCampaings.php');
                exit();
            } 
            else {
                echo "Error deleting campaing from tempcamp table.";
            }
        } 
        else {
            echo "Error inserting campaing into campaings table.";
        }

        mysqli_close($con);
    } 
    else {
        echo "Invalid campaing ID.";
    }
} 

?>
