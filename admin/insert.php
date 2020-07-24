<?php

session_start();

if(isset($_SESSION['uid'])){
	echo "";
}else{
	header('location:../login.php');
}


include('header.php');
include('titlehead.php');
?>
<form method="post" action="insert.php" enctype='multipart/form-data'>
	<b><table border="1" align="center" style="width:60%; margin-top: 70px;">
		<tr>
			<td align="center">Employee no</td>
			<td><input type="text" name="empno" placeholder="Enter Your Employee no" required></td>
		</tr>
		<tr>
			<td align="center">Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Name" required></td>
		</tr>
		<tr>
			<td align="center">City</td>
			<td><input type="text" name="city" placeholder="Enter Your City Name" required></td>
		</tr>
		<tr>
			<td align="center">Contact no</td>
			<td><input type="numeric" name="cont" placeholder="Enter Your Contact no"  required></td>
		</tr>
		<tr>
			<td align="center">Department</td>
			<td>
				<select name="department" required>
					<option value="1">Computer Department</option>
					<option value="2">Electrical Department</option>
					<option value="3">Electronic Department</option>
					<option value="4">Mechanical Department</option>
					<option value="5">IT Department</option>
					<option value="6">Instr. & Control Department</option>
					<option value="7">Civil Department</option>
					<option value="8">Environment Department</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">Image</td>
			<td><input type="file" name="image" placeholder="Upload Your image" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
		</tr>
	</table></b>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	include('../dbcon.php');

	$empno=$_POST['empno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$cont=$_POST['cont'];
	$department=$_POST['department'];
	$imagename=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];

	move_uploaded_file($tempname, "../image/$imagename");
	if (preg_match('/^[1-9]{1}[0-9]{9}+$/', $cont)) {  		//mobile number checker.

	$qry="INSERT INTO `employee`(`id`, `empno`, `name`, `city`, `cont`, `department`, `image`) VALUES (NULL,'$empno','$name','$city','$cont','$department','$imagename')";

	$run=mysqli_query($connection,$qry);

	if($run == true){
		
			{
		}
		?>

		<script type="text/javascript">
			alert('File Inserted Successfully');
			open.window(insert.php,_self);
		</script>

		<?php
	}
}
else{

	?>

		<script type="text/javascript">
			alert('Wrong mobile number');
			open.window(insert.php,_self);
		</script>

		<?php
}
}
?>