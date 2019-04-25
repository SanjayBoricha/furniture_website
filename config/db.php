<?php
	$conn = mysqli_connect("localhost","root","","furniture");

	if(mysqli_connect_errno()){
		die("database connection failed");
	}
?>