<?php

require_once('../controller/dashboard.php');
require_once('../controller/giveawayCheck.php');

// $error = "";

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Post Giveaway</title>
</head>

<body>
    <table class="giveaway-table" cellspacing="0" width=100%>
        <tr>
            <td>
                <div class="header">
                    <a href="home.php" class="logo"><img class="logo" src="../assets/images/FundMe.jpg" alt="FundMe Logo" width="200" height="65"></a>
                    <div class="header-right">
                        <a href="home.php">Home</a>
                        <a href="giveaways.php">Giveaways</a>
                        <a href="<?= $dashboardlink ?>">Dashboard</a>
                        <a class="active" href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <form class="giveaway-form" method="POST" action="" enctype="multipart/form-data">
                    <fieldset>
                        <legend>POST GIVEAWAY</legend>

                        <label for="item_category">What do you want to giveaway?</label>
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

                        <label for="item_name">Name of Your Giveaway Item:</label>
                        <input type="text" name="item_name" id="item_name" value="" onkeyup="validateItemName()">
                        <span class="error-message" id="itemNameError"><b><?= $itemNameError ?></b></span>

                        <label for="item_quantity">Item Quantity:</label>
                        <input type="text" name="item_quantity" id="item_quantity" value="" onkeyup="validateItemQuantity()">
                        <span class="error-message" id="quantityError"><b><?= $quantityError ?></b></span>

                        <label for="item_image">Upload Image of the Item:</label>
                        <input type="file" name="item_image" id="item_image" onchange="validateItemName()">
                        <br>
                        <span class="error-message" id="uploadError"><b><?= $uploadError ?></b></span>
                        <span class="error-message"><b><?= $error ?></b></span>

                        <div class="buttons">
                            <input type="reset" name="reset" value="Reset" />
                            <input type="submit" name="submit" value="Submit" id="submitButton" disabled />
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

</body>

<?php include('footer.php'); ?>

</html>