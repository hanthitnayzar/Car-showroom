<?php
session_start();

?>

<html>
<head>
<title>Welcome : <?php 
echo  $_SESSION['AdminName'] ?> | Home 
</title>
</head>
<body>
<form >
<p>Welcome : <?php
echo  $_SESSION['AdminName'] ?> | <a href="Logout.php">Logout</a></p>

<br>
<a href="Entry_Brand.php">Entry Brand </a>
<br>
<a href="EntryProduct.php">Entry Product</a>
<br>
<a href="Order_Search.php">Order List </a>
<br>
<a href="Product_Purchase.php">Product Purchase</a>
<br>
<a href="Supplier.php">Supplier Register </a>


</form>
</body>
</head>
</html>