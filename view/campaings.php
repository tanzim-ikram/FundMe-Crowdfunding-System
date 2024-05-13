<?php

require_once('../model/db.php');
require_once('../controller/dashboard.php');

$error = '';

// Fetch campaings from the database
$con = getConnection();
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM campaings ORDER BY accepted_time DESC";
$result = mysqli_query($con, $sql);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Campaings</title>
    <script>
        function copyToClipboard(text) {
            var textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert("Link copied to clipboard!");
        }
    </script>
</head>
<body>
    <table class="campaing-table" cellspacing="0" width=100%>
        <tr>
            <td>
                <?php include('header.php'); ?>
            </td>
        </tr>
        
        <tr>
            <td>
                <h1 style="text-align: center; margin: 30px 0 0;">Campaings</h1>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                    // Display campaings as posts
                    while ($row = mysqli_fetch_assoc($result)) {
                        $fundfor = ucwords($row['fundfor']);
                        $contact_number = $row['contact_number'];
                        $email = $row['email'];
                        $address = ucwords($row['address']);
                        $zipcode = $row['zipcode'];
                        $reason = ucwords($row['reason']);
                        $amount = $row['amount'];
                        $user_type = ucwords($row['user_type']); 
                        $posted_by = ucwords($row['username']);
                        $bank_type = ucwords($row['bank_type']);
                        $bank_name = ucwords($row['bank_name']);
                        $account_number = $row['account_number'];
                        $posted_on = $row['accepted_time'];

                        // Add +880 before the account number for Mobile Bank
                        if ($bank_type === 'Mobile_bank' || $bank_type === 'Mobile bank') {
                            $account_number = '+880' . $account_number;
                        }                        

                        echo "<div class='campaign-description'>";
                        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
                        echo "<p>Posted by: $posted_by <b>($user_type)</b> | Posted on: $posted_on</p>";
                        echo "<h3>Description:</h3>";
                        echo "<p>Fund For: $fundfor</p>";
                        echo "<p>Contact Number: $contact_number</p>";
                        echo "<p>Email: $email</p>";
                        echo "<p>Address: $address</p>";
                        echo "<p>Zipcode: $zipcode</p>";
                        echo "<p>Reason: $reason</p>";
                        echo "<p>Bank Type: $bank_type</p>";
                        echo "<p>Bank Name: $bank_name</p>";
                        echo "<p>Account Number: $account_number</p>";
                        echo "<p>Target Amount: <span style='font-weight: bold; color: green;'>$amount</span> <span>tk</span></p>";
                        echo "</div>";
                        

                        // Donate Now Button
                        echo "<button type='button' style='margin-right:5px;'>Donate Now</button>";

                        // Add to Favorite button
                        echo "<form action='../controller/addToFavorite.php' method='post' style='display: inline;'>";
                        echo "<input type='hidden' name='campaing_id' value='{$row['id']}'>";
                        echo "<button type='submit' name='add_to_favorite'>Add to Favorite</button>";
                        echo "</form>";

                        // Share butto
                        // $share_link = "http://localhost/Project/view/campaings.php?id=" . $row['id'];
                        // echo "<form action='../controller/share.php' method='post' style='display: inline;'>";
                        // echo "<input type='hidden' name='campaing_id' value='{$row['id']}'>";
                        // echo "<button type='submit' name='share' style='margin-left:5px;'>Share</button>";
                        // echo "</form>";

                        // // Share button
                        $share_link = "http://localhost:8012/FundMe/view/campaings.php?id=" . $row['id'];
                        echo '<button style="margin-left:5px;" onclick="copyToClipboard(\'' . $share_link . '\')">Share</button>';

                        // Error
                        echo "<p style='color: red;'><b><?= $error ?></b></p>";
                        
                        echo "</div>";
                    }

                ?>
            </td>
        </tr>
        
    </table>

    <?php include('footer.php'); ?>

</body>

</html>
