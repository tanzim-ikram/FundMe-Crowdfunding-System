<?php
// session_start();

require_once('../controller/dashboard.php');

// Check if the user is not logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
    // If not logged in, redirect to the login page
    header('location: ../view/login.php');
    exit();
}


$error = '';

$con = mysqli_connect('127.0.0.1', 'root', '', 'fundme');
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

// Select favorite campaigns from the campaings table based on the user type
$sql = "SELECT * FROM campaings WHERE id IN (SELECT campaing_id FROM favcamp WHERE user_type = '$user_type') ORDER BY accepted_time DESC";
$result = mysqli_query($con, $sql);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Favorite Campaigns</title>
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
    <table class="campaing-table" cellspacing="0" width="100%">
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="campaings.php">Campaings</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <h1 style="text-align: center; margin: 30px 0 0;">Your Favorite Campaigns</h1>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                // Display favorite campaigns as blog posts
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

                    // Remove from Favorite button
                    echo "<form action='../controller/removeFromFavorite.php' method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='campaing_id' value='{$row['id']}'>";
                    echo "<button type='submit' name='remove_from_favorite'>Remove from Favorite</button>";
                    echo "</form>";

                    // Share button
                    echo "<form action='../controller/share.php' method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='campaing_id' value='{$row['id']}'>";
                    echo "<button type='submit' name='share' style='margin-left:5px;'>Share</button>";
                    echo "</form>";

                    // $share_link = "http://localhost/Project/view/campaings.php?id=" . $row['id'];
                    // echo '<button style="margin-left:5px;" onclick="copyToClipboard(\'' . $share_link . '\')">Share</button>';

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
