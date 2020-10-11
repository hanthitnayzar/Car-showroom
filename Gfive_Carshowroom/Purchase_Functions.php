<?php  
function Add($ProductID,$PurchasePrice,$PurchaseQuantity)
{
	$query="SELECT * FROM Product WHERE ProductID='$ProductID'";
	$ret=mysql_query($query);
	$count=mysql_num_rows($ret);

	if($count<1) 
	{
		echo "<p>No Record Found.</p>";
		exit();
	}

	$arr=mysql_fetch_array($ret);
	$ProductName=$arr['ProductName'];
	$FrontImage=$arr['Img1'];

	if(isset($_SESSION['PurchaseCart'])) 
	{
		$index=IndexOf($ProductID);

		if($index== -1) 
		{
			$size=count($_SESSION['PurchaseCart']);

			$_SESSION['PurchaseCart'][$size]['ProductID']=$ProductID;
			$_SESSION['PurchaseCart'][$size]['ProductName']=$ProductName;
			$_SESSION['PurchaseCart'][$size]['PurchasePrice']=$PurchasePrice;
			$_SESSION['PurchaseCart'][$size]['PurchaseQuantity']=$PurchaseQuantity;
			$_SESSION['PurchaseCart'][$size]['FrontImage']=$FrontImage;
		}
		else
		{
			$_SESSION['PurchaseCart'][$index]['PurchaseQuantity']+=$PurchaseQuantity;
		}
		
	}
	else
	{
		$_SESSION['PurchaseCart']=array();

		$_SESSION['PurchaseCart'][0]['ProductID']=$ProductID;
		$_SESSION['PurchaseCart'][0]['ProductName']=$ProductName;
		$_SESSION['PurchaseCart'][0]['PurchasePrice']=$PurchasePrice;
		$_SESSION['PurchaseCart'][0]['PurchaseQuantity']=$PurchaseQuantity;
		$_SESSION['PurchaseCart'][0]['FrontImage']=$FrontImage;
	}
	echo "<script>window.location='Product_Purchase.php'</script>";
}

function Remove($ProductID)
{
	$index=IndexOf($ProductID);

	if($index != -1) 
	{
		unset($_SESSION['PurchaseCart'][$index]);
		$_SESSION['PurchaseCart']=array_values($_SESSION['PurchaseCart']);
	}
	echo "<script>window.location='Product_Purchase.php'</script>";
}

function Clear()
{
	unset($_SESSION['PurchaseCart']);
	echo "<script>window.location='Product_Purchase.php'</script>";
}

function CalculateTotalAmount()
{
	$total=0;

	if(!isset($_SESSION['PurchaseCart'])) 
	{
		return 0;
	}

	$size=count($_SESSION['PurchaseCart']);

	for ($i=0;$i<$size;$i++) 
	{ 
		$Quantity=$_SESSION['PurchaseCart'][$i]['PurchaseQuantity'];
		$Price=$_SESSION['PurchaseCart'][$i]['PurchasePrice'];
		$total=$total + ($Quantity * $Price);
	}
	return $total;
}

function CalculateTotalQuantity()
{
	$totalQty=0;

	if(!isset($_SESSION['PurchaseCart'])) 
	{
		return 0;
	}

	$size=count($_SESSION['PurchaseCart']);

	for ($i=0;$i<$size;$i++) 
	{ 
		$Quantity=$_SESSION['PurchaseCart'][$i]['PurchaseQuantity'];
		$totalQty=$totalQty + ($Quantity);
	}
	return $totalQty;
}

function CalculateTax()
{
	$Tax=0;
	$TotalAmount=CalculateTotalAmount();
	$Tax=$TotalAmount * 0.05;

	return $Tax;
}

function CalculateNetAmount()
{
	$NetAmount=0;

	$TotalAmount=CalculateTotalAmount();
	$Tax=CalculateTax();

	$NetAmount=$TotalAmount + $Tax;

	return $NetAmount;
}

/*function CalculatePromotion(???)
{
	???
}*/

function IndexOf($ProductID)
{
	if(!isset($_SESSION['PurchaseCart']))
	{
		return -1;
	}

	$size=count($_SESSION['PurchaseCart']);

	if($size<1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($ProductID == $_SESSION['PurchaseCart'][$i]['ProductID']) 
		{
			return $i;
		}
	}
	return -1;
}
?>