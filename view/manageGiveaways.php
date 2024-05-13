<?php

require_once('../controller/manageGiveawaysCheck.php');

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Giveaway Management</title>
</head>

<body>
    <table class="manage-give-table" cellspacing="0" width=100%>
        <tr>
            <td colspan="12">
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="giveaways.php">Giveaways</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="12">
                <h2 class="give-heading">Giveaway Management</h2>
                <hr>
            </td>
        </tr>
        
        <tr>
            <th colspan="2">Id</th>
            <th>Item Category</th>
            <th colspan="3">Item Name</th>
            <th>Item Quantity</th>
            <th>Item Image</th>
            <th>Post Time</th>
            <th>Action</th>
        </tr>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td class="give-col" colspan="2"><?= $row['giveaway_id'] ?></td>
                    <td class="give-col"><?= $row['item_category'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['item_name'] ?></td>
                    <td class="give-col"><?= $row['item_quantity'] ?></td>
                    <td class="give-col"><img src="<?= $row['item_image'] ?>" alt="Item Image" width="100" height="100"></td>
                    <td class="give-col"><?= $row['posted_time'] ?></td>
                    <td class="give-col">
                        <form class="action-form" action="../controller/editGiveaways.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['giveaway_id'] ?>">
                            <button class="accept-btn" type="submit" name="edit">Edit</button>
                        </form>
                        <form class="action-form" action="../controller/deleteGiveaway.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['giveaway_id'] ?>">
                            <button class="reject-btn" type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <?php include('footer.php'); ?>

</body>

</html>
