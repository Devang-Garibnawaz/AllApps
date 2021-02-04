<?php
//ShowRelationProducts.php
if (isset($_REQUEST['fname']))
{
	$fname=$_REQUEST['fname'];
	//echo $fname;
	$path="Upload/$fname";
	$fp=fopen("$path", "r");
	$size=filesize($path);
	header("Content-Disposition:Attachment;filename=$fname");
	header("Content-type:octet-stream");
	header("Content-Length:$size");
	fpassthru($fp);

}
require_once("Connect.php") ;
$res=mysqli_query($cn,"select p.*,c.catname from MyProduct p,Category c  where c.catid=p.catid");

?>
<center>
<table border="1">
	<tr>
				
		<th>ProductID</th>
		<th>ProductName</th>	
		<th>Price</th>
		<th>Photo</th>
		<th>Category</th>
		</tr>
 <?php
 		while($row=mysqli_fetch_assoc($res)) //mysqli_fetch_array($res)
		{
		//print_r($row);
?>

			<tr>
			<td><?php echo $row['pid'];?></td>	
		<td><a href="ShowProducts.php?fname=<?php echo $row['photo'];?>"><img src="MyUpload/<?php echo $row['photo'];?>" height=150 width=150></a></td>
			<td><?php echo $row['pname'];?></td>
		     <td><?php echo $row['price'];?></td>
		     <td><?php echo $row['catname'];?></td>
		      <td><a href="RelationSampleEditProduct.php?pid=<?php echo $row['pid'];?>">Edit</a></td>
		</td>
		</tr>
<?php
	}
?>
</table>
</center>