<?php  
session_start();
include('connect.php');
include('header.php');

$ProductID=$_REQUEST['ProductID'];

 $query="SELECT p.*, b.BrandID,b.BrandName 
		FROM product p, brand b
		WHERE p.ProductID='$ProductID'
		AND p.BrandID=b.BrandID";

$ret=mysql_query($query);
$arr=mysql_fetch_array($ret);

$ProductName=$arr['ProductName'];
$Price=$arr['Price'];
$Quantity=$arr['Quantity'];
$Description=$arr['Description'];
$BrandName=$arr['BrandName'];

$FrontImage=$arr['Img1'];
list($width,$height)=getimagesize($FrontImage);
$w=$width/2; 
$h=$height/2; 

$BackImage=$arr['Img2'];
list($width,$height)=getimagesize($BackImage);
$w1=$width/10; 
$h1=$height/10; 

$SideImage=$arr['Img3'];
list($width,$height)=getimagesize($SideImage);
$w1=$width/10; 
$h1=$height/10; 

$SideImage1=$arr['Img4'];
list($width,$height)=getimagesize($SideImage);
$w1=$width/10; 
$h1=$height/10; 

$SideImage2=$arr['Img5'];
list($width,$height)=getimagesize($SideImage);
$w1=$width/10; 
$h1=$height/10; 

$SideImage3=$arr['Img6'];
list($width,$height)=getimagesize($SideImage);
$w1=$width/10; 
$h1=$height/10; 

$SideImage4=$arr['Img7'];
list($width,$height)=getimagesize($SideImage);
$w1=$width/10; 
$h1=$height/10; 

?>
<html>
<head>
<title>Product Detail</title>

<script type="text/javascript">
function ChangePhoto(picsrc) 
{
	document.images.imgPhoto.src=picsrc;
}
</script>

</head>
<body>
<form action="ShoppingCart.php" method="get" enctype="multipart/form-data">
<input type="hidden" name="ProductID" value="<?php echo $ProductID ?>"/>
<input type="hidden" name="action" value="buy"/>
<fieldset>
<legend>Product Detail for : <?php echo $ProductName ?></legend>

<table align="center">
<tr>
	<td>
		<img id="imgPhoto" src="<?php echo $FrontImage ?>" width="<?php echo $w ?>" height="<?php echo $h ?>"/>
		<br/>
		<img src="<?php echo $FrontImage ?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $FrontImage ?>')"/>
		<img src="<?php echo $BackImage ?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $BackImage ?>')"/>
		&nbsp;
		<img src="<?php echo $SideImage ?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $SideImage ?>')"/>
		<img src="<?php echo $SideImage1 ?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $SideImage1 ?>')"/>
		<img src="<?php echo $SideImage2 ?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $SideImage2 ?>')"/>
		<img src="<?php echo $SideImage3?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $SideImage3 ?>')"/>
		<img src="<?php echo $SideImage4?>" width="<?php echo $w1 ?>" height="<?php echo $h1 ?>" onClick="ChangePhoto('<?php echo $SideImage4 ?>')"/>
	<!--============================================-->
	<td>
		<table>
		<tr>
			<td>Product Name</td>
			<td>
			: <b><?php echo $ProductName; ?></b>	
			</td>
		</tr>
		<tr>
			<td>Brand Name</td>
			<td>
			: <b><?php echo $BrandName ?></b>	
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
			: <b style="color:blue;"><?php echo $Price ?></b> USD	
			</td>
		</tr>
		<tr>
			<td>Quantity</td>
			<td>
			: <?php 
			  if($Quantity==0) 
			  {
			  	echo "<b><del>Out of Stock.</del></b>";
			  	exit();
			  }
			  else
			  {
			  	echo "<b>$Quantity</b> Pcs";
			  }
			  ?>	
			</td>
		</tr>
		<tr>
			<td>Enter Buying Qty</td>
			<td>
			:	<input type="number" name="txtbuyQty" value="1"/>
				<input type="submit" name="btnAddtoCart" value="Add to Cart"/>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2">
	<hr/>
	<b>Description</b>
	<hr/>
	<?php echo $Description ?>
	</td>
</tr>
</table>

</fieldset>
</form>
<?php 
include('footer.php');
 ?>