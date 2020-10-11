<?php
session_start();
include ('connect.php');
include('header');

if (isset($_REQUEST['ProductID']))

{
	$ProductID=$_REQUEST['ProductID'];
}
else
{
	$ProductID="";
}

$query= "SELECT * from Product Where ProductID='$ProductID'";
$ret=mysql_query($query);
$arr=mysql_fetch_array($ret);

$BrandName=$arr['BrandName'];
$Maker=$arr['Maker'];
$Instruction=$arr['Instruction'];
$ModelNo=$arr['ModelNo'];
$ModelYear=$arr['ModelYear'];
$Color=$arr['Color'];
$Direction=$arr['Direction'];
$EnginePower=$arr['EnginePower'];
$EngineType=$arr['EngineType'];
$Transmission=$arr['Transmission'];
$Kilometrage=$arr['Kilometrage'];

if (isset($_POST['btnupdate']))
 {
	$txtproductID=$_POST['txtproductID'];
	$txtBrandName=$_POST['txtBrandName'];
	$txtMaker=$_POST['txtMaker'];
	$txtInstruction=$_POST['txtInstruction'];
	$txtKilometrage=$_POST['Kilometrage'];
	$txtModelNo=$_POST['txtModelNo'];
	$txtModelYear=$_POST['txtModelYear'];
	$txtColor=$_POST['Color'];
	$txtDirection=$_POST['Direction'];
	$txtEnginePower=$_POST['EnginePower'];
	$txtEngineType=$_POST['EnginePower'];
	$txtTransmission=$_POST['Transmission'];
		
	
	$Update= "Update Product
     SET BrandName='$txtBrandName',
     Maker='$txtMaker',
	Instruction='$txtInstruction',
	Kilometrage='$txtKilometrage',
	ModelNo='$txtModelNo',
	ModelYear='$txtModelYear',
	Color='$txtColor',
	Direction='$txtDirection',
	EnginePower='$txtEnginePower',
	EngineType='$txtEngineType',
	Transmission='$txtTransmission',	
	WHERE ProductID='$txtproductID'";

	$ret=mysql_query($Update);

	if($ret)

	{
		echo "<p>Something went wrong in Product" .mysql_error()."</p>";

	}


}
?>

<html>
<head>
<title> Product Update</title>
</head>
<body>
<form action="UpdateBrand.php" method="post"></form>
<fieldset>
<legend>Enter Product Info:</legend>
<table align="center" cellpading="4px">
<input type="hidden" name="txtproductID" value=" <?php echo $ProductID ?>"/>
<tr>
	<td>BrandName</td>
<td>
<input type="text" name="txtBrandName" value="<?php echo $BrandName ?>" required/>
</td>
</tr>

<tr>
	<td>Maker</td>
<td>
<input type="text" name="txtMaker" value="<?php echo $Maker ?>" required/>
</td>
</tr>

<tr>
	<td>Instruction</td>
<td>
<input type="text" name="txtInstruction" value="<?php echo $Instruction ?>" required/>
</td>
</tr>

<tr>
	<td>Kilometrage</td>
	<td>
		<input type="text" name="txtkilometrage" placeholder="Enter Kilometrage" required/>
	</td>
</tr>
<tr>
	<td>ModelNo</td>
<td>
<input type="text" name="txtModelNo" value="<?php echo $ModelNo ?>" required/>
</td>
</tr>
<tr>
	<td>Model Year</td>
	<td>
		<input type="text" name="txtkilometrage" placeholder="Enter ModelYear" required/>
	</td>
</tr>
<tr>
	<td>Color</td>
	<td>
		<input type="text" name="txtcolor" placeholder="Enter color" required/>
	</td>
</tr>
<tr>
	<td>Direction</td>
	<td>
		<input type="text" name="txtdirection" placeholder="Enter Direction" required/>
	</td>
</tr>



<tr>
	<td>Engine Power</td>
	<td>
		<input type="text" name="txtenginepower" placeholder="Enter Engine power" required/>
	</td>
</tr>

<tr>
	<td>Engine Type</td>
	<td>
		<input type="text" name="txtenginepower" placeholder="Enter Engine Type" required/>
	</td>
</tr>


<tr>
	<td>Transmission</td>
	<td>
		<input type="text" name="txttransmission" placeholder="Enter transmission" required/>
	</td>
</tr>

<tr>
	<td></td>
	<td>
	<input type="submit" name="btnUpdate" value="Update"/>
	<input type="reset" value="Clear"/>
	</td>
</tr>
</table>
</fieldset>
<?php 
include('footer.php');
 ?>