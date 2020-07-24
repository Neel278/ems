<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
</head>
<body>
	<h3 align="left"><a href="index.php"><< Back Home</a></h3>
	<h2 align="center">Admin Login</h2>
	<form method="post" action="login.php">
	<table align="center">
		<tr>
			<td><b>Username</b></td>
			<td><input type="text" name="username" placeholder="Enter Your Username" required></td>
		</tr>
		<tr>
			<td><b>Password</b></td>
			<td><input type="password" name="password" placeholder="Enter Your Password" required></td>
		</tr>
		<tr>
			<td><td><input type="submit" name="login" value="Login"></td></td>
		</tr>
	</table>
	</form>
</body>
</html>
<?php

include('dbcon.php');

if (isset($_POST['login'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];

	$qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
	$run=mysqli_query($connection,$qry);
	$row=mysqli_num_rows($run);

	if($row < 1){
		?>

		<script type="text/javascript">
			alert('Username or Password does not match!!!');
			window.open('login.php','_self');
		</script>

		<?php
	}else{
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];

		session_start();

		$_SESSION['uid']=$id;
		header('location: admin/dash.php');
	}
}

?>