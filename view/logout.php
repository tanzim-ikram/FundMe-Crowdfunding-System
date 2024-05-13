<?php

session_start();

// Unset all of the session variables
unset($_SESSION['Donor']);
unset($_SESSION['admin']);
unset($_SESSION['Fund Raiser']);

// Destroy the session
session_destroy();

// Clear the remember me cookie
setcookie("username", "", time() - 3600, "/");

header('location: ../view/login.php');
exit();

?>
<html>

</html>