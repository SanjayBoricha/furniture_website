<?php 

if (isset($_POST['signup-submit'])) {
	 
	require '../config/db.php';

	$username = $_POST['uname'];
	$email = $_POST['email'];
	$type = $_POST['type'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-r'];

	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail".$email);
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
			header("Location: ../signup.php?error=invalidmailuid");
			exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."$mail".$email);
		exit();
	}
	else {
		$sql = "SELECT uname FROM users WHERE uname='$username'";
		$result = mysqli_query($conn, $sql);
			
		$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usertaken$mail".$email);
				exit();
			}
			else {
				$sql = "INSERT INTO users (uname,email,utype,pwd) VALUES ('$username','$email','$type','$password')";
				mysqli_query($conn,$sql);
				header("Location: ../signup.php?signup=success");
				exit();
			}
		}
	mysqli_close($conn);
}
else {
	header("Location: ../signup.php");
	exit();
}