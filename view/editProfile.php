<?php
    include('../controller/sessioncheck.php');
    include('../model/userModel.php');
    include('../controller/editprofileCheck.php');

    $user = getUser($_SESSION['user']['username']);
?>

<html lang="en">
<head>
    <title>Edit Profile</title>
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
                <form action="" method="post">
                    <fieldset>
                        <legend>Edit Profile</legend>
                        Name: <input type="text" name="name" value="<?php echo $user['user_name']?>" /> <p><?= $nameError ?></p> <hr>
                        Email:<input type="email" name="email" value="<?php echo $user['email']?>" /><hr>
                        Phone Number:<input type="text" name="number" value="<?php echo $user['conNum']?>" /><p><?= $numberError ?></p> <hr>
                       
                        <hr>
                        <input type="submit" name="submit" value="Submit" />
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>


</body>
</html>