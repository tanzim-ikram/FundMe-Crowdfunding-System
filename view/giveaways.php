<?php

require_once('../model/db.php');
require_once('../controller/giveawayCheck.php');

$error = '';

// session_start();

// Fetch giveaways from the database
$con = getConnection();
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM giveaways ORDER BY posted_time DESC";
$result = mysqli_query($con, $sql);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Giveaways</title>
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
                <h1 style="text-align: center; margin: 30px 0 0;">Giveaways</h1>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                    // Display giveaways
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_category = ucwords($row['item_category']);
                        $item_name = ucwords($row['item_name']);
                        $item_quantity = $row['item_quantity'];
                        $item_image = $row['item_image'];
                        $posted_by = ucwords($row['posted_by']);
                        $user_type = ucwords($row['user_type']);
                        $posted_on = $row['posted_time'];

                        echo "<div class='campaign-description'>";
                        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
                        echo "<p>Posted by: $posted_by <b>($user_type)</b> | Posted on: $posted_on</p>";
                        echo "<h3>Title: I want to giveaway <span style='color: green;'>$item_name</span></h3>";
                        echo "<img src='$item_image' alt='' width='90' height='150'>";
                        echo "<h3>Details:</h3>";
                        echo "<p>Item Category: $item_category</p>";
                        echo "<p>Item Name: $item_name</p>";
                        echo "<p>Item Quantity: $item_quantity</p>";
                        echo "</div>";

                        // Acquire Now Button
                        // echo "<form action='../view/acquireGiveaway.php' method='post' style='display: inline;'>";
                        // echo "<input type='hidden' name='giveaway_id' value='{$row['user_type']}'>";
                        // echo "<button type='submit' name='share' style='margin-right:5px;'>Acquire Now</button>";
                        // echo "</form>";

                        echo "<form action='../view/acquireGiveaway.php' method='post' style='display: inline;'>";
                        echo "<input type='hidden' name='user_type' value='{$row['user_type']}'>";
                        echo "<input type='hidden' name='item_category' value='{$row['item_category']}'>";
                        echo "<input type='hidden' name='item_name' value='{$row['item_name']}'>";
                        // echo "<input type='hidden' name='item_quantity' value='{$row['item_quantity']}'>";
                        echo "<button type='submit' name='acquire' style='margin-right:5px;'>Acquire Now</button>";
                        echo "</form>";


                        // echo "<button type='button' style='margin-right:5px;'> <a href='../view/acquireGiveaway.php'>Acquire Now</a></button>";

                        // Share button
                        // echo "<form action='../controller/sharegiveaway.php' method='post' style='display: inline;'>";
                        // echo "<input type='hidden' name='giveaway_id' value='{$row['giveaway_id']}'>";
                        // echo "<button type='submit' name='share' style='margin-left:5px;'>Share</button>";
                        // echo "</form>";

                        $share_link = "http://localhost:8012/FundMe/view/giveaways.php?id=" . $row['giveaway_id'];
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
