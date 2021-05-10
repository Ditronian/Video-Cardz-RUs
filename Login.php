<?php session_start(); session_unset(); ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Login.css" />
</head>
<body>
    <section id="topBar">
        <div id="topBarTop">
            <h1>VideoCardz"R"Us</h1>
        </div>
        <div id="topBarBottom">
            <a class="linkButton" href="Login.php">Login</a>
            <a class="linkButton" href="Registration.php">Registration</a>
        </div>
    </section>

    <section id="content">
        <div id="contentBox">
            <div id="form">
                <h1>Login</h1>
                <!-- This presently saves the email and password to a session variable.  In practice a DB call will be made, and credentials will be saved instead. -->
                <form name="loginForm" action="AppData/Controllers/LoginHandler.php" method="POST">
                    <input id="email" class="w3-input" type="text" placeholder="Enter email" name="email" required>
                    <label class="leftAlign" for="email"><b>Email</b></label><br>
                    <br>
                    <input id="password" class="w3-input" type="password" placeholder="Enter Password" name="password" required>
                    <label class="leftAlign" for="password"><b>Password</b></label>
                    <div class="w3-container w3-center ">
                        <br>
                        Forgot <a href="#">password?</a>
                        <br><br>
                    </div>
                    <button type="submit" class="w3-btn w3-blue">Login</button>
                    <br>
                    <p>
                        Don't have an account?  Create an account here.
                    </p>
                    <a class="w3-btn w3-blue" href="Registration.php">Create Account</a>
                </form>
            </div>
        </div>
    </section>

    <section id="footerBar">
        Copyright 2021 David Gereau
    </section>
</body>
</html>

<script src="JS/Login.js"></script>