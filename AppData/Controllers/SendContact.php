<?php
session_start();
include_once('../Models/User.php');
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$subject = $_POST["subject"];
$message = $_POST["message"];
$user = unserialize($_SESSION['user']);

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

//Server settings
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true; 
$mail->Username = 'appliedLanguageResearch@gmail.com'; 
$mail->Password = 'meowmeow!123';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

//Recipients
$mail->setFrom($user->email, $user->firstName.' '.$user->lastName);          //This is the email your form sends From
$mail->addAddress('appliedLanguageResearch@gmail.com', 'VideoCardzRUs'); // Add a recipient address

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = "User Email: $user->email<br><br>".$message;

$mail->send();

header("Location: ../../Contact.php?success=True");
?>