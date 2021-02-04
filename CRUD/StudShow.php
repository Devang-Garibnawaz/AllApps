<?php
require_once("Connect.php") ;
if (isset($_REQUEST['rno']))
{
	$rollno=$_REQUEST['rno'];
	mysqli_query($cn,"delete  from student where rno=$rollno");	
	echo "delete  from student where rno=$rollno";
}

$res=mysqli_query($cn,"select * from student ");

?>
<a href="StudInsert.php">New Student</a>
<table border="1">
		<th>RollNO</th>
		<th>NAME</th>
		<th>COURSE</th>
		<th>FEES</th>
		<th>OPERATIONS</th>
<?php
		while($row=mysqli_fetch_object($res)) //mysqli_fetch_array($res)
		{
			//print_r($row);	
?>
		<tr>
		<td><?php echo $row->Rno;?></td>
		<td><?php echo $row->SName;?></td>
		<td><?php echo $row->Course;?></td>
		<td><?php echo $row->Fees;?></td>
		<td><a href="StudShow.php?rno=<?php echo $row->Rno;?>">Delete</a></td>
		<td><a href="StudInsert.php?rno=<?php echo $row->Rno;?>">Edit</a></td>
	</tr>
<?php
	}
?>
</table>

<!-- <table border="1">
		<th>RollNO</th>
		<th>NAME</th>
		<th>COURSE</th>
		<th>FEES</th>
		<th>OPERATIONS</th>
 -->
 <?php
		// while($row=mysqli_fetch_assoc($res)) //mysqli_fetch_array($res)
		// {
			//print_r($row);	
?>
<!-- 		<tr>
		<td><?php echo $row['Rno'];?></td>
		<td><?php echo $row['SName'];?></td>
		<td><?php echo $row['Course'];?></td>
		<td><?php echo $row['Fees'];?></td>
		<td><a href="StudShow.php?rno=<?php echo $row['Rno'];?>">Delete</a></td>
	</tr> -->
<?php
	// }
?>
</table>
<!-- <table border="1">
		<th>RollNO</th>
		<th>NAME</th>
		<th>COURSE</th>
		<th>FEES</th>
		<th>OPERATIONS</th> -->
<?php
		// while($row=mysqli_fetch_row($res))
		// {
?>
<!-- 		<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
		<td><a href="StudShow.php?rno=<?php echo $row[0];?>">Delete</a></td>
	</tr> -->
<?php
	// }
?>
</table>