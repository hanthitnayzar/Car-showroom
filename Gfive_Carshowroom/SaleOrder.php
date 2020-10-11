<html>
<head>
	
<title>Sale Order Info</title>
</head>
<body>
<form action="SaleOrder.php">
<fieldset>
<legend>Enter SaleOrder Info </legend>
<table align="center" cellpading="4px"></table>
<tr>
<td>SaleOrderDate</td>
<td>
<input type="text" name="txtsaleorderdate" placeholder="--" required/>
</td>
</tr>

<tr>
<td>CustomerID</td>
<td>
<input type="text" name="txtCustomerID" placeholder="--" required/>
</td>
</tr>

<tr>
<td>ProductID</td>
<td>
<input type="text" name="txtProductID" placeholder="--" required/>
</td>
</tr>

<tr>
<td>Total Amount</td>
<td>
<input type="text" name="txttotalamount" placeholder="--" required/>
</td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="btnsave" value="save"/>
</td>
<td>
<input type="reset" value="cancel"/>
</td>
</tr>

</fieldset>
</form>
<?php 
include('footer.php');
 ?>
