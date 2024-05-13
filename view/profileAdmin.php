<?php
    include('../controller/sessionCheckAdmin.php');
    include('../model/userModel.php');

    $user = getUser($_SESSION['user']['username']);
?>

<html lang="en">
<head>
    <title>Profile</title>
</head>
<body>
    <table border = "1" width=100%>
        <tr>
            <?php include('header.php'); ?>
        </tr>
        <tr>
            <td>
                <?php include('account.php'); ?>
            </td>
            <td width=80%>
                <table width=100%>
                    <tr>
                        <td width=70%>
                            <fieldset>
                                <legend>Profile</legend>
                                <p>Name    :<?php echo $user['StaffName']; ?></p>
                                <hr>
                                <p>Email   :<?php echo $user['StaffEmail']; ?></p>
                                <hr>
                                <p>Phone Number   :<?php echo $user['StaffNumber']; ?></p>
                                <hr>
                                <p>Gender  :<?php echo $user['Gender']; ?></p>
                                <hr>
                                <p>Address :<?php echo $user['StaffAddress']; ?></p>
                                <hr>
                                <a href="eprofile.php">Edit Profile</a>
                            </fieldset>
                        </td>
                        <!-- profile picture show and upload a new picture -->
                        <td>
                            <form action="../controller/imageCheck.php" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Picture</legend>
                                    <img src="../image/<?php echo $user['StaffImg']; ?>" alt="" width = 30% height = 30%> <br>
                                    <input type="file" name="myfile" value="">
                                    <hr>
                                    <input type="submit" name="" value="upload" />
                                </fieldset>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan = "2" align = "center">
                <h6>Copyright @ 2017</h6>
            </td>
        </tr>
    </table>


</body>
</html>