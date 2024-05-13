<?php
    require_once('db.php');


    function login($username, $password)
    {
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $user = mysqli_fetch_assoc($result);


        if ($count == 1) {
            session_start();
            $_SESSION['id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    function userrole($username)
    {
        $con = getConnection();
        $sql = "select role from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


    function getUser($id)
    {
        $con = getConnection();
        $sql = "select * from users where id = '$id'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            echo "Invalid User";
            return false;
        }
    }

    function getAllUser()
    {
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }

        return $users;
    }

    function updateUser($user)
    {
        $username = $user["username"];
        $email = $user["email"];
        $id = $user["id"];
        $gender = $_REQUEST['gender'];
        $phoneNumber = $_REQUEST['phoneNumber'];
        $con = getConnection();
        $sql = "update users set username='$username', email='$email', gender='$gender', phoneNumber='$phoneNumber' where id = '$id'";
        mysqli_query($con, $sql);
        return true;
    }

    function updateImage($id, $image)
    {

        $con = getConnection();
        $sql = "update users set image='$image' where id = '$id'";
        mysqli_query($con, $sql);
        return true;
    }

    function deleteUser($id)
    {
        $con = getConnection();
        $sql = "delete from users where id='{$id}'";
        mysqli_query($con, $sql);
        return true;
    }


    function getId($id)
    {
        $con = getconnection();
        $sql = "select * from users where id='{$id}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            return $row;
        } else {
            return null;
        }
    }

    function updatePassword($id, $password)
    {
        $con = getConnection();
        $sql = "update users set password='{$password}' where id = '{$id}'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function useremail($email)
    {
        $con = getConnection();
        $sql = "select * from users where email='{$email}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            session_start();
            $_SESSION['userid'] = $row['id'];
            return true;
        } else {
            return false;
        }
    }
?>