<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/scripts/PHPMailer-master/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/scripts/PHPMailer-master/src/SMTP.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/scripts/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

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
		$mail->Username = "kv5732221@gmail.com"; // GMAIL username
		$mail->Password = "szccudtechbzdmqw"; // app password
	}
	
	//Typical mail data
	$mail->AddAddress('kv5732221@gmail.com','admin');
	$mail->AddReplyTo($email, $name);
	$mail->Subject = "Message from $name";
	$mail->Body = "$message";
	
	
	try {
		// send the email
		$mail->Send();		
		// redirect to contact page with success message
		header("Location: contact.php?message=Email+sent+successfully");
		exit();
		
	} catch (Exception $e) {
		// something went wrong
		$error = "Error sending email. " . $mail->ErrorInfo;
		// redirect to contact page with error message
		header("Location: contact.php?message=" . urlencode($error));
		exit();
	}
	
}

?>
