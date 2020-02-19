//Sending e-mail via local host using Ajax technique
$(function() {
	const mainContacts = $('#mainContacts');
	let name = mainContacts.find('#name');
	let email = mainContacts.find('#email');
	let phone = mainContacts.find('#phone');
	let subject = mainContacts.find('#subject');
	let message = mainContacts.find('#message');
	let sendMessageBtn = mainContacts.find('.send-message-btn');

	sendMessageBtn.click(function(sendMail) {
		/*
		if (notEmpty(name) && 
			notEmpty(email) && 
			notEmpty(subject) && 
			notEmpty(message)) {
		*/
			$.ajax({
				url: './includes/contacts.inc.php',
				method: 'POST',
				dataType: 'json',
				data: {
					name: name.val(),
					email: email.val(),
					phone: phone.val(),
					subject: subject.val(),
					message: message.val()
				}
			});
		/*
		} else {
			console.log('Empty fields');
			sendMail.preventDefault();
		}
		*/
	});

	function notEmpty(input) {
		if (input.val() == '') {
			input.css('border', '1.5px solid darkred');
			return false;
		} else {
			input.css('border', '');
			return true;
		}
	}
});