<?php
//require("Connect.php");
$rno="";
$user="";
$course="";
$fees="";
require_once("Connect.php") ;
//include("Connect.php");
//include_once("Connect.php");
if (isset($_REQUEST['rno']))
{
$rollno=$_REQUEST['rno'];
$res=mysqli_query($cn,"select * from student where rno=$rollno");
$row=mysqli_fetch_array($res);
$rno=$row['Rno'];
$user=$row['SName'];;
$course=$row['Course'];;
$fees=$row['Fees'];;
}
if (isset($_POST['s1']))
{
	$user=$_POST['t1'];
	$course=$_POST['t2'];
	$fees=$_POST['t3'];
	$rno=$_POST['h1'];
	if ($rno>0)
	{
			$res=mysqli_query($cn,"update student set Sname='$user',course='$course',
				fees=$fees where rno=$rno");
			echo "Update $res";	
		
	}
	else
		{
			$res=mysqli_query($cn,"Insert into student values (0,'$user','$course',$fees)");
			echo "Inserted $res";	
		}
		header("Location:Studshow.php");
}
?>


<form method="post">
	<table >
		<tr>
		<td>Name </td>
		<td>
			<input type="hidden" name="h1" value="<?php echo $rno;?>" > 
			<input type="text" name="t1" value="<?php echo $user;?>" > </td>
		</tr>
	
		<tr>
	<td>	Course</td>
	<td>	 <input type="text" name="t2"  value="<?php echo $course;?>" > </td>
	</tr>
	
	<tr>
	<td>	Fees </td>
	<td>	<input type="text" name="t3"  value="<?php echo $fees;?>" > </td>
	</tr>
	
	<tr>
		<td><input type="submit" name="s1" value="Add Student">  
					</td>
	</table>
	
</form>