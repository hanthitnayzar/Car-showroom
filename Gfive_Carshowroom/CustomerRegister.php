<?php
session_start();
include('connect.php');
include('header.php');

if (isset($_POST['btnsave']))

{
	$txtcusname=$_POST['txtcusname'];
	$txtphone=$_POST['txtphone'];
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];
	$txtaddress=$_POST['txtaddress'];

	$checkEmail="SELECT * from customer WHERE Email='$txtemail'";
	$ret=mysqli_query($checkEmail);
	$count=mysqli_num_rows($ret);

	if ($count!=0)
	{

		echo "<script>window.alert(Customer Email $txtemail already exit.')</script>";
		echo "<script>window.location='CustomerRegister.php'</script>";
	}
	else
	{
		$insert="INSERT INTO customer
				 (CustomerName,Address,Phone,Email,Password) 
				 VALUES 
				 ('$txtcusname','$txtaddress','$txtphone','$txtemail','$txtpassword')";

		$ret=mysqli_query($insert);

		if($ret)
		{
			echo "<script>window.alert('Customer Account Created.')</script>";
			echo "<script>window.location='CustomerLogin.php'</script>";
		}
		else
		{
			echo "<p>Something went wrong in Customer Registration:" . mysqli_error() . "</p>";
		}
	}

}
?>
<html>
<head>
<title>Customer Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="CustomerRegister.php" method="post">
<fieldset>
<legend>Customer Registration Info: </legend>
<table align="center" cellpading="4px">
<tr>
<td>Customer Name</td>
<td>
<input type="text" name="txtcusname" placeholder="Ronaldo" required/>
</td>
</tr>

<tr>
<td>Phone</td>
<td>
<input type="text" name="txtphone" placeholder="---" required/>
</td>
</tr>

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
<td>Address</td>
<td>
<textarea name="txtaddress" required/></textarea>
</td>
</tr>

<tr>
<td>Recapture</td>
<td>
<img  src="generatecaptcha.php?rand=<?php echo rand(); ?>" id='captchaimg'/> 
	<a href='javascript: refreshCaptcha();'><img src="images/load.png" width="20" height="20"></a> 
	<script language='JavaScript' type='text/javascript'>
	function refreshCaptcha()
	{
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
</script>'
</td>
</tr>

<tr>
<td>Security Answer</td>
<td>
<input type="text" name="code" id="code" placeholder="enter recapture" required/>
</td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="btnsave" value="save"/>
<input type="reset" value="Clear"/>
</td>
</tr>

</fieldset>
</table>
</form>
<?php 
include('footer.php');
 ?>