<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
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
if(isset($_POST['submit'])) {
    $targetDir = "uploads/";
    
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Display success message
            echo "The file ".$fileName. " has been uploaded.";
        } else{
            echo "Sorry, there was an error uploading your file.";
        }
    } else{
        echo 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Change Profile Picture</legend>
        <input type="file" name="file" accept="image/*">
        <input type="submit" name="submit" value="Upload">
    </fieldset>
</form>

</body>
</html>
