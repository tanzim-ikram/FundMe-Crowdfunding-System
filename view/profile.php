<?php

session_start();

$serverName="localhost:3307";
$userName="root";
$password="";
$dbName="CFS1";
$conn=new mysqli($serverName,$userName,$password,$dbName);

$username=$_SESSION['UserName'];
$password=$_SESSION['pass'];

$sql2 ="SELECT * FROM donator where UserName='$username' and Password='$password'";
                $res2=mysqli_query($conn,$sql2);

                if(!empty($res2)){
                
                 $r2=mysqli_fetch_assoc($res2);
                 $name=$r2["Name"];
                 $email=$r2["Email"];
                 $phNu=$r2["ContactNum"];
                 

                }

?>

<html lang="en">
<head>
    <title>Profile</title>
</head>

<body class="p1">
<link rel="stylesheet" href="style.css"/>
    <table border = "1" width=100%>
        <tr>
           
        </tr>
        <tr>
            <td>
           
            </td>
            <td width=80%>
                <table width=100%>
                    <tr>
                        <td width=70%>
                            <fieldset>
                                <legend>Profile</legend>
                                <p>Name    : <?php echo "$name" ?></p>
                                <hr>
                                <p>Email   : <?php echo "$email" ?></p>
                                <hr>
                                <p>Phone Number   : <?php echo "$phNu" ?></p>
                                <hr>
                                
                            </fieldset>
                        </td>
                        <!-- profile picture show and upload a new picture -->
                        <td>
                            <form action="" method="post" enctype="">
                                <fieldset>
                                    <legend>Picture</legend>
                                    <img src="../image/<?php echo $user['StaffImg']; ?>" alt="" width = 30% height = 30%> <br>
                                    <input type="file" name="myfile" value="">
                                    <hr>
                                    <input type="submit" name="" value="upload" />
                                </fieldset>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
       
    </table>


</body>
</html>