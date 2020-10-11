<?php
session_start();
include('connect.php');
include('header.php');
?>

<html>
<head>
<title>Home</title>
</head>
<body>
<form >
<p>Welcome : 
	<?php
	if (isset($_SESSION['CustomerID'])) 
	{
		echo  $_SESSION['CustomerName'];
	}
	else
	{
		echo "Guest";
	}
 ?> | <a href="Logout.php">Logout</a></p>

<a href="ProductDisplay.php">Product List </a>

<fieldset>
<legend>Product List :</legend>
<table cellpadding="10px" align="center">
<?php  
$query="SELECT * FROM product ORDER BY ProductID DESC";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);

if($count < 1) 
{
	echo "<p>No Product Found.</p>";
	exit();
}

for($a=0;$a<$count;$a+=4) 
{ 
	$query1="SELECT * FROM product 
			 ORDER BY ProductID DESC
			 LIMIT $a,4";
	$ret1=mysql_query($query1);
	$count1=mysql_num_rows($ret1);

	echo "<tr>";
	for($b=0;$b<$count1;$b++) 
	{ 
		$arr=mysql_fetch_array($ret);

		$ProductID=$arr['ProductID'];
		$ProductName=$arr['ProductName'];
		$Price=$arr['Price'];

		$FrontImage=$arr['Img1'];
		list($width,$height)=getimagesize($FrontImage);
		$w=$width/4.5; 
		$h=$height/4.5; 
		?>
		<td>
			<img src="<?php echo $FrontImage ?>" width="<?php echo $w ?>" height="<?php echo $h ?>"/><br/>
			<b><?php echo $ProductName ?></b><br/>
			<b><?php echo $Price ?></b> USD <br/>
			<a href="ProductDetail.php?ProductID=<?php echo $ProductID?>">More</a>
		</td>
		<?php
	}
	echo "<tr>";
}
?>
</table>
</fieldset>

</form>
<?php 
include('footer.php');
 ?>