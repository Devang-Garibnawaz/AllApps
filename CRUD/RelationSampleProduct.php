
<?php
//RelationSampleProduct.php
require_once("Connect.php") ;
if (isset($_POST['s1']))
{
	$pname=$_POST['t1'];
	$price=$_POST['t2'];
	$photo=$_FILES['f1']['name'];
	$cat=$_POST['cat'];
	echo "Size".$_FILES['f1']['size'];
	print_r($_FILES['f1']);
	echo "$photo";
	$path="MyUpload/$photo";
	$res=mysqli_query($cn,"Insert into MyProduct values (0,'$pname',$price,'$cat','$photo')");
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
	<td>Category </td>
	<td>
		<select name="cat">
			<option>----Select----</option>
			<?php
				
				$res=mysqli_query($cn,"select * from Category ");
				while($row=mysqli_fetch_assoc($res)) //mysqli_fetch_array($res)
				{
			?>
				<option value="<?php echo $row['catid']?>" ><?php echo $row['catname']?></option>
			<?php
				}
			?>

		</select>

	 </td>
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