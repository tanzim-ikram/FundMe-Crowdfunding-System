<?php

require_once('../controller/dashboard.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<div class="header">
  <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
  <div class="header-right">
    <a href="home.php">Home</a>
    <a href="campaings.php">Campaings</a>
    <a href="giveaways.php">Giveaways</a>
    <a href="<?= $dashboardlink ?>">Dashboard</a>
    <?= $enterOption ?>
    <a href="signup.php">Sign Up</a>
  </div>
</div>

</body>
</html>