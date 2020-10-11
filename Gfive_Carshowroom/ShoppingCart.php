<?php  
session_start();
include('connect.php');

include('ShoppingCartFunctions.php');
include('header.php');

if(isset($_GET['action'])) 
{
	$action=$_GET['action'];

	if($action==="buy") 
	{
		$ProductID=$_GET['ProductID'];
		$BuyQuantity=$_GET['txtbuyQty'];
		Add_ShoppingCart($ProductID,$BuyQuantity);
	}
	elseif($action==="remove") 
	{
		$ProductID=$_GET['ProductID'];
		Remove_ShoppingCart($ProductID);
	}
	elseif($action==="clear") 
	{
		Clear_ShoppingCart();
	}
}
else
{
	$action="";
}


?>
<html>
<head>
	<title>Shopping Cart</title>
</head>
<body>
<fieldset>
<legend>ShoppingCart Details :</legend>
<?php  
if(!isset($_SESSION['ShoppingCart'])) 
{
	echo "<p>Shopping Cart is Empty</p>";
	echo "<img src='images/Shoppingcart_empty.png' width='100' height='100'/>";
	echo "<a href='CustomerHome.php'>Product Display</a>"; 
	exit();
}
?>
<table align="center" border="1" cellpadding="5px">
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
	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$FrontImage=$_SESSION['ShoppingCart'][$i]['FrontImage'];

		list($width,$height)=getimagesize($FrontImage);
		$w=$width/3.5; 
		$h=$height/3.5; 

		$ProductID=$_SESSION['ShoppingCart'][$i]['ProductID'];
		$ProductName=$_SESSION['ShoppingCart'][$i]['ProductName'];
		$Price=$_SESSION['ShoppingCart'][$i]['Price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$SubTotal=$Price * $BuyQuantity;

		echo "<tr>";
		echo "<td><img src='$FrontImage' width='$w' height='$h' /></td>";
		echo "<td>$ProductID</td>";
		echo "<td>$ProductName</td>";
		echo "<td>$Price US</td>";
		echo "<td>$BuyQuantity Pcs</td>";
		echo "<td>$SubTotal US</td>";
		echo "<td><a href='ShoppingCart.php?action=remove&ProductID=$ProductID'><img src='images/Delete.png'/></a></td>";
		echo "</tr>";
	}
?>

<tr>
	<td colspan="7" align="right">
	Total Amount : <b><?php echo CalculateTotalAmount(); ?></b> US 
	<br/>
	Total Quantity : <b><?php echo CalculateTotalQuantity(); ?></b> Pcs
	<hr/>	
	<a href="ShoppingCart.php?action=clear">Empty Cart</a> |
	<a href="Checkout.php">Make Checkout</a> |
	<a href="CustomerHome.php">Product Display</a> 
	</td>	
</tr>
</table>

</fieldset>
<?php 
include('footer.php');
 ?>