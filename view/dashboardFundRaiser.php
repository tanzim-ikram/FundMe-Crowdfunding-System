<?php
session_start();
// require_once('../model/userModel.php');

// Check if the user is logged in
if (!isset($_SESSION['Fund Raiser'])) {
    header('location: login.php');
    exit();
}

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Fund Raiser Dashboard</title>
</head>

<body>
<table cellspacing="0" width=100%>
        <tr>
            <td colspan="2">
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a class="active" href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td width=20%>
                <table class="dashboard-sidebar" width="100%" cellspacing="0">
                    <tr>
                        <td height="200px">
                            <h4>Fund Raiser Account</h4>
                            <hr style="margin-left: 40px;">
                            <nav class="dashboard-options">
                                <ul>
                                    <li><a href="createCampaings.php">Create Campaings</a></li>
                                    <li><a href="favcamp.php">Favorite Campaings</a></li>
                                    <li><a href="#">Donations</a></li>
                                    <li><a href="#">Withdrawals</a></li>
                                    <li><a href="createGiveaways.php">Post Giveaway</a></li>
                                    <li><a href="manageGiveaways.php">Manage Giveaways</a></li>
                                    <li><a href="viewGiveawayApplications.php">View Giveaway Applications</a></li>
                                    <li><a href="#"> View Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Change Profile Picture</a></li>
                                    <li><a href="#">Change Password</a></li>
                                    <!-- <li><a href="#">Manage User </a></li> -->
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </nav>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>

            <td width=80%>
                <h1 class="dashboard-welcome-text">
                    Welcome to Fund Raiser Dashboard!
                </h1>
                <p class="dashboard-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus nulla at volutpat diam ut venenatis tellus. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Eget egestas purus viverra accumsan in nisl nisi scelerisque. Aliquet eget sit amet tellus. Amet dictum sit amet justo donec enim. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Suspendisse potenti nullam ac tortor vitae. Ut tortor pretium viverra suspendisse potenti. Risus nullam eget felis eget nunc lobortis mattis aliquam. Elit eget gravida cum sociis natoque penatibus et magnis. Ornare lectus sit amet est. Vulputate mi sit amet mauris commodo quis imperdiet. Mauris pellentesque pulvinar pellentesque habitant. Massa eget egestas purus viverra accumsan in nisl. Lacus sed turpis tincidunt id aliquet risus feugiat. Ut sem nulla pharetra diam sit. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Proin sed libero enim sed faucibus turpis in eu mi. Eget velit aliquet sagittis id consectetur.
                <br>
                <br>
                Nisl nisi scelerisque eu ultrices vitae auctor. Pretium vulputate sapien nec sagittis aliquam. Tempus iaculis urna id volutpat lacus. Massa enim nec dui nunc. Dui ut ornare lectus sit amet est placerat in egestas. Enim sed faucibus turpis in. Ac auctor augue mauris augue neque gravida. Placerat in egestas erat imperdiet sed. Enim ut tellus elementum sagittis vitae et leo duis. Dui accumsan sit amet nulla facilisi morbi. Diam quis enim lobortis scelerisque fermentum dui faucibus in. At tellus at urna condimentum.
                </p>
            </td>
        </tr>

    </table>

    <?php include('footer.php'); ?>

</body>
</html>