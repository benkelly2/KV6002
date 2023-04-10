<!-- REFERENCE
    Title: PHP Mailer
    Author: Marcus Bointon
    Date Accessed: 10/03/2023
    Availability: https://github.com/PHPMailer
-->
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/truenorth/src/scripts/PHPMailer-master/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/truenorth/src/scripts/PHPMailer-master/src/SMTP.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/truenorth/src/scripts/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //validation
    if (!empty($_POST['bot-field'])) {
        // This field is invisible to humans, but not to bots
        // If this field is filled in, then it's likely spam
        header("Location: ../contact.php?message=Email+not+sent.+Please+try+again.");
        exit();
    }

    // Check that name, email, and message are not empty
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: ../contact.php?message=Email+not+sent.+Please+fill+in+all+fields.");
        exit();
    }

    // Check that the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../contact.php?message=Email+not+sent.+Please+provide+a+valid+email+address.");
        exit();
    }

	$mail = new PHPMailer(true);

	$send_using_gmail = true;
	//Send mail using gmail
	if($send_using_gmail){
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPDebug = 2;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->Sender = $email;
		$mail->Username = "tnsc.contact@gmail.com"; // GMAIL username
		$mail->Password = "pwxixkhowqddkmvk"; // app password
	}
	
	//Typical mail data
	$mail->AddAddress('tnsc.contact@gmail.com','admin');
	$mail->AddReplyTo($email, $name);
	$mail->Subject = "Message from $name";
	$mail->Body = "$message";
	
	
	try {
		// send the email
		$mail->Send();		
		// redirect to contact page with success message
		header("Location: ../contact.php?message=Email+sent+successfully");
		exit();
		
	} catch (Exception $e) {
		// something went wrong
		$error = "Error sending email. " . $mail->ErrorInfo;
		// redirect to contact page with error message
		header("Location: ../contact.php?message=" . urlencode($error));
		exit();
	}
	
}

?>
