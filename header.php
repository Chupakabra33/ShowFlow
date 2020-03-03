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
	<link rel="stylesheet" type="text/css" href="./styles/styles_header.css?v1.4.54"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_footer.css?v1.0.0"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_home.css?v1.2.5"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_events.css?v1.0.9"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_contacts.css?v1.2.0"/>
	<link rel="stylesheet" type="text/css" href="./styles/styles_register.css?v1.0.7"/>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" 
			integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
			crossorigin=""/>
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" 
		integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
		crossorigin="">
	</script>

</head>

<body>
	<div class="index page">
		<img class="scrollToTop" src="./images/icons/arrow_up_white.png"/>
		<header>
			<div class="header top-bar">

				<?php
					if (isset($_SESSION['accountName'])) {
						echo '<form action="./includes/logout.inc.php" method="post" class="logout-form">
								<input type="submit" name="logout-submit" value="Logout"/>
							</form>';
					} else {
						echo '<form action="./includes/login.inc.php" method="post" class="login-form">';
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
						echo '<div class="login-input-box">
								<input id="usernameEmail" class="login-form" type="text" name="username-email" placeholder="Username or e-mail..." minlength="2"/>
								<input id="loginPassword" class="login-form" type="password" name="password" placeholder="Password..." minlength="6" autocomplete="off"/>
							</div>
							<div class="buttons-box">
								<input type="submit" name="login-submit" value="Login"/>
								<a href="./register.php" id="registerBtn">Register</a>
							</div>
						</form>';
					}
				?>

			</div>
			<div class="header top-background">
				<button class="open-btn">☰</button>
				<div class="header logo-box">
					<img class="header logo-img" src="./images/logo.png"/>
					<div class="header logo-text-box">
						<div class="header logo-text">Show Flow</div>
						<small class="header logo-text">stay with the flow</small>
					</div>
				</div>
			</div>
			<nav class="main-menu closed-sidepanel">
				<a href="javascript:void(0)" class="close-btn">×</a>
				<ul class="header main-menu">
					<li><a class="header tab" href="http://localhost/show_flow_course_project/home.php">Home</a></li>
					<li><a class="header tab" href="http://localhost/show_flow_course_project/events.php">Events</a></li>
					<li><a class="header tab" href="http://localhost/show_flow_course_project/contacts.php">Contacts</a></li>
				</ul>
			</nav>

		</header>