<?php
	require "./header.php";
?>

<main>
	<span class="page-name">home.php</span><!-- TEST -->
	<div class="home page">
		<div>
			<?php
				if (isset($_SESSION['accountName'])) {
					echo '<p class="login-status">You\'re logged in</p>';
					if (!isset($_COOKIE[$cookie_name])) {
						echo '<p class="login-status">The cookie "' . $cookie_name . '" is NOT set</p>';
					} else {
						echo '<p class="login-status">The cookie "' . $cookie_name . '" is set. Value is: <i>' . $cookie_value . '</i></p>';
					}
				} else {
					echo '<p class="login-status">You\'re logged out. Cookie "' . $cookie_name . '" is empty</p>';
				}

			?>
			<h1 class="home-title">Choose the show of your lifetime</h1>
		</div>
	</div>
</main>

<?php
	require "./footer.php";
?>