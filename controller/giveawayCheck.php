<?php

require_once('../model/db.php');
require_once('../controller/dashboard.php');

// session_start();

$error = '';
$user_type = '';
$dashboardlink = '';
$username = '';
$categoryError = '';
$itemNameError = '';
$quantityError = '';
$uploadError = '';

// $error = "";

// Check if the user is logged in
// if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
//     header('location: ../view/login.php');
//     exit();
// } 


// else {
    // header('location: ../view/giveaways.php');
    
    if (isset($_SESSION['admin'])) {
        $user_type = 'admin';
        $dashboardlink = 'dashboardAdmin.php';
        $posted_by = 'Tanzim';
    }
    elseif (isset($_SESSION['Donor'])) {
        $user_type = 'Donor';
        $dashboardlink = 'dashboardDonor.php';
        $posted_by = 'Tanzim';
    }
    elseif (isset($_SESSION['Fund Raiser'])) {
        $user_type = 'Fund Raiser';
        $dashboardlink = 'dashboardFundRaiser.php';
        $posted_by = 'Ikram';
    }

    // Retrieve form data
    $item_category = isset($_REQUEST['item_category']) ? $_REQUEST['item_category'] : "";
    $item_name = isset($_REQUEST['item_name']) ? $_REQUEST['item_name'] : "";
    $item_quantity = isset($_REQUEST['item_quantity']) ? $_REQUEST['item_quantity'] : ""; 

    // Check if form is submitted
    if (isset($_POST['submit'])) {
            
        // Validate form fields
        if (empty($_POST['item_category'])) {
            $categoryError  = "Item category is required.";
        }
        
        if (empty($_POST['item_name'])) {
            $itemNameError = "Item name is required.";
        }

        if (empty($_POST['item_quantity'])) {
            $quantityError = "Item quantity is required.";
        } 

        // Get the current timestamp
        $posted_time = date('Y-m-d H:i:s');

        // Check if image file is uploaded
        if ($_FILES['item_image']['error'] == 0) {
            // Handle uploaded image
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['item_image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES['item_image']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } 
            else {
                $uploadError = "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES['item_image']['size'] > 500000) {
                $uploadError = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow only certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $uploadError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // If everything is ok, try to upload file
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES['item_image']['tmp_name'], $target_file) && empty($categoryError) && empty($itemNameError) && empty($quantityError) && empty($uploadError)) {
                    // File uploaded successfully
                    // Insert data into giveaways table
                    $con = getConnection();
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "INSERT INTO giveaways (item_category, item_name, item_quantity, posted_by, user_type, item_image, posted_time) 
                            VALUES ('{$item_category}', '{$item_name}', '{$item_quantity}', '{$posted_by}', '{$user_type}', '{$target_file}', '{$posted_time}')";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        // Data inserted successfully
                        header('location: ../view/createGiveaways.php');
                        mysqli_close($con);
                    } 
                    else {
                        $error = "Error inserting data into giveaways table.";
                    }
                } 
                else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
        } 
        elseif (empty($categoryError) && empty($itemNameError) && empty($quantityError) && empty($uploadError)) {
            // No image file uploaded
            // Insert data into giveaways table without image
            $con = getConnection();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO giveaways (item_category, item_name, item_quantity, posted_by, user_type, posted_time) 
                    VALUES ('$item_category', '$item_name', '$item_quantity', '{$posted_by}', '{$user_type}', '{$posted_time}')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Data inserted successfully
                header('location: ../view/createGiveaways.php');
                mysqli_close($con);
            } 
            else {
                $error = "Error inserting data into giveaways table.";
            }
        }
    }



?>
