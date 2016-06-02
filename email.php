<?php

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//Make sure the requst is actually a POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

	//Scrub for malicious attacks
	$fname = test_input($_POST['first_name']);
	$lname = test_input($_POST['last_name']);
	$email = test_input($_POST['email']);
	//$email = 
	$subject = test_input($_POST['subject']);
	$message = test_input($_POST['message']);

	//set up email
	$to = 'hello@johnrcasey.net';

	$message = 'Name: ' . $fname . ' ' . $lname . "\r\n\r\n";
	$message .= 'Email: ' . $email . "\r\n\r\n";
	$message .= 'Message: ' . $message;

	//wordwrap used to keep lnes to 80 charactors
	$message = wordwrap($message, 80, "\r\n")

	$headers = 'From: ' . $email . '\r\n';
	$headers .= 'Content-Type: text/plain; charset=utf-8';

	$success = mail($to, $subject, $message, $headers);

	if($success)
	{
		header("Location: /contact.html");
	}
	else
	{
		echo "Email was not sent successfully\r\n";
		echo "<a href='/contact.html'>Back</a>";
	}
}
else{
	echo "This was not a POST message!"
}

?>
