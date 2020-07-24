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
<table border="1" align="center">
	<form method="post" action="delete.php">
		<tr>
			<th>Enter Employee Name</th>
			<td><input type="text" name="name" placeholder="Enter Your Name"></td>

			<th>Enter Department no</th>
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
		
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</form>
</table>
</body>
</html>

<table align="center" style="width: 80%; margin-top: 20px;">
	<tr style=" background-color: #00203fff; color: #adefd1ff;">
		<th>No</th>
		<th>Name</th>
		<th>Employee no</th>
		<th>Image</th>
		<th>Delete</th>
	</tr>

<?php

if(isset($_POST['submit'])){
	include('../dbcon.php');

	$department=$_POST['department'];
	$name=$_POST['name'];

	$sql="SELECT * FROM `employee` WHERE `department`='$department' AND `name` LIKE '%$name%'";
	$run=mysqli_query($connection,$sql);

	if(mysqli_num_rows($run)<1){
		echo "<tr><td colspan='5'>No Records Found</td></tr>";
	}else{
		$count=0;
		while($data=mysqli_fetch_assoc($run)){
			$count++;
			?>
			<tr>
				<th><?php echo $count; ?></th>
				<th><img src="../image/<?php echo $data['image']; ?>" style="max-width: 100px;"></th>
				<th><?php echo $data['name']; ?></th>
				<th><?php echo $data['empno']; ?></th>
				<th><a href="deleteinfo.php?sid=<?php echo $data['id']; ?>">DELETE</a></th>
			</tr>
			<?php
		}
	}
}

?>
</table>