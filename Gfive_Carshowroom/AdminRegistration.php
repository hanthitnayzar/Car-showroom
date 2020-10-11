<?php
session_start();
include('connect.php');
include('header.php');

if (isset($_POST['btnSave']))

{
	$txtadminname=$_POST['txtadminname'];
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];
	$txtphone=$_POST['txtphone'];
	$txtaddress=$_POST['txtaddress'];

	$checkEmail="SELECT * from Admin Where Email='$txtemail'";
	$ret=mysql_query($checkEmail);
	$count=mysql_num_rows($ret);
	if ($count!=0)
	{
		echo "windows.alert('Admin Email $txtemail already exits')</script>";
	    echo "windows.location='AdminRegistration.php ' </script>";	
	}
	else

	{

      $insert="insert into Admin
        (AdminName,Email,Password,Phone,Address)
        VALUES 
        ('$txtadminname','$txtemail','$txtpassword','$txtphone','$txtaddress')";

        $ret=mysql_query($insert);
        
        if($ret)

        {

        echo "<script>window.alert('Admin Account Created.')</script>";
			echo "<script>window.location='AdminLogin.php'</script>";	
        }
        else
        {
        	echo "<p> Something went wrong".mysql_error() . "</p>";
        }
	}
}
?>

<html>
<head>
<title>Admin Registration</title>
</head>
<body>
<form action="AdminRegistration.php" method="post">
<fieldset>
<legend>Enter Admin Info:</legend>
<table align="center" cellpading="4px">
	
<tr>
<td>Admin Name</td>
<td>
<input type="text" name="txtadminname" placeholder="Matic" required/>
</td>
</tr>

<tr>
<td>Email</td>
<td>
<input type="text" name="txtemail" placeholder="aa@gmail.com" required/>
</td>
</tr>

<tr>
	<td>Password</td>
	<td>
		<input type="password" name="txtpassword" placeholder="XXXXXXXXXXXXXX" required/>
	</td>
</tr>

<tr>
<td>Phone</td>
<td>
<input type="text" name="txtphone" placeholder="----" required/>
</td>
</tr>

</tr>
<tr>
	<td>Address</td>
	<td>
		<textarea name="txtaddress" required/></textarea>
	</td>
</tr>

<tr>
	<td></td>
	<td>
	<input type="submit" name="btnSave" value="Save"/>
	<input type="reset" value="Clear"/>
	</td>
</tr>
</table>

</fieldset>
</table>

</fieldset>
</form>
<?php 
include('footer.php');
 ?>s