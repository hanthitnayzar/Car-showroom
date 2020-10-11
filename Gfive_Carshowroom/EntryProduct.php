<?php
session_start();
include('connect.php');
include('header.php');
if(isset($_POST['btnSave']))
{
	$txtproductname=$_POST['txtproductname'];
	$txtbrandname=$_POST['txtbrandname'];
	$txtmaker=$_POST['txtmaker'];
	$txtfuel=$_POST['txtfuel'];
	$txtprice=$_POST['txtprice'];
	$txtquantity=$_POST['txtquantity'];
	$txtkilometrage=$_POST['txtkilometrage'];
	$txtmodelyear=$_POST['txtmodelyear'];
	$txtcolor=$_POST['txtcolor'];
	$txtdirection=$_POST['txtdirection'];
	$txtenginepower=$_POST['txtenginepower'];
	$txttransmission=$_POST['txttransmission'];
	$txtdescription=$_POST['txtdescription'];
	$status=$_POST['rdoStatus'];
//Image Upload Code Start--------------------
	$FrontImage1=$_FILES['txtimg1']['name'];
	$Folder="ProductImage/";

	$filename1=$Folder . '_' . $FrontImage1;

	$copied1=copy($_FILES['txtimg1']['tmp_name'],$filename1);
	if(!$copied1) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage2=$_FILES['txtimg2']['name'];
	$Folder="ProductImage/";

	$filename2=$Folder . '_' . $FrontImage2;

	$copied2=copy($_FILES['txtimg2']['tmp_name'],$filename2);
	if(!$copied2) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage3=$_FILES['txtimg3']['name'];
	$Folder="ProductImage/";

	$filename3=$Folder . '_' . $FrontImage3;

	$copied3=copy($_FILES['txtimg3']['tmp_name'],$filename3);
	if(!$copied3) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage4=$_FILES['txtimg4']['name'];
	$Folder="ProductImage/";

	$filename4=$Folder . '_' . $FrontImage4;

	$copied4=copy($_FILES['txtimg4']['tmp_name'],$filename4);
	if(!$copied4) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage5=$_FILES['txtimg5']['name'];
	$Folder="ProductImage/";

	$filename5=$Folder . '_' . $FrontImage5;

	$copied5=copy($_FILES['txtimg5']['tmp_name'],$filename5);
	if(!$copied5) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage6=$_FILES['txtimg6']['name'];
	$Folder="ProductImage/";

	$filename6=$Folder . '_' . $FrontImage6;

	$copied6=copy($_FILES['txtimg6']['tmp_name'],$filename6);
	if(!$copied6) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------
	//Image Upload Code Start--------------------
	$FrontImage7=$_FILES['txtimg7']['name'];
	$Folder="ProductImage/";

	$filename7=$Folder . '_' . $FrontImage7;

	$copied7=copy($_FILES['txtimg7']['tmp_name'],$filename7);
	if(!$copied7) 
	{
		echo "<p>Cannot Upload FrontImage.</p>";
		exit();
	}
	//Image Upload Code Start--------------------

	$insert="INSERT INTO Product
			 (ProductName,BrandID,Maker,Fuel,Price,Quantity,Img1,Img2,Img3,Img4,Img5,Img6,Img7,Kilometrage,ModelYear,color,Direction,EnginePower,Transmission,Description,Status) 
			 VALUES 
			 ('$txtproductname','$txtbrandname','$txtmaker','$txtfuel','$txtprice','$txtquantity','$filename1','$filename2','$filename3','$filename4','$filename5','$filename6','$filename7','$txtkilometrage','$txtmodelyear','$txtcolor','$txtdirection','$txtenginepower','$txttransmission','$txtdescription','$status')";
	$ret=mysql_query($insert);

	if($ret)
	{
		echo "<script>window.alert('Product Registration Complete.')</script>";
		echo "<script>window.location='EntryProduct.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Product Entry :" . mysql_error() . "</p>";
	}
	
}
?>
<html>
<head>
	<title>Brand Entry</title>
</head>
<body>
<form action="EntryProduct.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Enter Brand Info:</legend>

<table align="center" cellpadding="4px">

	<tr>
	<td>Product Name</td>
	<td>
		<input type="text" name="txtproductname" placeholder="Enter Product Name" required/>
	</td>
</tr>

	<tr>
	<td>Brand Name</td>
	<td>
		<select name="txtbrandname" required>
          <option>--Choose Brand--</option>
          <?php 
            $query="SELECT * FROM brand";
            $ret=mysql_query($query);
            $count=mysql_num_rows($ret);
            for($i=0; $i<$count; $i++)
            {
              $row=mysql_fetch_array($ret);
              echo $row["BrandID"];
              echo '<option value="'.$row["BrandID"].'">';
              echo $row["BrandName"];
              echo '</option>';
            }
           ?>
        </select>
		
	</td>
</tr>
<tr>
	<td>Maker</td>
	<td>
		<input type="text" name="txtmaker" placeholder="Enter maker" required/>
	</td>
</tr>

<tr>
	<td>Fuel</td>
	<td>
		<input type="text" name="txtfuel" placeholder="Enter Fuel" required/>
	</td>
</tr>

<tr>
	<td>Price</td>
	<td>
		<input type="text" name="txtprice" placeholder="Enter price" required/>
	</td>
</tr>

<tr>
	<td>Quantity</td>
	<td>
		<input type="text" name="txtquantity" placeholder="Enter Quantity" required/>
	</td>
</tr>

<tr>
	<td>Image 1</td>
	<td>
		<input type="file" name="txtimg1" required/>
	</td>
</tr>

<tr>
	<td>Image 2</td>
	<td>
		<input type="file" name="txtimg2" required/>
	</td>
</tr>

<tr>
	<td>Image 3</td>
	<td>
		<input type="file" name="txtimg3" required/>
	</td>
</tr>

<tr>
	<td>Image 4</td>
	<td>
		<input type="file" name="txtimg4" required/>
	</td>
</tr>

<tr>
	<td>Image 5</td>
	<td>
		<input type="file" name="txtimg5" required/>
	</td>
</tr>

<tr>
	<td>Image 6</td>
	<td>
		<input type="file" name="txtimg6" required/>
	</td>
</tr>


<tr>
	<td>Image 7</td>
	<td>
		<input type="file" name="txtimg7" required/>
	</td>
</tr>

<tr>
	<td>Kilometrage</td>
	<td>
		<input type="text" name="txtkilometrage" placeholder="Enter Kilometrage" required/>
	</td>
</tr>


<tr>
	<td>Model Year</td>
	<td>
		<input type="text" name="txtmodelyear" placeholder="Enter model" required/>
	</td>
</tr>

<tr>
	<td>Color</td>
	<td>
		<input type="text" name="txtcolor" placeholder="Enter color" required/>
	</td>
</tr>

<tr>
	<td>Direction</td>
	<td>
		<input type="text" name="txtdirection" placeholder="Enter Direction" required/>
	</td>
</tr>
<tr>
	<td>Engine Power</td>
	<td>
		<input type="text" name="txtenginepower" placeholder="Enter Engine power" required/>
	</td>
</tr>


<tr>
	<td>Transmission</td>
	<td>
		<input type="text" name="txttransmission" placeholder="Enter transmission" required/>
	</td>
</tr>

<tr>
	<td>Description</td>
	<td>
		<input type="text" name="txtdescription" placeholder="Enter description" required/>
	</td>
</tr>

<tr>
	<td>Status</td>
	<td>
		<input type="radio" name="rdoStatus" value="Active" checked/>Active
		<input type="radio" name="rdoStatus" value="InActive"/>InActive
	</td>
</tr>
<tr>
	<td></td>
	<td>
	<input type="submit" name="btnSave" value="Save"/>
	<input type="reset" value="Clear"/>
	</td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Product Listing :</legend>
<?php  
$query="SELECT * FROM product ORDER BY ProductID DESC";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);

if($count==0) 
{
	echo " <p>No Product Record Found.</p>";
	exit();
}
?>
<table align="center" cellpadding="3px" border="1">
	<tr>
		<th>ProductName</th>
		<th>BrandID</th>
		<th>Maker</th>
		<th>Fuel</th>
		<th>Price</th>
        <th>Quantity</th>
		<th>Kilometrage</th>
		<th>Model Year</th>
		<th>Color</th>
		<th>Direction</th>
		<th>Engine Power</th>
		<th>Transmission</th>
		<th>Description</th>
        <th>Status</th>
		<th>Action</th>
	</tr>
<?php
	for ($i=0;$i<$count;$i++) 
	{ 
		$arr=mysql_fetch_array($ret);
		$ProductID=$arr['ProductID'];

		echo "<tr>";
			
			echo "<td>" . $arr['ProductName'] . "</td>";
			echo "<td>" . $arr['BrandID'] . "</td>";
			echo "<td>" . $arr['Maker'] . "</td>";
			echo "<td>" . $arr['Fuel'] . "</td>";
			echo "<td>" . $arr['Price'] . "</td>";
			echo "<td>" . $arr['Quantity'] . "</td>";
			echo "<td>" . $arr['kilometrage'] . "</td>";
			echo "<td>" . $arr['ModelYear'] . "</td>";
			echo "<td>" . $arr['Color'] . "</td>";
			echo "<td>" . $arr['Direction'] . "</td>";
			echo "<td>" . $arr['EnginePower'] . "</td>";
			echo "<td>" . $arr['Transmission'] . "</td>";
			echo "<td>" . $arr['Description'] . "</td>";
			echo "<td>" . $arr['Status'] . "</td>";
			echo "<td> 
					<a href='DeleteProduct.php?ProductID=$ProductID'>Delete</a> |
					<a href='UpdateProduct.php?ProductID=$ProductID'>Edit</a>
				 </td>";
		echo "</tr>";	
	}
?>
</table>
</fieldset>
 


</form>
<?php 
include('footer.php');
 ?>