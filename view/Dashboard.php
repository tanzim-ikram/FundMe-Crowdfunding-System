<?php 
session_start();
$userName=$_SESSION['UserName'];
$_SESSION['UserName'] =$userName;
?>
<?php
$dbhost="localhost:3307";
$dbuser="root";
$dbpass="";
$dbname="CFS1";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

?>
<!DOCTYPE html>

<html>
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Dashboard</title>
</head>
<body >
<link rel="stylesheet" href="style.css"/>
    <table border="1" cellpadding="5" cellspacing="0" width="90%" align="center">
        <tr>
            <th colspan="2">
                <div align="left">
                <img src="FundMe.jpg" alt="" width="200" height="100">
                    <div align="right" >
                        <span>Logged in as <?php echo $_SESSION['UserName'] ;?> | </span>
                        <a href="logout.php">Logout</a>
                       
                    </div>
                </div>
                
            </th>
        </tr>
        <tr>
            <td class="d5">
                <h1>
                    <center>
                        Account
                    </center>
                </h1>
                <hr>
                <ul>
                    <li><a href="Dashboard.php">Dashboard</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="donateCheck.php">Donation Check</a></li>
                    <li><a href="withdrawFund.php">Withdraw Fund</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <br><br>
                
                </ul>
            </td>
            <td colspan="3"align="center" class="d4" >
                <h3><p>&#128100;Donation</p></h3>
                <hr>
                <br><br><br>
                <?php
                $sql ="SELECT COUNT(username) FROM doante";
                $res=mysqli_query($con,$sql);

                if(!empty($res)){
                
                 $r=mysqli_fetch_assoc($res);
                 $rr=$r["COUNT(username)"];
                 echo "$rr";

                }

                ?>
                <br><br><br><br><br>
            
            
            </td>
            <td colspan="3"align="center" class="d3">
                <h3><p>&#128181;Funds Raised</p></h3>
                <hr>
                <br><br><br>
                <?php
             $sql1 = "SELECT * FROM doante";
             $res1=mysqli_query($con,$sql1);
             
             if(!empty($res1)){
                $m=0;
                while ($r=mysqli_fetch_assoc($res1)) {
                    $m=$m+$r["Amount"];
                }
                echo "$m";
             }
             else{
                echo '0';
             }
             ?>
              <br><br><br><br><br>
            </td>
            <td colspan="3"align="center" class="d2">
                <h3><p>&#128101;Member</p></h3>
                <hr>
                <br><br><br>
                <?php
                $sql2 ="SELECT COUNT(UserName) FROM donator";
                $res2=mysqli_query($con,$sql2);

                if(!empty($res2)){
                
                 $r2=mysqli_fetch_assoc($res2);
                 $rr2=$r2["COUNT(UserName)"];
                 echo "$rr2";

                }

                ?>
                 <br><br><br><br><br>
                
            </td>
            <td colspan="3"align="center" class="d1">
                <h3><p>&#128226;Campaign</p></h3>
                <hr>
                <br><br><br>
                <?php
                echo "6";
                ?>
                 <br><br><br><br><br>
            </td>
        </tr>
        
    </table>
</body>
</html>