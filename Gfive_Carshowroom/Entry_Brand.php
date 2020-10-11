<?php  
session_start();  
include('connect.php');
include('header.php');

if(isset($_POST['btnSave'])) 
{
	$txtbrandname=$_POST['txtbrandname'];
	$rdoStatus=$_POST['rdoStatus'];

	$checkBrand="SELECT * FROM brand WHERE BrandName='$txtbrandname'";
	$ret=mysql_query($checkBrand);
	$count=mysql_num_rows($ret);

	if($count!=0) 
	{
		echo "<script>window.alert('BrandName $txtbrandname already exist.')</script>";
		echo "<script>window.location='Entry_Brand.php'</script>";
	}
	else
	{
		$insert="INSERT INTO brand
				 (BrandName,Status) 
				 VALUES 
				 ('$txtbrandname','$rdoStatus')";
		$ret=mysql_query($insert);

		if($ret)
		{
			echo "<script>window.alert('Brand Registration Complete.')</script>";
			echo "<script>window.location='Entry_Brand.php'</script>";
		}
		else
		{
			echo "<p>Something went wrong in Brand Entry :" . mysql_error() . "</p>";
		}
	}
}
?>
<html>
<head>
	<title>Brand Entry</title>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>
	<script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>
<form action="Entry_Brand.php" method="post">
<fieldset>
<legend>Enter Brand Info:</legend>

<table align="center" cellpadding="4px">
<tr>
	<td>Brand Name</td>
	<td>
		<input type="text" name="txtbrandname" placeholder="Enter Brand Name" required/>
	</td>
</tr>


	<td>Status</td>
	<td>
		<input type="radio" name="rdoStatus" value="Active" checked/>Active
		<input type="radio" name="rdoStatus" value="InActive"/>InActive
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
<legend>Brand Listing :</legend>
<?php  
$query="SELECT * FROM brand ORDER BY BrandID DESC";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);

if($count==0) 
{
	echo " <p>No Brand Record Found.</p>";
	exit();
}
?>
<table id="tableid" class="display">
	<thead>
	<tr>
		<th>BrandID</th>
		<th>BrandName</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
<?php
	for ($i=0;$i<$count;$i++) 
	{ 
		$arr=mysql_fetch_array($ret);
		$BrandID=$arr['BrandID'];
		$BrandName=$arr['BrandName'];

		echo "<tr>";
			echo "<td>$BrandID</td>";
			echo "<td>$BrandName</td>";
			echo "<td>" . $arr['Status'] . "</td>";
			echo "<td> 
					<a href='DeleteBrand.php?BrandID=$BrandID'>Delete</a> |
					<a href='UpdateBrand.php?BrandID=$BrandID'>Edit</a>
				 </td>";
		echo "</tr>";	
	}
?>
</tbody>
</table>
</fieldset>
 


</form>
<?php 
include('footer.php');
 ?>