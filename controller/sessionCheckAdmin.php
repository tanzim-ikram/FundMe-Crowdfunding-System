<?php 
    session_start();
    
    // Check if the user is logged in or has a remember me cookie
    if (!isset($_SESSION['admin']) && !isset($_COOKIE['username'])) {
        header('location: ../view/login.php');
        exit();
    }
?>