<?php
require_once("Connect.php") ;
if (isset($_POST['s1']))
{
	$pname=$_POST['t1'];
	$price=$_POST['t2'];
	$photo=$_FILES['f1']['name'];
	echo "Size".$_FILES['f1']['size'];
	print_r($_FILES['f1']);
	echo "$photo";
	$path="Upload/$photo";
	$res=mysqli_query($cn,"Insert into Product values (0,'$pname',$price,'$photo')");
	move_uploaded_file($_FILES['f1']['tmp_name'], $path);
	echo "Inserted $res";	
}	
?>




<form method="post" enctype="multipart/form-data">
	<table >
		<tr>
		<td>ProductName </td>
		<td>
			<input type="text" name="t1"   > </td>
		</tr>
	
		<tr>
	<td>	Price</td>
	<td>	 <input type="text" name="t2"   > </td>
	</tr>
	
	<tr>
	<td>Photo/Image </td>
	<td>	<input type="file" name="f1"    > </td>
	</tr>
	
	<tr>
		<td><input type="submit" name="s1" value="Add Product">  
					</td>
	</table>
	
</form>