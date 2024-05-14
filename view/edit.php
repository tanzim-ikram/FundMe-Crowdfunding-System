<?php
    $id= $_GET['id'];

?>

<html lang="en">
<head>
    <title>Edit User</title>
</head>
<body>
        <form action="">
            <fieldset>
            Id: <input type="number" name='id' value="<?=$id?>"/> <br>
            Name: <input type="text" name='name' value=""/> <br>
            Email: <input type="email" name='email' value=""/> <br>
            password: <input type="password" name='password' value=""/> <br>
             <input type="submit" name='submit' value="update"/> <br>
            </fieldset>
        </form>
</body>
</html>