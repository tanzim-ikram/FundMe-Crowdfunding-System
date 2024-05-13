<?php

require_once('../controller/giveawayApplicationCheck.php');

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Giveaway Applications</title>
</head>

<body>
    <table class="give-app-table" cellspacing="0" width=100%>
        <tr>
            <td colspan="18">
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="../view/home.php">Home</a>
                        <a href="../view/giveaways.php">Giveaways</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="../view/logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="18">
                <h2 class="give-heading">Giveaway Applications</h2>
                <hr>
            </td>
        </tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th colspan="3">Address</th>
            <th colspan="3">Email Address</th>
            <th colspan="3">Phone Number</th>
            <th colspan="3">Applied Item</th>
            <th colspan="3">Item Category</th>
            <th>Action</th>
        </tr>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td class="give-col"><?= $row['id'] ?></td>
                    <td class="give-col"><?= $row['name'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['address'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['email'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['phone'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['item_name'] ?></td>
                    <td class="give-col" colspan="3"><?= $row['item_category'] ?></td>
                    <td>
                        <div class="buttons">
                            <form class="action-form" action="../controller/sendGiveaway.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button class="accept-btn" type="submit" name="send">Send</button>
                            </form>

                            <form class="action-form" action="../controller/deleteGiveawayApplication.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button class="reject-btn" type="submit" name="delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include('../view/footer.php'); ?>

</body>

</html>
