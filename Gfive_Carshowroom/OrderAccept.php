<?php  
session_start();  
include('connect.php');
include('header.php');

$OrderID=$_REQUEST['OrderID'];

$update="UPDATE saleorder SET Status='Approved' 
		 WHERE SaleOrderID='$OrderID'";
$ret=mysql_query($update);

if($ret)
{
	echo "<script>window.alert('Order Approved.')</script>";
	echo "<script>window.location='Order_Search.php'</script>";
}
else
{
	echo "<p>Something went wrong in Order Aprroved :" . mysql_error() . "</p>";
}

?>
<?php 
include('footer.php');
 ?>