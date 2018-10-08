<?php
if (isset($_POST['send'])) {
	ini_set("SMTP", "localhost");
	ini_set("smtp_port", "25");
		$to = 'tsarnat29@gmail.com';
		$subject = 'Feedback from my syte';
		$message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
		$message .= 'E-mail: ' . $_POST['E-mail'] .  "\r\n\r\n";
		$message .= 'Comments: ' . $_POST['Message'];
		$headers = "From: tsarnat29@gmail.com\r\n";
		$headers .= 'Content-Type: text/plain; charset=utf-8';
		$email = filter_input(INPUT_POST, 'E-mail', FILTER_VALIDATE_EMAIL);
		IF ($email) {
			$headers .= "\r\nReply-To: $email";
		}
//    "Reply-To: $email" . "\r\n" .
//    "X-Mailer: PHP/" . phpversion();
		$success = mail($to, $subject, $message, $headers, '-ftsarnat29@gmail.com');
}
?>

<!DOCTYPE html>
<body>
<?php if (isset($success) && $success) { ?> 
<h1>thank You</h1>
<p>Your message has been sent.</p>
<?php } else { ?>
<h1>Oops!</h1>
<p>Sorry? there was a problem sending your message.</p>
<?php } ?>
</body>