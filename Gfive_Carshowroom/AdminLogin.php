
<?php
session_start();
include('connect.php');
include('header.php');

if (isset($_POST['btnLogin'])) 
{
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];

	$checkuser="SELECT * FROM Admin
	WHERE Email='$txtemail'
	AND   Password='$txtpassword'";

	      $ret=mysql_query($checkuser);
	      $count=mysql_num_rows($ret);
	      $arr=mysql_fetch_array($ret);

	      if ($count==0)

	      {

	      	echo "<script>window.alert('User Email or Password Incorrect')</script>";
	      	echo "<script>window.location='AdminLogin.php'</script>";
	      }
	      else
	      {

	      	$_SESSION['AdminID']=$arr['AdminID'];
	      	$_SESSION['AdminName']=$arr['AdminName'];

	      	echo "<script>window.alert('Success U are Login as Admin')</script>";
	      	echo "<script>window.location='EntryProduct.php'</script>";
	      }
}
?>
<html>
<head> 
<title>Admin Login</title>
</head>
<body>
<form action="AdminLogin.php" method="post">

<fieldset>
<legend>Admin Registration Info: </legend>
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