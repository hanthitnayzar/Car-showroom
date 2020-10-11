<?php
session_start();
include('connect.php');
include('header.php');

if (isset($_POST['btnLogin'])) 
{
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];

	$checkuser="SELECT * FROM customer
	WHERE Email='$txtemail'
	AND   Password='$txtpassword'";

	      $ret=mysqli_query($checkuser);
	      $count=mysqli_num_rows($ret);
	      $arr=mysqli_fetch_array($ret);

	      if ($count==0)

	      {

	      	echo "<script>window.alert('User Email or Password Incorrect')</script>";
	      	echo "<script>window.location='CustomerLogin.php'</script>";
	      }
	      else
	      {

	      	$_SESSION['CustomerID']=$arr['CustomerID'];
	      	$_SESSION['CustomerName']=$arr['CustomerName'];

	      	echo "<script>window.alert('Success U are Login as Customer')</script>";
	      	echo "<script>window.location='CustomerHome.php'</script>";
	      }
}
?>
<html>
<head> 
<title>Customer Login</title>
</head>
<body>
<form action="CustomerLogin.php" method="post">

<fieldset>
<legend>Customer Registration Info: </legend>
<table align="center" cellpading="4px">

<tr>
<td>Email</td>
<td>
<input type="email" name="txtemail" placeholder="aa@gmail.com" required/>
</td>
</tr>

<tr>
<td>Password</td>
<td>
<input type="password" name="txtpassword" placeholder="xxxxx" required/>
</td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="btnLogin" value="Login"/>
<input type="reset" value="cancel"/>
</td>
</tr>

</fieldset>
</table>
</form>
<?php 
include('footer.php');
 ?>