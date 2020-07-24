<?php

function showdetails($department,$empno){
	include('dbcon.php');

	$sql="SELECT * FROM `employee` WHERE `department`='$department' AND `empno`='$empno'";
	$run=mysqli_query($connection,$sql);

	if(mysqli_num_rows($run)>0){
		$data=mysqli_fetch_assoc($run);
		?>
		<table align="center" border="1" style="width: 50%;">
			<tr>
				<th colspan="3">Employee Details</th>
			</tr>
			<tr>
				<td rowspan="5"; align="center"><img src="image/<?php echo $data['image']; ?>" style="max-width: 120px; max-height: 150px;"></td>
				<th>Employee no</th>
				<td><?php echo $data['empno']; ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data['name']; ?></td>
			</tr>
			<tr>
				<th>Department No</th>
				<td><?php echo $data['department']; ?></td>
			</tr>
			<tr>
				<th>Contact No</th>
				<td><?php echo $data['cont']; ?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $data['city']; ?></td>
			</tr>
		</table>
		<?php
	}else{
		echo "<script>
		alert('No Records Found');
		</script>";
	}
}

?>