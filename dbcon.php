<?php

$host='localhost';
$username='Neel';
$password='neel';
$database='school';

$connection = mysqli_connect($host,$username,$password,$database);
if(isset($connection)){
	//echo "Successfully connected";
}else{
	echo mysqli_connect_error();
}

?>