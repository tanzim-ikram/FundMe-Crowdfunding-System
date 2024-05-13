<?php
session_start();

if(isset($_POST['pay'])){
    if(empty($_POST['amount']) || empty($_POST['payment'])){
        echo "fillup ";

    }
    else{

        $_SESSION['amount']=$_POST['amount'];
        if($_POST['payment'] =="Bkash") {
            header("location:bkash.php");
        }
        if($_POST['payment'] =="Nagad") {
            header("location:Nagad.php");
        }
    }
}


?>
<!DOCTYPE html>
<head>
    <style>

        </style>
</head>
<center class="dn1">
<link rel="stylesheet" href="style.css"/>
	<form method="POST" enctype="" >
    
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<fieldset class="dn3">
                    <legend><img src="FundMe.jpg" alt="" width="200" height="100">
						<legend>
							<h3>DONATE</h3>
						</legend>
                        Amount<br/><input type="number" name="amount"/><br/>
                        Payment Method  <br/>   
                        <select name="payment">
                        <option value="" class="dn4">--Select payment method--</option>
                        <option value="Bkash" class="dn5" >Bkash</option>
                        <option value="Nagad" class="dn6">Nagad</option>
                        </select>
                        <br /><hr/>
                        <button name="pay" class="dn2">Pay</button>
                        
					</fieldset>
				</td>
			</tr>
		</table>
	</form>
</center>
</html>