<?php
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
$res=mysqli_query($cn,"select * from Product ");

?>
<center>
<table border="1">
 <?php
 		$cnt=0;
		while($row=mysqli_fetch_assoc($res)) //mysqli_fetch_array($res)
		{
			if ($cnt%3==0)
			{
?>

			<tr>
			<?php
				}
			?>	
		<td><a href="ShowProducts.php?fname=<?php echo $row['Photo'];?>"><img src="Upload/<?php echo $row['Photo'];?>" height=150 width=150></a><br>
			<b>Name <?php echo $row['Pname'];?><br/>
		       Price<?php echo $row['Price'];?></b>
		</td>
	<?php
		$cnt++;
		if ($cnt%3==0)
		{
	?>
		</tr>
<?php
	}

	}
?>
</table>
</center>