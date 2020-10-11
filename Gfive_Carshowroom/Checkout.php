<?php  
session_start();
include('connect.php');
include('AutoID_Helper.php');
include('ShoppingCartFunctions.php');
include('header.php');
if(isset($_SESSION['CustomerID'])) 
{
	if(!isset($_SESSION['ShoppingCart'])) 
	{
		echo "<script>window.alert('Yout Shopping Bag is Empty')</script>";
		echo "<script>window.location='Customer_Home.php'</script>";
	}
}

if(isset($_POST['btnCheckout'])) 
{
	//Orders--------------------------------------------------

	$txtOrderID=$_POST['txtOrderID'];
	$txtOrderDate=$_POST['txtOrderDate'];
	$rdoPaymentPlan=$_POST['rdoPaymentPlan'];
	
	$rdoPaymentOption=$_POST['rdoPaymentOption'];
	
	$txtCardInfo=$_POST['txtCardInfo'];
	if($txtCardInfo=="") 
	{
		$txtCardInfo="Paid with COD";
	}
	//----------------------------------------------
	$CustomerID=$_SESSION['CustomerID'];
	$TotalAmount=CalculateTotalAmount();
	$TotalQuantity=CalculateTotalQuantity();
	$Status="Pending";

	/*if($rdoPaymentOption==="COD") 
	{
		
	}*/

	//Insert Order Data in table.

	$query="INSERT INTO saleorder
			(`SaleOrderID`, `SaleDate`, `CustomerID`, `TotalAmount`, `TotalQuantity`, 
		    `Status`, `PaymentPlan`,  `PaymentOption`, 
		    `CardNo`)
			VALUES 
			('$txtOrderID','$txtOrderDate','$CustomerID','$TotalAmount','$TotalQuantity',
		    '$Status','$rdoPaymentPlan','$rdoPaymentOption',
		    '$txtCardInfo')";
	$ret=mysql_query($query);

	//Payment--------------------------------------------------

	$txtNetAmount=$_POST['txtNetAmount'];
	$txtPendingAmount=$_POST['txtPendingAmount'];

	$query_payment="INSERT INTO Payment
					(`OrderID`, `TotalAmount`, `NetAmount`, `PendingAmount`, `PaymentPlan`)
					VALUES 
					('$txtOrderID','$TotalAmount','$txtNetAmount','$txtPendingAmount','$rdoPaymentPlan')";
	$ret=mysql_query($query_payment);
					

	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$ProductID=$_SESSION['ShoppingCart'][$i]['ProductID'];
		$Price=$_SESSION['ShoppingCart'][$i]['Price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		
		$insert_ODetail="INSERT INTO orderdetail
				 (`SaleOrderID`, `ProductID`, `Price`, `Quantity`)
				 VALUES 
				 ('$txtOrderID','$ProductID','$Price','$BuyQuantity')";
		$ret=mysql_query($insert_ODetail);

		$updateQty="UPDATE Product
					SET Quantity=Quantity-'$BuyQuantity'
					WHERE ProductID='$ProductID'";
		$ret=mysql_query($updateQty);
	}

	if($ret)
	{
		unset($_SESSION['ShoppingCart']);
		echo "<script>window.alert('Checkout Process Complete')</script>";
		echo "<script>window.location='CustomerHome.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Checkout Form :" . mysql_error() . "</p>";
	}
}

?>
<html>
<head>
<title>Checkout</title>

<script type="text/javascript">

function CalculatePayment() 
{
	var TotalAmount=0;
	TotalAmount=document.getElementById('txtTotalAmount').value;
	TotalAmount=TotalAmount / 2;
	document.getElementById('txtNetAmount').value=TotalAmount;
	document.getElementById('txtPendingAmount').value=TotalAmount;
}

function CalculatePaymentDefault() 
{
	var TotalAmount=0;
	TotalAmount=document.getElementById('txtTotalAmount').value;
	document.getElementById('txtNetAmount').value=TotalAmount;
	document.getElementById('txtPendingAmount').value=0;
}

function CalculatePayment_Delivery() 
{
	var NetAmount=0;
	NetAmount=document.getElementById('txtNetAmount').value;
	NetAmount=Number(NetAmount) + 5;
	document.getElementById('txtNetAmount').value=NetAmount;
}

function CalculatePayment_OtherDelivery() 
{
	var NetAmount=0;
	NetAmount=document.getElementById('txtNetAmount').value;
	NetAmount=Number(NetAmount) - 5;
	document.getElementById('txtNetAmount').value=NetAmount;
}

function DisplayCard() 
{
	document.getElementById('txtCardInfo').style.display='block';
}

function HideCard() 
{
	document.getElementById('txtCardInfo').style.display='none';
}

</script>

</head>
<body onLoad="CalculatePaymentDefault()">

<form action="Checkout.php" method="post">
<fieldset>
<legend>Secure Checkout :</legend>
<table align="center">
<tr>
	<td>Order ID</td>
	<td>
	 : <input type="text" name="txtOrderID" value="<?php echo AutoID('saleorder','SaleOrderID','OR-',6) ?>" readonly/>
	</td>
</tr>
<tr>
	<td>Order Date</td>
	<td>
	 : <input type="text" name="txtOrderDate" value="<?php echo date('Y-m-d') ?>" readonly/>
	</td>
</tr>
<tr>
	<td>Customer Name</td>
	<td>
	 : <input type="text" name="txtCusName" value="<?php echo $_SESSION['CustomerName'] ?>" readonly/>
	</td>
</tr>
<tr>
	<td>Total Amount</td>
	<td>
	 : <input type="text" id="txtTotalAmount" name="txtTotalAmount" value="<?php echo CalculateTotalAmount() ?>" readonly/> US
	</td>
</tr>
<tr>
	<td>Net Amount</td>
	<td>
	 : <input type="text" id="txtNetAmount" name="txtNetAmount" value="0" readonly/> US
	</td>
</tr>
<tr>
	<td>Pending Amount</td>
	<td>
	 : <input type="text" id="txtPendingAmount" name="txtPendingAmount" value="0" readonly/> US
	</td>
</tr>
<tr>
	<td>Total Quantity</td>
	<td>
	 : <input type="text" name="txtTotalQuantity" value="<?php echo CalculateTotalQuantity() ?>" readonly/> Pcs
	</td>
</tr>
<tr>
	<td>Payment Plan</td>
	<td>
	 : <input type="radio" name="rdoPaymentPlan" value="Full" onClick="CalculatePaymentDefault()" checked/> Full Payment
	   <input type="radio" name="rdoPaymentPlan" value="Half" onClick="CalculatePayment()"/> Half Payment
	</td>
</tr>

<tr>
	<td>Payment Option</td>
	<td>
	 : 
	   <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="VISA"/> Visa
	   <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="MASTER"/> MASTER
	   <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="MYANPAY"/> MYAN-PAY
	   <br/><br/>
	   <input type="text" id="txtCardInfo" name="txtCardInfo" size="25" placeholder="#### #### #### ####" style="display:none;"/>
	</td>
</tr>

<tr>
	<td></td>
	<td>
	<input type="submit" name="btnCheckout" value="Checkout Now"/>
	<button><a href="ShoppingCart.php?action=clear">Cancel</a></button>
	</td>
</tr>
</table>
</fieldset>



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
</table>
</form>
<?php 
include('footer.php');
 ?>