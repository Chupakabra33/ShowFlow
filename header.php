<?php
	/*header.php*/
	session_start();
	$cookie_name = 'username';

	if (isset($_SESSION['accountName'])) {
		$cookie_value = $_SESSION['accountName'];
		setcookie($cookie_name, $cookie_value, time() + 259200, '/');//1 week
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Flow - course project</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_header.css?v1.2.1"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_footer.css?v1.0.0"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_home.css?v1.2.4"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_events.css?v1.0.4"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_contacts.css?v1.0.9"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_register.css?v1.0.2"/>
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>

</head>

<body>
	<div class="index page">
		<header>
			<div class="header top-bar">

				<?php
					if (isset($_SESSION['accountName'])) {
						echo '<form action="./includes/logout.inc.php" method="post" id="logoutForm">
						<input type="submit" name="logout-submit" value="Logout"/>
					</form>';
					} else {
						echo '<form action="./includes/login.inc.php" method="post" id="loginForm">
					<input id="usernameEmail" class="login-form" type="text" name="username-email" placeholder="Username or e-mail..." minlength="2"/>
					<input id="password" class="login-form" type="password" name="password" placeholder="Password..." minlength="6" autocomplete="off"/>
					<input type="submit" name="login-submit" value="Login"/>
				</form>
				<a href="./register.php" id="registerBtn">Register</a>';

						if (isset($_GET['error'])) {
							if ($_GET['error'] == 'emptyfieldslogin') {
								echo '<p class="login-error">Please, enter username/e-mail and password</p>';
							} else if ($_GET['error'] == 'wrongpass') {
								echo '<p class="login-error">Wrong password. Access denied.</p>';
							} else if ($_GET['error'] == 'sqlerrorlogin') {
								echo '<p class="login-error">Something went wrong. Please try again later.</p>';
							} else if ($_GET['error'] == 'nouser') {
								echo '<p class="login-error">There is no such user.</p>';
							}
						}
					}
				?>

			</div>
			<div class="header top-background">
				<div class="header logo-box">
					<img class="header logo-img" src="./images/logo.png"/>
					<div class="header logo-text-box">
						<div class="header logo-text">Show Flow</div>
						<small class="header logo-text">stay with the flow</small>
					</div>
				</div>
			</div>
			<nav>
				<ul class="header main-menu">
					<li><a class="header tab" href="http://localhost/show_flow_course_project/home.php">Home</a></li>
					<li><a class="header tab" href="http://localhost/show_flow_course_project/events.php">Events</a></li>
					<li><a class="header tab" href="http://localhost/show_flow_course_project/contacts.php">Contacts</a></li>
				</ul>
			</nav>
		</header>