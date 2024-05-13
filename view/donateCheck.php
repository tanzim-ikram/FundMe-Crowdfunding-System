<?php 
session_start();
$serverName="localhost:3307";
$userName="root";
$password="";
$dbName="CFS1";

$conn=new mysqli($serverName,$userName,$password,$dbName);
$sql="select * from donatecheck";
$res= mysqli_query($conn,$sql);


if(isset($_GET['editF']))
{   $userName=$_SESSION['userNam'];
    $amount= $_SESSION['amount'] ;
    $method=$_SESSION['method'];
    $TrId= $_GET['editF'];
    $status=$_GET['editstatus'];
   $sql5="update donatecheck set status = '$status' where TrId='$TrId'";
   $res5=mysqli_query($conn,$sql5);
   //header("Location: donateCheck.php");
 

    $s="confirm";
   if($status===$s){

    $sql9="INSERT INTO doante VALUES ('$userName', '$amount', '$TrId', '$method')";
    $res9=mysqli_query($conn,$sql9);
    if(!empty($res9)){
      echo "confirm";
      header("Location: donateCheck.php");
    }
   }
}


?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<center class="dc3">
<link rel="stylesheet" href="style.css"/>
<form >
  <fieldset class="dc1">
<table border="1">
<tr align="center">
<th>User Name</th>
<th>Amount</th>
<th>method</th>
<th>Tranasction_Id</th>
<th>Status</th>
<th colspan="2">Option</th>
</tr>
<?php while($r=mysqli_fetch_assoc($res)){?>
<tr align="center">
  
<td><?php echo $r["username"] ; ?></td>
<td><?php echo $r["amount"] ; ?></td>
<td><?php echo $r["method"] ; ?></td>
<td><?php echo $r["TrId"] ; ?></td>
<td><?php echo $r["status"] ; ?></td>
<td><button name="edit" value="<?php echo $r["TrId"] ; ?>" class="dn2">Edit</button></td>

</tr>
<?php } ?>

</table>
</form>

<form>
<?php
if(isset($_GET['edit']))
{ 
  $TrId=$_GET['edit'];
  $sql0="select * from donatecheck where TrId='$TrId'";
  $res0=mysqli_query($conn,$sql0);
  if(!empty($res0)){

    $r0=mysqli_fetch_assoc($res0);
  
  ?>
  username:<?php echo $r0["username"] ; ?><br>
  amount:<?php echo $r0["amount"]  ; ?><br>
  method:<?php echo $r0["method"]  ; ?><br>
  tranasction Id:<?php echo $r0["TrId"] ; ?><br>
  Status:<input type="text" value="<?php echo $r0["status"]  ?>" name="editstatus"><br>

  <?php 
  $_SESSION['userNam']=$r0["username"];
  $_SESSION['amount']=$r0["amount"] ;
  $_SESSION['method']=$r0["method"];
  }
   
  ?>
 <button name="editF" value="<?php echo $_GET['edit']; ?>" class="dc5">Edit</button>

<?php

?>
<?php

}
?>
</fieldset>
</form>
<form>
<a href="Dashboard.php" class="dc4">Dashboard</a>
  </form>
</center>
</body>
</html>
