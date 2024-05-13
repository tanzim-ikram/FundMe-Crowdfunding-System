<?php

// session_start();
require_once('../model/db.php');
require_once('../controller/dashboard.php');

$error = '';
$categoryError = '';
$itemNameError = '';
$quantityError = '';
$uploadError = '';

// Check if the user is logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['Donor']) && !isset($_SESSION['Fund Raiser'])) {
    header('location: ../view/login.php');
    exit();
} 
else {

    // Retrieve form data
    $giveaway_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";   // ID of the giveaway being edited
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
        
        // Check if the user can edit this giveaway based on user_type
        $user_type = isset($_SESSION['admin']) ? 'admin' : (isset($_SESSION['Donor']) ? 'Donor' : (isset($_SESSION['Fund Raiser']) ? 'Fund Raiser' : ''));
        
        // Connect to the database
        $con = getConnection();
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Query to check if the user can edit this giveaway
        $sql_check_user = "SELECT * FROM giveaways WHERE giveaway_id = '$giveaway_id' AND user_type = '$user_type'";
        $result_check_user = mysqli_query($con, $sql_check_user);
        
        if ((mysqli_num_rows($result_check_user) > 0) && empty($categoryError) && empty($itemNameError) && empty($quantityError)) {
            // User can edit this giveaway
            
            // Update the giveaway details in the database
            $sql_update = "UPDATE giveaways SET item_category = '{$item_category}', item_name = '{$item_name}', item_quantity = '{$item_quantity}' WHERE giveaway_id = '$giveaway_id'";
            
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
                } else {
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
                    if (move_uploaded_file($_FILES['item_image']['tmp_name'], $target_file)) {
                        // File uploaded successfully
                        // Update the database with the new image path
                        $new_image_path = $target_file;
                        $sql_update = "UPDATE giveaways SET item_image = '$new_image_path' WHERE giveaway_id = '{$giveaway_id}'";
                    } else {
                        $uploadError = "Sorry, there was an error uploading your file.";
                    }
                }
            }
            
            // Execute the update query
            if (mysqli_query($con, $sql_update)) {
                echo "Giveaway updated successfully.";
            } else {
                $error = "Error updating giveaway: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);
        } else {
            $error = "You do not have permission to edit this giveaway.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Edit Giveaways</title>
</head>
<body>
<table class="giveaway-table" cellspacing="0" width=100%>
        <tr>
            <td>
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
            <td>
                <form class="giveaway-form" method="POST" action="" enctype="multipart/form-data">
                    <fieldset>
                        <legend>EDIT GIVEAWAY</legend>
                        <label for="item_category">Item Category:</label>
                        <select name="item_category" id="item_category" onchange="validateItemCategory()">
                            <option value="">Choose an option</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Food">Food</option>
                            <option value="Hygiene products">Hygiene products</option>
                            <option value="Toys">Toys</option>
                            <option value="Books">Books</option>
                            <option value="School supplies">School supplies</option>
                            <option value="Blankets">Blankets</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Household items">Household items</option>
                            <option value="Baby supplies">Baby supplies</option>
                        </select>
                        <span class="error-message" id="categoryError"><b><?= $categoryError ?></b></span>

                        <label for="item_name">Item Name:</label>
                        <input type="text" name="item_name" id="item_name" value="" onkeyup="validateItemName()">
                        <span class="error-message" id="itemNameError"><b><?= $itemNameError ?></b></span>

                        <label for="item_quantity">Item Quantity:</label>
                        <input type="text" name="item_quantity" id="item_quantity" value="" onkeyup="validateItemQuantity()">
                        <span class="error-message" id="quantityError"><b><?= $quantityError ?></b></span>

                        <label for="item_image">Item Image:</label>
                        <input type="file" name="item_image" id="item_image" onchange="validateItemName()">
                        <br>
                        <span class="error-message" id="uploadError"><b><?= $uploadError ?></b></span>
                        <span class="error-message"><b><?= $error ?></b></span>

                        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                        
                        <div class="buttons">
                            <input class="accept-btn" type="submit" name="submit" id="submitButton" value="Update" disabled>
                        </div>
                        
                    </fieldset>
                </form>
            </td>
        </tr>
    </table> 

    <script>
        function checkFormValidity() {
            let itemCategory = document.getElementById('item_category').value;
            let itemName = document.getElementById('item_name').value;
            let itemQuantity = document.getElementById('item_quantity').value;
            let itemImage = document.getElementById('item_image').value;

            let categoryError = document.getElementById('categoryError').innerText;
            let itemNameError = document.getElementById('itemNameError').innerText;
            let quantityError = document.getElementById('quantityError').innerText;
            let uploadError = document.getElementById('uploadError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                itemCategory === '' ||
                itemName === '' ||
                itemQuantity === '' ||
                itemImage === '' ||
                categoryError !== '' ||
                itemNameError !== '' ||
                quantityError !== '' ||
                uploadError !== ''
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }

        function validateItemCategory() {
            let itemCategory = document.getElementById('item_category').value;

            if (itemCategory === '') {
                document.getElementById('categoryError').innerHTML = "Please select an item.";
            }
            else {
                document.getElementById('categoryError').innerHTML = "";
            }
            checkFormValidity();
        }

        function validateItemName() {
            let itemName = document.getElementById('item_name').value;
            let itemNameError = document.getElementById('itemNameError');

            if (itemName.trim() === '') {
                itemNameError.innerText = "Please enter giveaway item name.";
            } else {
                itemNameError.innerText = "";
            }
            checkFormValidity();
        }

        function validateItemQuantity() {
            let itemQuantity = document.getElementById('item_quantity').value;

            if (itemQuantity === '') {
                document.getElementById('quantityError').innerHTML = "Please enter the quantity of the item.";
            } 
            else {
                for (let i = 0; i < itemQuantity.length; i++) {
                    if (itemQuantity[i] < '0' || itemQuantity[i] > '9') {
                        document.getElementById('quantityError').innerHTML = "Quantity should be numeric.";
                    }
                    else {
                        document.getElementById('quantityError').innerHTML = "";
                    }
                }
            }
            checkFormValidity();
        }

        function validateItemImage() {
            let fileInput = document.getElementById('item_image');
            let uploadError = document.getElementById('uploadError');
            const validImageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            let fileName = fileInput.value.toLowerCase();
            let extension = fileName.split('.').pop();

            if (fileName === '') {
                uploadError.innerText = "Please upload an image.";
            } else if (!validImageExtensions.includes(extension)) {
                uploadError.innerText = "Please upload an image with a valid file format (jpg, jpeg, png, gif).";
            } else {
                uploadError.innerText = "";
            }
            checkFormValidity();
        }

    </script>
    
    <?php include('../view/footer.php'); ?>

</body>
</html>
