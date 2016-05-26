<?php

//set up email
$to = 'hello@johnrcasey.net';
$subject = $_POST['subject'];

// Remove all illegal characters from email
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$message = 'Name: ' . $_POST['first_name'] . ' ' . $_POST['last_name'] . "\r\n\r\n";
$message .= 'Email: ' . $email . "\r\n\r\n";
$message .= 'Message: ' . $_POST['message'];
$headers = 'From: ' . $_POST['email'] . '\r\n';
$headers .= 'Content-Type: text/plain; charset=utf-8';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$success = mail($to, $subject, $message, $headers);

if($success)
{
	header("Location: http://johnrcasey.net/contact.html");
}
else
{
	echo "Email was not sent successfully";
	echo "<a href='/contact.html'>Back</a>";
}

?>
