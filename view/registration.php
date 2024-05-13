<?php 
$serverName="localhost:3307";
$userName="root";
$password="";
$dbName="CFS1";
$conn=new mysqli($serverName,$userName,$password,$dbName);
session_start();

if(!isset($_SESSION['user_name'])){
	
}
if(isset($_POST['reg'])){
	$name=$_POST['name'];
	$userName=$_POST['user_name'];
	$email=$_POST['email'];
	$contactNum=$_POST['conNum'];
	$pass=$_POST['password'];

	$sql="select * from donator where UserName='$userName'";
	$res=mysqli_query($conn,$sql);
	if($res->num_rows>0)
	{
	echo "This user name already exist please try another user name!";   
		
	}
	else if($_POST['password']==$_POST['confirmPassword'])
	{ 
	   
		$sql1="INSERT INTO `donator` ( `UserName`, `Name`, `Password`, `Email`, `ContactNum`) VALUES ( '$userName', '$name', '$pass', '$email', '$contactNum'); ";
		$res1=mysqli_query($conn,$sql1);
		if(!empty($res1)){
			echo " Registration Successfull !";
		}
		else{
			echo "Something is wrong! Please try again!";
		}
		
	}
	else{
		echo " password and confirm password are not same! please try again !" ;
	}
}
?>

<html>

<head>
    <title>Registration</title>
</head>

<body>
    <style>
        
        </style>
    <table border = '1' width= 100%>
        <tr>
            <td width= 70%>
            <img src="FundMe.jpg" alt="" width="200" height="100">
            </td>
            <td align = "center">
                <a href="home.php">Home</a>
                | <a href="login.php">login</a>
                | <a href="registration.php">Registration</a>
            </td>
        </tr>
        <tr>
            <td colspan = "2">
                <center>
                <link rel="stylesheet" href="style.css"/>
                    <form action="" method="POST" enctype="">


                        <h3>REGISTRATION</h3>
                        <hr>
                        <table border="0" cellspacing="0" cellpadding="0">


						<tr>
                                <td><label for="name">Name</label> </td>
                                <td> : <input type="text" name="name" value=""/></td>
                            </tr>
                            <tr>
                                <td><label for="username">Username</label> </td>
                                <td> : <input type="text" name="user_name" value=""/> </td>
                            </tr>
                            <tr>
                                <td><label for="email">Email</label> </td>
                                <td> : <input type="text" name="email" value=""/> </td>
                            </tr>
                            <tr>
                                <td><label for="number">Number</label> </td>
                                <td> : <input type="text" name="conNum" value=""/></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password</label> </td>
                                <td> : <input type="password" name="password" value=""/> </td>
                            </tr>
                            <tr>
                                <td><label for="confirmPassword">Confirm Password</label> </td>
                                <td> : <input type="password" name="confirmPassword" value=""/> </td>
                            </tr>
                           
                            
                        </table>
                        <div>
                            <br>
                            <input type="submit" value="Sign Up" name="reg" class="r1" />
                        </div>
                    </form>
                </center>
            </td>
        </tr>
       
    </table>
    
</body>

</html>

