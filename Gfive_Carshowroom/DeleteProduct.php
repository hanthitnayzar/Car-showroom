<?php
session_start();
include('connect.php');
include('header.php');

$ProductID=$_REQUEST['ProductID'];

$delete="DELETE FROM Product Where ProductID='$ProductID'";
$ret=mysql_query($delete);

if($ret)

{
	echo "<script>window.alert('Product Info: Deleted')</script>";
	echo "<script>window.location='EntryProduct.php'</script>";	
}
else
{
	echo "<p>Something went wrong" .mysql_error(). "</p>";
}
?>
<?php 
include('footer.php');
 ?>