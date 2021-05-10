<?php session_start(); include('AppData/Controllers/AuthenticationCheck.php'); ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Profile.css" />
    <script src="JS/Profile.js"></script>
</head>
<body>
    <section id="topBar">
        <div id="topBarTop">
            <h1>VideoCardz"R"Us</h1>
        </div>
        <div id="topBarBottom">
            <a class="linkButton" href="Home.php">Home</a>
            <a class="linkButton" href="Catalog.php">View Catalog</a>
            <a class="linkButton" href="Orders.php">Orders</a>
            <a class="linkButton" href="Contact.php">Contact</a>
            <a class="linkButton" href="Profile.php">Profile</a>
            <a class="linkButton" href="Login.php">Logout</a>
            <span id="itemNumber"><?php echo sizeof($_SESSION['cart']);?></span>
            <a id="cartButton" href="Cart.php"><img src="Images/cartButton.png" alt="cartButton"></a>
            <span id="emailLabel"><?php echo $_SESSION['email'];?></span>
        </div>
    </section>

    <section id="content">
        <div id="contentBox">
            <h1>Profile</h1>
            <br>
            <form name="updateInformation" onsubmit="return validateUpdate()" method="POST" action="AppData/Controllers/UpdateUser.php">
                <input id="email" class="w3-input" type="text" placeholder="Enter New Email" name="email">
                <label class="leftAlign" for="email"><b>New Email</b></label><br>
                <br>
                <input id="password" class="w3-input" type="password" placeholder="Enter New Password" name="password">
                <label class="leftAlign" for="password"><b>New Password</b></label><br>
                <br>
                <input id="confirmPassword" class="w3-input" type="password" placeholder="Confirm New Password" name="confirmPassword">
                <label class="leftAlign" for="confirmPassword"><b>Confirm Password</b></label>
                <br><br>
                <button type="submit" class="w3-btn w3-blue">Update</button>
            </form>
        </div>
    </section>

    <section id="footerBar">
        Copyright 2021 David Gereau
    </section>
</body>
</html>