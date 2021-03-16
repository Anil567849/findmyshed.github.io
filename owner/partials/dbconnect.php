<?php
	$servername = "localhost";
	$username= "root";
	$password= "";
	$database = "room";
	$conn = mysqli_connect($servername, $username, $password, $database);
	if(!$conn){
		die('your connection was faild' . mysqli_connect_error());
	}
?>