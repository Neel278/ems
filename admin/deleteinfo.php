<?php

include('../dbcon.php');

$id=$_REQUEST['sid'];
$sql="DELETE FROM `employee` WHERE `id`='$id'";
$run=mysqli_query($connection,$sql);

if($run=true){
	?>
	<script type="text/javascript">
		alert('Data Deleted Successfully');
		window.open('delete.php','_self');
	</script>
	<?php
}
?>