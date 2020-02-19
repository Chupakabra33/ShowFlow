<?php
//login.inc.php

if (isset($_POST['login-submit'])) {

	require './database_connection.inc.php';

	$username_email = $_POST['username-email'];
	$password = $_POST['password'];

	if (empty($username_email) || empty($password)) {
		header("location: ../home.php?error=emptyfieldslogin&usernameemail=" . $username_email);
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE Username=? OR Email=?;";
		$statement = mysqli_stmt_init($con);

		if (!mysqli_stmt_prepare($statement, $sql)) {
			header("location: ../home.php?error=sqlerrorlogin");
			exit();
		} else {
			mysqli_stmt_bind_param($statement, "ss", $username_email, $username_email);
			mysqli_stmt_execute($statement);
			$result = mysqli_stmt_get_result($statement);

			if ($row = mysqli_fetch_assoc($result)) {
				$checkPassword = password_verify($password, $row['Password']);
				if ($checkPassword == false) {
					header("location: ../home.php?error=wrongpass");
					exit();
				} else if ($checkPassword == true) {
					session_start();
					$_SESSION['userIDnum'] = $row['UserID'];
					$_SESSION['accountName'] = $row['Username'];

					header("location: ../home.php?login=successful");
					exit();

				} else {
					header("location: ../home.php?error=wrongpass");
					exit();
				}

			} else {
				header("location: ../home.php?error=nouser");
				exit();
			}
		}
	}
} else {
	header("location: ../home.php");
	exit();
}