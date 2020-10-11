<?php  
session_start();  
include('connect.php');
include('AutoID_Helper.php');
include('Purchase_Functions.php');
include('header.php');

if(!isset($_SESSION['AdminID'])) 
{
	echo "<script>window.alert('Please Login first to continue.')</script>";
	echo "<script>window.location='AdminLogin.php'</script>";
}

if(isset($_REQUEST['btnSave'])) 
{
	$txtpurchaseID=$_REQUEST['txtpurchaseID'];
	$txtpurchaseDate=$_REQUEST['txtpurchaseDate'];
	$cboSupplierID=$_REQUEST['cboSupplierID'];
	$txtgovTax=$_REQUEST['txtgovTax'];
	$txtnetAmount=$_REQUEST['txtnetAmount'];

	$TotalAmount=CalculateTotalAmount();
	$TotalQuantity=CalculateTotalQuantity();	
	$GovTax=CalculateTax();
	$NetAmount=CalculateNetAmount();

	$Status="Pending";

	$insert_Pur="INSERT INTO Purchase
				 (`PurchaseID`, `PurchaseDate`, `SupplierID`, `TotalAmount`, `TotalQuantity`, `GovTax`, `NetAmount`, `Status`)
				 VALUES 
				 ('$txtpurchaseID','$txtpurchaseDate','$cboSupplierID','$TotalAmount','$TotalQuantity','$GovTax','$NetAmount','$Status')";
	$ret=mysql_query($insert_Pur);

	$size=count($_SESSION['PurchaseCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$ProductID=$_SESSION['PurchaseCart'][$i]['ProductID'];
		$PurchasePrice=$_SESSION['PurchaseCart'][$i]['PurchasePrice'];
		$PurchaseQuantity=$_SESSION['PurchaseCart'][$i]['PurchaseQuantity'];
		
		$insert_PurDetail="INSERT INTO purchasedetail
				 (`PurchaseID`, `ProductID`, `PurchasePrice`, `PurchaseQuantity`)
				 VALUES 
				 ('$txtpurchaseID','$ProductID','$PurchasePrice','$PurchaseQuantity')";
		$ret=mysql_query($insert_PurDetail);

		$updateQty="UPDATE Product
					SET Quantity=Quantity+'$PurchaseQuantity'
					WHERE ProductID='$ProductID'";
		$ret=mysql_query($updateQty);
	}

	if($ret)
	{
		unset($_SESSION['PurchaseCart']);
		echo "<script>window.alert('Purchase Process Completed')</script>";
		echo "<script>window.location='AdminHome.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Purchase Form :" . mysql_error() . "</p>";
	}
}

if(isset($_REQUEST['action'])) 
{
	$action=$_REQUEST['action'];

	if($action==='buy') 
	{
		$ProductID=$_REQUEST['cboProductID'];
		$PurchasePrice=$_REQUEST['txtpurchaseprice'];
		$PurchaseQuantity=$_REQUEST['txtpurchasequantity'];

		Add($ProductID,$PurchasePrice,$PurchaseQuantity);
	}
	elseif($action==='clear')
	{
		Clear();
	}
	elseif($action==='remove') 
	{
		$ProductID=$_REQUEST['ProductID'];
		Remove($ProductID);
	}
}
else
{
	$action="";
}

?>
<html>
<head>
<title>Product Purchase</title>

<script type="text/javascript">

function CalculateTax()
{
	var total=0;
	total=document.getElementById('txttotalAmount').value;

	var answer=total * 0.05;

	document.getElementById('txtgovTax').value=answer;
}

</script>

</head>
<body>
<form action="Product_Purchase.php" method="get">
<input type="hidden" name="action" value="buy"/>
<fieldset>
<legend>Enter Purchase Info:</legend>
<table align="center" cellpadding="4px">
<tr>
	<td>PurchaseID</td>
	<td>
		<input type="text" name="txtpurchaseID" value="<?php echo AutoID('purchase','PurchaseID','PUR-',6); ?>" required readonly/>
	</td>
</tr>
<tr>
	<td>Purchase Date</td>
	<td>
		<input type="text" name="txtpurchaseDate" value="<?php echo date('Y-m-d') ?>" required/>
	</td>
</tr>
<tr>
	<td>Staff Name</td>
	<td>
		<input type="text" name="txtstaffname" value="<?php echo $_SESSION['AdminName'] ?>" required/>
	</td>
</tr>
<tr>
	<td>Gov Tax</td>
	<td>
		<input type="number" id="txtgovTax" name="txtgovTax" value="<?php echo CalculateTax() ?>" readonly/> MMK
	</td>
</tr>
<tr>
	<td>Total Amount</td>
	<td>
		<input type="number" id="txttotalAmount" name="txttotalAmount" value="<?php echo CalculateTotalAmount() ?>" readonly/> MMK
	</td>
</tr>
<tr>
	<td>Net Amount</td>
	<td>
		<input type="number" name="txtnetAmount" value="<?php echo CalculateNetAmount() ?>" readonly/> MMK
	</td>
</tr>

<tr>
	<td>Total Quantity</td>
	<td>
		<input type="number" name="txttotalQuantity" value="<?php echo CalculateTotalQuantity() ?>" readonly/> Pcs
	</td>
</tr>
<tr>
	<td colspan="2">
		<hr/>
	</td>
</tr>
<tr>
	<td>ProductID</td>
	<td>
	<select name="cboProductID">
	<option>--Select ProductID--</option>
	<?php 
	$query="SELECT * FROM Product";
	$ret=mysql_query($query);
	$count=mysql_num_rows($ret);

	for($i=0;$i<$count;$i++) 
	{ 
		$arr=mysql_fetch_array($ret);

		$ProductID=$arr['ProductID'];
		$ProductName=$arr['ProductName'];

		echo "<option value='$ProductID'>" . $ProductID . ' - ' . $ProductName . "</option>";
	}
	 ?>
	</select>
	</td>
</tr>
<tr>
	<td>Purchase Price</td>
	<td>
		<input type="number" name="txtpurchaseprice" placeholder="0"/> MMK
	</td>
</tr>

<tr>
	<td>Purchase Quantity</td>
	<td>
		<input type="number" name="txtpurchasequantity" placeholder="0"/> Pcs
	</td>
</tr>
<tr>
	<td></td>
	<td>
	<input type="submit" name="btnAdd" value="Add"/>
	<input type="reset" value="Clear"/>
	</td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Purchase Details :</legend>
<?php  
if(!isset($_SESSION['PurchaseCart'])) 
{
	echo "<p>No Purchase Detail found.</p>";
	echo "<img src='images/Shoppingcart_empty.png' width='100' height='100'/>";
	exit();
}
?>
<table align="center" border="1">
<tr>	
	<th>Image</th>
	<th>ProductID</th>
	<th>ProductName</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>SubTotal</th>
	<th>Action</th>
</tr>
<?php 
	$size=count($_SESSION['PurchaseCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$FrontImage=$_SESSION['PurchaseCart'][$i]['FrontImage'];
		$ProductID=$_SESSION['PurchaseCart'][$i]['ProductID'];
		$ProductName=$_SESSION['PurchaseCart'][$i]['ProductName'];
		$PurchasePrice=$_SESSION['PurchaseCart'][$i]['PurchasePrice'];
		$PurchaseQuantity=$_SESSION['PurchaseCart'][$i]['PurchaseQuantity'];
		$SubTotal=$PurchasePrice * $PurchaseQuantity;

		echo "<tr>";
		echo "<td><img src='$FrontImage' width='100' height='100' /></td>";
		echo "<td>$ProductID</td>";
		echo "<td>$ProductName</td>";
		echo "<td>$PurchasePrice MMK</td>";
		echo "<td>$PurchaseQuantity Pcs</td>";
		echo "<td>$SubTotal MMK</td>";
		echo "<td><a href='Product_Purchase.php?action=remove&ProductID=$ProductID'><img src='images/close_btn.png'/></a></td>";
		echo "</tr>";
	}
?>

<tr>
	<td colspan="7" align="right">

	<select name="cboSupplierID">
	<option>--Select SupplierID--</option>
	<option>1 - MK</option>
	</select> |
	<input type="submit" name="btnSave" value="Save"/> | 
	<a href="Product_Purchase.php?action=clear">Empty Cart</a>
	</td>	
</tr>
</table>

</fieldset>

</form>
<?php 
include('footer.php');
 ?>