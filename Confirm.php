<?php session_start(); include('AppData/Controllers/CheckConfirmation.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Confirm.css" />
    <script src="JS/Confirm.js"></script>
    <title>Confirm</title>
</head>

<body>
<!--TOP NAVIGATION BAR-->
<section id="topBar">
        <div id="topBarTop">
            <h1>VideoCardz"R"Us</h1>
        </div>
        <div id="topBarBottom">
            <a class="linkButton" href="Login.php">Login</a>
            <a class="linkButton" href="Registration.php">Registration</a>
        </div>
    </section>
<!--PAGE SPECIFIC CONTENT-->
<section id="content">
    <div id="contentBox">
        <br>
        <h1>Account Confirmation</h1>
        <hr>
        <p>
            Please check your email account for an email with further instructions!
        </p>
        <hr>
        <button type="submit" id="resendButton" onclick="resendConfirmation()" class="w3-btn w3-blue">Resend</button>
    </div>
</section>
</body>
</html>