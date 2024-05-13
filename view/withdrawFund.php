<?php 
session_start();
$serverName="localhost:3307";
$userName="root";
$password="";
$dbName="CFS1";

$conn=new mysqli($serverName,$userName,$password,$dbName);
$sql="select * from withdraw";
$res= mysqli_query($conn,$sql);


if(isset($_GET['con']))
{   
    $amount= $_GET['amount'] ;
    $Date=$_GET['date'];
    $sql9="INSERT INTO withdraw VALUES (NULL, '$amount', '$Date')";
    $res9=mysqli_query($conn,$sql9);
    if(!empty($res9)){
      echo "confirm";
      header("Location: withdrawFund.php");
    }
   
}


?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
    <link rel="stylesheet" href="style.css"/>
   
<form class="w1">
    <fieldset class="w2">
    <center>
<legend><img src="FundMe.jpg" alt="" width="400" height="100">
<table border="1">
<tr align="center">
    <th>Withdraw List</th>
    <th>Total Withdraw </th>
    <th>Total Amount </th>
</tr>
<tr>
<td>

<table border="1">
<tr align="center">

<th>Amount</th>
<th>Date</th>

</tr>
<?php while($r=mysqli_fetch_assoc($res)){?>
<tr align="center">
  
<td><?php echo $r["Amount"] ; ?></td>
<td><?php echo $r["Date"] ; ?></td>
</tr>

<?php } ?>
<tr>
    <td colspan="2" align="center"><button name="withdraw" value="" class="w6">Withdraw</button></td>
</tr>

</table>
</td>
<td align="center">
 <?php
             $sql11 = "SELECT * FROM withdraw";
             $res11=mysqli_query($conn,$sql11);
             
             if(!empty($res11)){
                $m=0;
                while ($r=mysqli_fetch_assoc($res11)) {
                    $m=$m+$r["Amount"];
                }
                $_SESSION['withdraw']=$m;
                echo "$m";
             }
             else{
                echo '0';
             }
             ?>
</td>
<td align="center">
    <?php
             $sql12 = "SELECT * FROM doante";
             $res12=mysqli_query($conn,$sql12);
             
             if(!empty($res12)){
                $t=0;
                while ($rr=mysqli_fetch_assoc($res12)) {
                    $t=$t+$rr["Amount"];
                }
                $t=$t-$_SESSION['withdraw'];
                echo "$t";
             }
             else{
                echo '0';
             }
             ?>
</td>
</tr>

</table>
<center>
           

</form>

<form>
    <fieldset class="w4">
<?php
if(isset($_GET['withdraw']))
{ 
 ?>

  Amount:<input type="number" value="" name="amount"><br>

  Date:<input type="text" value="" name="date"><br>
  
 <button name="con" value="" class="w5">Confirm</button>

<?php

}
?>
</fieldset>
</form>
<form >
    <center>
<a href="Dashboard.php" class="w3">Dashboard</a>
<center>
  </form>

</body>
</html>
