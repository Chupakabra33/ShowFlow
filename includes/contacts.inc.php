<?php
//contacts.inc.php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit-contacts'])) {

	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';
	require_once '../PHPMailer/src/Exception.php';

	$mailer = new PHPMailer();

	$name = $_POST['name'];
	$sender_mail = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$receiver_mail = 'metal_heart@abv.bg';
	$text = <<<EOT
Name: {$name}
Email: {$sender_mail}
Tel: {$phone}

Message:
{$message}
EOT;
	#$text = '<b><u>Sender details</u></b><br>Name: '.$name.'<br>'.'e-mail: '.$sender_mail.'<br>'.'tel: '.$phone.'<br><br>'.'<b><u>Message</u></b><br>'.$message;

	/*
	If I choose to use the mail() function of PHP then I set $headers:
	$headers = 'From: '.$sender_mail;
	mail($receiver_mail, $subject, $text, $headers);
	*/

	//SMTP settings
	#$mailer -> SMTPDebug  = 3;
	$mailer -> isSMTP();
	#$mailer -> Host = 'smtp.gmail.com';
	$mailer -> Host = 'smtp.abv.bg';
	$mailer -> SMTPAuth = true;
	#$mailer -> Username = 'k.georgieva888@gmail.com';
	$mailer -> Username = 'some@email.com';
	#$mailer -> Password = '';
	$mailer -> Password = 'some_password';
	$mailer -> Port = 465; //TLS = 587 for gmail and 465 for abv
	$mailer -> SMTPSecure = 'ssl'; //or tls

	//EMAIL settings
	$mailer -> isHTML(false);
	$mailer -> setFrom('some@email.com');
	$mailer -> addAddress($receiver_mail);
	$mailer -> addReplyTo($sender_mail, $name);
	$mailer -> Subject = 'Show flow: '.$subject;
	$mailer -> Body = $text;

	$name_regex = '/^(?=.{2,80}$)[^0-9\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+$/';
	$phone_regex = '/(^$)|(^[0-9 +\/.-]{0,35}$)/';

	if (empty($name) ||
		empty($sender_mail) || 
		empty($subject) ||  
		empty($message)) {

		header('location: ../contacts.php?error=emptyfieldscont&name=' . $name . '&sendermail=' . $sender_mail . '&phone=' . $phone . '&subject=' . $subject . '&message=' . $message);
		exit();
	} else if (!preg_match($name_regex, $name)) {
		header('location: ../contacts.php?error=invalidnamecont&sendermail=' . $sender_mail . '&phone=' . $phone . '&subject=' . $subject . '&message=' . $message);
		exit();
	} else if (!filter_var($sender_mail, FILTER_VALIDATE_EMAIL)) {
		header('location: ../contacts.php?error=invalidmailcont&name=' . $name . '&sendermail=' . $sender_mail . '&subject=' . $subject . '&message=' . $message);
		exit();
	} else if (!preg_match($phone_regex, $phone)) {
		header('location: ../contacts.php?error=invalidphone&name=' . $name . '&sendermail=' . $sender_mail . '&subject=' . $subject . '&message=' . $message);
		exit();
	} else if (!$mailer -> send()) {
		#$system_error = $mailer -> ErrorInfo;
		#echo $system_error;
		header('location: ../contacts.php?error=mailererror&name=' . $name . '&sendermail=' . $sender_mail . '&phone=' . $phone . '&subject=' . $subject . '&message=' . $message);
		exit();
	} else {
		header('location: ../contacts.php?emailmessage=sent');
		exit();
	}

	mysqli_close($con);

} else {
	header('location: ../contacts.php');
	exit();
}