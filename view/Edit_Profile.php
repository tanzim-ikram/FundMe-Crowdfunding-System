<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        form {
            width: 300px; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
?>

<div class="center">
    <form action="">
        <fieldset>
            <legend>Edit User</legend>
            Name: <input type="text" name="name" value=""><br>
            Email: <input type="email" name="email" value=""><br>
            Phone: <input type="number" name="phone" value=""><br>
            Date Of Birth<br/><input type="date" name="dob" value=""><br>
            <input type="submit" name="submit" value="Update"><br>
        </fieldset>
    </form>
</div>

</body>
</html>
