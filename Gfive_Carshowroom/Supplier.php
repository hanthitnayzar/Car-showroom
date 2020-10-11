<?php
session_start();
include('connect.php');
include('header');
if (isset($_POST['btnSave']))

{
	$txtsupname=$_POST['txtsupname'];
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];
	$txtphone=$_POST['txtphone'];
	$txtaddress=$_POST['txtaddress'];

	$checkEmail="SELET * from Supplier Where Email='$txtemail'";
	$ret=mysql_query($checkEmail);
	$count=mysql_num_rows($ret);
	if ($count!=0)
	{
		echo "windows.alert('Supplier Email $txtemail already exits')</script>";
	    echo "windows.location='Supplier.php ' </script>";	
	}
	else

	{

      $insert="insert into Supplier
        (SupplierName,Address,Email,Password,Phone)
        VALUES 
        ('$txtsupname','$txtaddress','$txtemail','$txtpassword','$txtphone')";

        $ret=mysql_query($insert);

        if($ret)

        {

        echo "<script>window.alert('Supplier Account Created.')</script>";
			echo "<script>window.location='Supplier.php'</script>";	
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
<title>Supplier</title>
</head>
<body>
<form action="Supplier.php" method="post">
<fieldset>
<legend>Enter Supplier Info:</legend>
<table align="center" cellpading="4px">
	
<tr>
<td>Supplier Name</td>
<td>
<input type="text" name="txtsupname" placeholder="Matic" required/>
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

<fieldset>
<legend>Brand List</legend>
<?php
$query="SELECT * from Supplier ORDER BY SupplierID ";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);

if($count==0)
{
	echo "<p>No Brand Record Found</p>";
	exit();
}
?>
<table align="center" cellpading="4px" border="1">
<tr>
<th>SupplierID</th>
<th>SupplierName</th>
<th>Action</th>
</tr>

<?php
for ($i=0;$i<$count;$i++)
{
	$arr=mysql_fetch_array($ret);
	$SupplierID=$arr['SupplierID'];

	echo "<tr>";
	echo "<td>$SupplierID</td>";
	echo "<td>" . $arr['SupplierName'] . "</td>";
	echo "<td>
           <a href='DeleteBrand.php?SupplierID=$SupplierID'>Delete</a> |
           <a href='UpdateBrand.php?SupplierID=$SupplierID'>Edit</a>

    </td> ";
    echo "</tr>";
}
?>
</table>

</fieldset>
</form>
<?php 
include('footer.php');
 ?>