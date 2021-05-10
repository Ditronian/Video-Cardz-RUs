<?php include('AppData/Models/Item.php'); session_start(); include('AppData/Controllers/AuthenticationCheck.php'); ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Orders</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Orders.css" />
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
            <h1>Orders</h1>
            <?php include 'AppData/Controllers/LoadOrders.php';?>
        </div>
    </section>

    <section id="footerBar">
        Copyright 2021 David Gereau
    </section>
</body>

</html>