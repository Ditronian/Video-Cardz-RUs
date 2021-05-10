<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Registration.css" />
    <script src="JS/Registration.js"></script>
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
                <h1>Registration</h1>
                <form name="registrationForm" onsubmit="return validateRegistration()" action="AppData/Controllers/RegistrationHandler.php"  method="POST">
                    <input id="first" class="w3-input" type="text" placeholder="Enter First Name" name="first" required>
                    <label for="first"><b>First Name</b></label><br>
                    <br>
                    <input id="last" class="w3-input" type="text" placeholder="Enter Last Name" name="last" required>
                    <label for="last"><b>Last Name</b></label><br>
                    <br>
                    <input id="email" class="w3-input" type="text" placeholder="Enter Email" name="email" required>
                    <label for="email"><b>Email</b></label><br>
                    <br>
                    <input id="password" class="w3-input" type="password" placeholder="Enter Password" name="password" required>
                    <label for="password"><b>Password</b></label><br>
                    <br>
                    <input id="confirmPassword" class="w3-input" type="password" placeholder="Confirm Password" name="confirmPassword" required>
                    <label for="confirmPassword"><b>Confirm Password</b></label><br>
                    <br>
                    <input type="submit" class="w3-btn w3-blue" value="Create Account">
                </form>
            </div>
        </div>
    </section>

    <section id="footerBar">
        Copyright 2021 David Gereau
    </section>
</body>
</html>