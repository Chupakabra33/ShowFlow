<?php
	require "./header.php";
?>

<main id="mainContacts">
	<span class="page-name">contacts.php</span>
	<div class="contacts-background">
		<?php
			if (isset($_GET['emailmessage'])) {
				if ($_GET['emailmessage'] == 'sent') {
					echo '<p class="message-sent">Your message was sent successfully</p>';
				}
			} else if (isset($_GET['error'])) {
				if ($_GET['error'] == 'mailererror') {
					echo '<p class="cont-error contacts-error-group1">Something went wrong. Come back and try again later.</p>';
				}
			}
		?>
		<form action="./includes/contacts.inc.php" method="post" class="contact-form" >
			<fieldset class="contact-form">
				<legend class="contact-form">Contact us</legend>
				<p class="cont-required-info">required *</p>
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 'emptyfieldscont') {
							echo '<p class="cont-error contacts-error-group1">The fields marked with a * are required</p>';
						}
					}
				?>
				<label for="name" class="contact-form">Your name *</label>
				<input type="text" name="name" id="name" class="contact-form">
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 'invalidnamecont') {
							echo '<p class="cont-error contacts-error-group2">Please, enter a valid name up to 80 charachters</p>';
						}
					}
				?>
				<label for="email" class="contact-form">Your e-mail *</label>
				<input type="text" name="email" id="email" class="contact-form">
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 'invalidmailcont') {
							echo '<p class="cont-error contacts-error-group2">Invalid e-mail</p>';
						}
					}
				?>
				<label for="phone" class="contact-form">Phone number</label>
				<input type="phone" name="phone" id="phone" class="contact-form">
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 'invalidphone') {
							echo '<p class="cont-error contacts-error-group2">Invalid phone number (0-9, space and / + . -)</p>';
						}
					}
				?>
				<label for="subject" class="contact-form">Subject *</label>
				<input type="text" name="subject" id="subject" class="contact-form">
				<label for="message" class="contact-form">Message or question *</label>
				<textarea name="message" id="message" class="contact-form"></textarea>
				<input type="submit" name="submit-contacts" class="contact-form send-message-btn" value="Send">
			</fieldset>
		</form>
	</div>
</main>

<?php
	require "./footer.php";
?>