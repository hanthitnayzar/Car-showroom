<html>
<head>
<title>Payment Info</title>
</head>
<body>
<form action="Payment.php" method="post">
<fieldset>
<legend>Enter Payment Info:</legend>
<table align="center" cellpading="4px">
<tr>
<td>PaymentDate</td>
<td>
<input type="text" name="txtpaymentdate" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>Account Type</td>
<td>
<input type="text" name="txtaccounttype" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>Account No</td>
<td>
<input type="text" name="txtaccountno" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>First Installment</td>
<td>
<input type="text" name="txtfirstinstallment" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>Second Installment</td>
<td>
<input type="text" name="txtsecinstallment" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>First Installment Date</td>
<td>
<input type="text" name="txtfirstinstalldate" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>Second Installment Date</td>
<td>
<input type="text" name="txtsecinstalldate" placeholder="-----" required/>
</td>
</tr>

<tr>
<td>Paid Amount</td>
<td>
<input type="text" name="txtpaidamount" placeholder="-----" required/>
</td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="btnsave" value="Save"/>
<input type="reset" value="cancel"/>
</td>
</tr>
</table>

</fieldset>
</form>
</body>
</html>