<?php


$fromEmail = "paulokweso7@gmail.com";
$toEmail = "paulokweso8@gmail.com";
$subjectName = "Election notice";
$message = "please enter the following code";

$to = $toEmail;
$subject = $subjectName;
$headers = 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

ini_set("smtp_port", "465");
ini_set("SMTP", "smtp.secureserver.net");
$result = mail($to, $subject, $message, $headers);
	if ($result==true){

    echo '<script>alert("Email sent successfully !")</script>';
	}
	else{
		echo '<script>alert("Email not sent !")</script>';
	}
	

?>