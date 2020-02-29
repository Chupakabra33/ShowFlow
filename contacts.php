<?php
	require "./header.php";
?>

<main id="mainContacts">
	<span class="page-name">contacts.php</span>
	<div class="contacts-big-background">
		<div class="contacts main-box">
			<div class="contacts info-box">
				<div class="contacts guests-box">
					<h2>For event guests</h2>
					<div class="contacts details">
						<img class="contacts icon" src="./images/icons/icon_phone_white_2.png" alt="icon" />
						<p>0222 022 022</p>
					</div>
					<div class="contacts details">
						<img class="contacts icon" src="./images/icons/icon_email_white.png" alt="icon"/>
						<p>guests@showflow.com</p>
					</div>
				</div>
				<div class="contacts organizers-box">
					<h2>For event organizers</h2>
					<div class="contacts details">
						<img class="contacts icon" src="./images/icons/icon_phone_white_2.png" alt="icon"/>
						<p>0888 088 088</p>
					</div>
					<div class="contacts details">
						<img class="contacts icon" src="./images/icons/icon_email_white.png" alt="icon">
						<p>organizers@showflow.com</p>
					</div>
				</div>
			</div>

			<div class="contacts location-box">
				<div class="contacts details-location">
					<img class="contacts icon-location" src="./images/icons/icon_location_white.png" alt="icon"/>
					<h2>Our office location</h2>
				</div>
				<iframe class="contacts map" src="https://www.openstreetmap.org/export/embed.html?bbox=23.312266230714158%2C42.69375464308844%2C23.319164872300465%2C42.69638442541814&amp;layer=mapnik&amp;marker=42.69506954817354%2C23.31571555150731"></iframe>
				<a href="https://www.openstreetmap.org/?mlat=42.69507&amp;mlon=23.31572#map=18/42.69507/23.31572">View a larger map</a>
			</div>
		</div>

		<!-- Contact form -->
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
					<input type="text" name="email" id="email" class="contact-form"/>
					<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == 'invalidmailcont') {
								echo '<p class="cont-error contacts-error-group2">Invalid e-mail</p>';
							}
						}
					?>
					<label for="phone" class="contact-form">Phone number</label>
					<input type="phone" name="phone" id="phone" class="contact-form"/>
					<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == 'invalidphone') {
								echo '<p class="cont-error contacts-error-group2">Invalid phone number (0-9, space and / + . -)</p>';
							}
						}
					?>
					<label for="subject" class="contact-form">Subject *</label>
					<input type="text" name="subject" id="subject" class="contact-form"/>
					<label for="message" class="contact-form">Message or question *</label>
					<textarea name="message" id="message" class="contact-form"></textarea>
					<input type="submit" name="submit-contacts" class="contact-form send-message-btn" value="Send"/>
				</fieldset>
			</form>
		</div>
	</div>
</main>

<?php
	require "./footer.php";
?>