
<?php 
	session_start();

	echo "Please wait dear ! logging out...";

	session_unset();
	session_destroy();

	header("location: login.php");
	exit();
 ?>


<!--
<?php
// session_start();
// session_unset();
// session_destroy();

// header('location: login.php');
// exit();
// ?>

