<?php

include('../dbcon.php');
if(isset($_POST['submit'])){

	$empno=$_POST['empno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$cont=$_POST['cont'];
	$id=isset($_POST['sid']) ? $_POST['sid']: '';
	$department=$_POST['department'];
	$imagename=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];

	move_uploaded_file($tempname, "../image/$imagename");
	

	$sql="UPDATE `employee` SET `empno`='$empno',`name`='$name',`city`='$city',`cont`='$cont',`department`='$department',`image`='$imagename' WHERE `id`='$id'";
	$run=mysqli_query($connection,$sql);

	if($run == true){
		?>
		<script type="text/javascript">
			alert('File Updated Successfully.');
			window.open('update.php','_self');
		</script>
		<?php
	}


}

?>