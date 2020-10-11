<?php  
function Add_ShoppingCart($ProductID,$BuyQuantity)
{
	$query="SELECT * FROM product WHERE ProductID='$ProductID'";
	$ret=mysql_query($query);
	$count=mysql_num_rows($ret);

	if($count<1) 
	{
		echo "<p>No Record Found.</p>";
		exit();
	}

	$arr=mysql_fetch_array($ret);
	$ProductName=$arr['ProductName'];
	$ProductPrice=$arr['Price'];
	$FrontImage=$arr['Img1'];

	if(isset($_SESSION['ShoppingCart'])) 
	{
		$index=IndexOf($ProductID);

		if($index== -1) 
		{
			$size=count($_SESSION['ShoppingCart']);

			$_SESSION['ShoppingCart'][$size]['ProductID']=$ProductID;
			$_SESSION['ShoppingCart'][$size]['ProductName']=$ProductName;
			$_SESSION['ShoppingCart'][$size]['Price']=$ProductPrice;
			$_SESSION['ShoppingCart'][$size]['BuyQuantity']=$BuyQuantity;
			$_SESSION['ShoppingCart'][$size]['FrontImage']=$FrontImage;
		}
		else
		{
			$_SESSION['ShoppingCart'][$index]['BuyQuantity']+=$BuyQuantity;
		}
		
	}
	else
	{
		$_SESSION['ShoppingCart']=array();

		$_SESSION['ShoppingCart'][0]['ProductID']=$ProductID;
		$_SESSION['ShoppingCart'][0]['ProductName']=$ProductName;
		$_SESSION['ShoppingCart'][0]['Price']=$ProductPrice;
		$_SESSION['ShoppingCart'][0]['BuyQuantity']=$BuyQuantity;
		$_SESSION['ShoppingCart'][0]['FrontImage']=$FrontImage;
	}
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function Remove_ShoppingCart($ProductID)
{
	$index=IndexOf($ProductID);

	if($index != -1) 
	{
		unset($_SESSION['ShoppingCart'][$index]);
		$_SESSION['ShoppingCart']=array_values($_SESSION['ShoppingCart']);
	}
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function Clear_ShoppingCart()
{
	unset($_SESSION['ShoppingCart']);
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function CalculateTotalAmount()
{
	$total=0;

	if(!isset($_SESSION['ShoppingCart'])) 
	{
		return 0;
	}

	$size=count($_SESSION['ShoppingCart']);

	for ($i=0;$i<$size;$i++) 
	{ 
		$Quantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$Price=$_SESSION['ShoppingCart'][$i]['Price'];
		$total=$total + ($Quantity * $Price);
	}
	return $total;
}

function CalculateTotalQuantity()
{
	$totalQty=0;

	if(!isset($_SESSION['ShoppingCart'])) 
	{
		return 0;
	}

	$size=count($_SESSION['ShoppingCart']);

	for ($i=0;$i<$size;$i++) 
	{ 
	$size=count($_SESSION['ShoppingCart']);
		$Quantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
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
	if(!isset($_SESSION['ShoppingCart']))
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCart']);

	if($size<1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($ProductID == $_SESSION['ShoppingCart'][$i]['ProductID']) 
		{
			return $i;
		}
	}
	return -1;
}
?>