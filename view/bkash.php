<?php
session_start();
$_SESSION['method'] ="Bkash";
$dbhost="localhost:3307";
$dbuser="root";
$dbpass="";
$dbname="CFS1";
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(isset($_POST['submit'])){
        $userName=$_SESSION['UserName'];
        $Amount=$_SESSION['amount'];
        $Transction_id=$_POST['TrId'];
        $method="Bkash";
        $status="pending";
    
    $sql="INSERT INTO donateCheck  VALUES ('$userName', '$Amount', '$Transction_id', '$method', '$status')";
    $res=mysqli_query($con,$sql);
    if(!empty($res)){
        echo " Posting Successfull !";
        header("location : Dashboard.php");
    }
     $_SESSION['TrId']=$_POST['TrId'];
    }

?>
<!DOCTYPE html>
<center class="b1">
<link rel="stylesheet" href="style.css"/>
	<form method="POST" >
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<fieldset >
						
						<legend>
						<img src="bkash.jpg" alt="" width="100" height="100">
							<h2>DONATION NUMBER</h2>
                            <h5>Please send money to this number!</h5>
                            <h3>01797515203</h3>
						</legend>
                        Transation ID <h5>Please enter the tranasction id after send money !</h5>
                        <input type="text" name="TrId"/> <br/>   
                        <br /><hr/>
                        <button name="submit" class="b2">Confirmation</button>
                       
					</fieldset>
				</td>
			</tr>
		</table>
	</form>
</center>
</html>