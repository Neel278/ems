<?php

session_start();

if(isset($_SESSION['uid'])){
	echo "";
}else{
	header('location:../login.php');
}

include('header.php');
include('titlehead.php');
include('../dbcon.php');


$sid = isset($_GET['sid']) ? $_GET['sid']: 'ssssssx';
$sql  = "SELECT * FROM `employee` WHERE `id`='$sid'";
$run  = mysqli_query($connection,$sql);

$data = mysqli_fetch_assoc($run);
?>
<form method="post" action="updatedata.php" enctype="multipart/form-data">
	<table border="1" style="width: 70%; margin-top: 60px;" align="center">
		<tr>
			<th align="center">Employee No</th>
			<td><input type="text" name="empno" value=<?php echo $data['empno']; ?> required></td>
		</tr>
		<tr>
			<th align="center">Name</th>
			<td><input type="text" name="name" value=<?php echo $data['name']; ?> required></td>
		</tr>
		<tr>
			<th align="center">City</th>
			<td><input type="text" name="city" value=<?php echo $data['city']; ?> required></td>
		</tr>
		<tr>
			<th align="center">Contact No</th>
			<td><input type="text" name="cont" value=<?php echo $data['cont']; ?> required></td>
		</tr>
		<tr>
			<th align="center">Department</th>
			<td><input type="text" name="department" value=<?php echo $data['department']; ?> required></td>
		</tr>
		<tr>
			<th align="center">Image</th>
			<td><input type="file" name="image" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="hidden" name="sid" value=<?php echo $data['id']; ?> required>

				<input type="submit" name="submit" value="Update">
			</td>
		</tr>
	</table>
</form>
</body>
</html>