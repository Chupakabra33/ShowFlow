<?php
//register.inc.php

if (isset($_POST['register'])) {

	require './database_connection.inc.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$password = $_POST['password'];
	$confirmPass = $_POST['confirmPass'];

	$username_regex = "/^(?!.*\.\.)(?!.*\.$)[^\W][\w.' -]{1,29}$/";
	$fullname_regex = "/^(?=.{2,20}$)[^0-9\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]*$|^$/";
	$password_regex = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){6,}$/";
					  
	if (empty($username) || 
		empty($email) ||  
		empty($password) || 
		empty($confirmPass)) {

		header("location: ../register.php?error=emptyfields&username=" . $username . "&email=" . $email . "&fullname=" . $fullname);
		exit();
	} else if (!preg_match($username_regex, $username) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match($fullname_regex, $fullname))) {
		header("location: ../register.php?error=invalidusernamemailfullname");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match($username_regex, $username))) {
		header("location: ../register.php?error=invalidmailandusername&fullname=" . $fullname);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match($fullname_regex, $fullname))) {
		header("location: ../register.php?error=invalidmailandfullname&username=" . $username);
		exit();
	} else if (!preg_match($username_regex, $username) && (!preg_match($fullname_regex, $fullname))) {
		header("location: ../register.php?error=invalidusernameandfullname&email=" . $email);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: ../register.php?error=invalidmail&username=" . $username . "&fullname=" . $fullname);
		exit();
	} else if (!preg_match($username_regex, $username)) {
		header("location: ../register.php?error=invalidusername&email=" . $email . "&fullname=" . $fullname);
		exit();
	} else if (!preg_match($fullname_regex, $fullname)) {
		header("location: ../register.php?error=invalidfullname&email=" . $email . "&username=" . $username);
		exit();
	} else if (!preg_match($password_regex, $password)) {
		header("location: ../register.php?error=invalidpassword&username=" . $username . "&email=" . $email . "&fullname=" . $fullname);
	} else if ($password !== $confirmPass) {
		header("location: ../register.php?error=passwordnotmatch&username=" . $username . "&email=" . $email . "&fullname=" . $fullname);
		exit();
	} else {
		$sql = "SELECT Username FROM users WHERE Username=?";
		$statement = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($statement, $sql)) {
			header("location: ../register.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($statement, "s", $username);
			mysqli_stmt_execute($statement);
			mysqli_stmt_store_result($statement);
			$resultCheck = mysqli_stmt_num_rows($statement);
			if ($resultCheck > 0) {
				header("location: ../register.php?error=usertaken&email=" . $email . "&fullname=" . $fullname);
				exit();
			} else {
				$sql = "INSERT INTO users (Username, Email, Fullname, Password) VALUES (?, ?, ?, ?)";
				$statement = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($statement, $sql)) {
					header("location: ../register.php?error=sqlerror");
					exit();
				} else {
					$hashedPass = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($statement, "ssss", $username, $email, $fullname, $hashedPass);
					mysqli_stmt_execute($statement);
					header("location: ../register.php?registration=successful");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($statement);
	mysqli_close($con);
} else {
	header("location: ../register.php");
	exit();
}