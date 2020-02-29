<?php
	require "./header.php";
?>

<main id="mainRegister">
	<div class="register-background">
		<?php
			if (isset($_GET['registration'])) {
				if ($_GET['registration'] == 'successful') {
					echo '<p class="registration-successful">Registration successful</p>';
				}
			} else if (isset($_GET['error'])) {
				if ($_GET['error'] == 'sqlerror') {
					echo '<p class="reg-error registration-error-group1">SQL error. Try again later.</p>';
				}
			}
		?>
		<h1 class="register-title">Registration</h1>
		<p class="required-info">* required</p>
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'emptyfields') {
					echo '<p class="reg-error registration-error-group1">The fields marked with a * are required</p>';
				} else if ($_GET['error'] == 'invalidusernamemailfullname') {
					echo '<p class="reg-error registration-error-group1">Invalid username, e-mail and full name</p>';
				} else if ($_GET['error'] == 'invalidmailandusername') {
					echo '<p class="reg-error registration-error-group1">Invalid username and e-mail</p>';
				} else if ($_GET['error'] == 'invalidmailandfullname') {
					echo '<p class="reg-error registration-error-group1">Invalid e-mail and full name</p>';
				} else if ($_GET['error'] == 'invalidusernameandfullname') {
					echo '<p class="reg-error registration-error-group1">Invalid username and full name</p>';
				}
			}
		?>

		<form action="./includes/register.inc.php" method="post" id="registerForm">
			<input id="username" class="register-form-input" type="text" name="username" placeholder="Username *" minlength="2" autofocus="on"/>
			<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'invalidusername') {
						echo '<p class="reg-error registration-error-group2">Invalid username. Max length is 30 characters and some symbols are not permitted.</p>';
					} else if ($_GET['error'] == 'usertaken') {
						echo '<p class="reg-error registration-error-group2">This username already exists.</p>';
					}
				}
			?>
			<input id="email" class="register-form-input" type="email" name="email" placeholder="E-mail *"/>
			<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'invalidmail') {
						echo '<p class="reg-error registration-error-group2">Invalid e-mail</p>';
					}
				}
			?>
			<input id="fullName" class="register-form-input" type="text" name="fullname" placeholder="Full name (e.g. John Doe)"/>
			<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'invalidfullname') {
						echo '<p class="reg-error registration-error-group2">This field is not reqired but digits and some symbols are not permitted in it: 0-9 , " ? ! ; : # $ % & ( ) * + - / < > = @ [ ] \ ^ _ { } | ~</p>';
					}
				}
			?>
			<input id="password" class="register-form-input" type="password" name="password" placeholder="Password (at least 6 symbols) *" minlength="6"  autocomplete="off"/>
			<input id="confirmPass" class="register-form-input"type="password" name="confirmPass" placeholder="Confirm password *" autocomplete="off"/>
			<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'passwordnotmatch') {
						echo '<p class="reg-error registration-error-group2">Please, confirm the password correctly.</p>';
					}
				}
			?>
			<input id="register-btn" class="register-btn register-form-input" type="submit" name="register" value="Register"/>
			
		</form>
	</div>
</main>

<?php
	require "./footer.php";
?>