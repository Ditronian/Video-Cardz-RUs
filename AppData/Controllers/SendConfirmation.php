<?php
session_start();
include_once('../Models/User.php');
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//User has to try and login so I know their email.  Send to Login page with a msg.
if(!isset($_SESSION['confirmUser']))
{
    header("Location: ../../Login.php?error=confirm");
}

$user = unserialize($_SESSION['confirmUser']);
$mail = new PHPMailer(true);

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
$mail->setFrom('videocardzrus@gmail.com', 'VideoCardzRUs');
$mail->addAddress($user->email, $user->firstName.' '.$user->lastName);

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Confirm your account!';
$mail->Body    = 'Greetings,<br><br>Please follow this link to activate your new Video Cardz R Us Account:<br><br>http://Censored - mySQL Server/~Censored/Confirm.php?confirmationCode='.$user->confirmationCode;

$mail->send();
echo 'Message has been sent';
    
?>