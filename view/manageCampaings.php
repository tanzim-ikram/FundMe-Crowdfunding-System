<?php

require_once('../controller/manageCampaingsCheck.php');

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Campaigns Management</title>
</head>

<body>
    <table class="manage-camp-table" cellspacing="0" width=100%>
        <tr>
            <td colspan="12">
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
            <td colspan="12">
                <h2 class="give-heading">Campaing Management</h2>
                <hr>
            </td>
        </tr>

        <tr>
            <th>Id</th>
            <th>Fund For</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Zipcode</th>
            <th>Reason</th>
            <th>Amount</th>
            <th>Bank Type</th>
            <th>Bank Name</th>
            <th>Account Number</th>
            <th>Action</th>
        </tr>

        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td class="camp-col"><?= $row['id'] ?></td>
                    <td class="camp-col"><?= $row['fundfor'] ?></td>
                    <td class="camp-col"><?= $row['contact_number'] ?></td>
                    <td class="camp-col"><?= $row['email'] ?></td>
                    <td class="camp-col"><?= $row['address'] ?></td>
                    <td class="camp-col"><?= $row['zipcode'] ?></td>
                    <td class="camp-col"><?= $row['reason'] ?></td>
                    <td class="camp-col"><?= $row['amount'] ?></td>
                    <td class="camp-col"><?= $row['bank_type'] ?></td>
                    <td class="camp-col"><?= $row['bank_name'] ?></td>
                    <td class="camp-col"><?= $row['account_number'] ?></td>
                    <td class="camp-col">
                        <form class="action-form" action="../controller/accept.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button class="accept-btn" type="submit" name="accept">Accept</button>
                        </form>
                        <form class="action-form" action="../controller/reject.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button class="reject-btn" type="submit" name="reject">Reject</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <?php include('footer.php'); ?>

</body>

</html>