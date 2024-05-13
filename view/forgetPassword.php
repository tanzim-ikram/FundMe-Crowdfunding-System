<?php

require_once('../controller/forgotPasswordCheck.php');

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Forget Password</title>
</head>

<body>
    <table class="forgetpass-table" cellspacing="0">
        <tr>
            <td>
                <?php include('header.php'); ?>
            </td>
        </tr>
        <tr>
            <td>
            <div class="forgetpass-card">
                <form class="forgetpass-form" method="POST" action="" enctype="">
                    <fieldset>
                        <legend>FORGET PASSWORD</legend>
                        <label for="email">Enter email:</label>
                        <input type="email" name="email" value="" />
                        <span class="error-message"><b><?= $emailError ?></b></span>

                        <label for="newPassword">New Password:</label>
                        <input type="password" name="newPassword" value="" />
                        <span class="error-message"><b><?= $passwordError ?></b></span>

                        <label for="confirmPassword">Retype New Password:</label>
                        <input type="password" name="confirmPassword" value="" />
                        <span class="error-message"><b><?= $confirmPassError ?></b></span>
                        <span class="error-message"><b><?= $error ?></b></span>

                        <input type="submit" name="submit" value="Submit" />
                    </fieldset>
                </form>
            </td>
        </tr>

    </table>

    <?php include('footer.php'); ?>
    
</body>

</html>