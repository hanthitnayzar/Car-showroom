<?php
session_start();
include('connect.php');
include('header.php');

$BrandID=$_REQUEST['BrandID'];

$delete="DELETE FROM brand Where BrandID='$BrandID'";
$ret=mysql_query($delete);

if($ret)

{
	echo "<script>window.alert('Brand Info: Deleted')</script>";
	echo "<script>window.location='Entry_Brand.php'</script>";	
}
else
{
	echo "<p>Something went wrong" .mysql_error(). "</p>";
}
?>
<?php 
include('footer.php');
 ?>