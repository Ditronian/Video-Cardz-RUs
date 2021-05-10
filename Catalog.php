<?php include('AppData/Models/Item.php'); session_start(); include('AppData/Controllers/AuthenticationCheck.php'); ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Catalog</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/Master.css" />
    <link rel="stylesheet" type="text/css" href="CSS/Catalog.css" />
    <script src="JS/Catalog.js"></script>
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
            <div id="filterDiv">
                <form name="filterForm" onsubmit="return validateFilter()" method="GET" action="Catalog.php">
                    <span id="header">Filters</span>
                    <br>
                    Rating:
                    <input type="radio" id="rating1" name="rating" value="1">
                    <input type="radio" id="rating2" name="rating" value="2">
                    <input type="radio" id="rating3" name="rating" value="3">
                    <input type="radio" id="rating4" name="rating" value="4">
                    <input type="radio" id="rating5" name="rating" value="5">
                    <br><br>
                    Seller
                    <br>
                    <input type="checkbox" id="asus" class="sellerBox" name="asus"><label for="asus"> ASUS</label><br>
                    <input type="checkbox" id="evga" class="sellerBox" name="evga"><label for="evga"> EVGA</label><br>
                    <input type="checkbox" id="gigabyte" class="sellerBox" name="gigabyte"><label for="gigabyte"> Gigabyte</label><br>
                    <input type="checkbox" id="msi" class="sellerBox" name="msi"><label for="msi"> MSI</label><br>
                    <input type="checkbox" id="pny" class="sellerBox" name="pny"><label for="pny"> PNY</label><br>
                    <input type="checkbox" id="zotac" class="sellerBox" name="zotac"><label for="zotac"> Zotac</label><br>
                    <br>
                    Price
                    <input type="number" class="priceBox" name="minPrice" id="minPriceBox" placeholder="Min">
                    <input type="number" class="priceBox" name="maxPrice" id="maxPriceBox" placeholder="Max">
                    <br><br>
                    Search Name:
                    <input type="text" class="priceBox" name="search" id="searchBox" placeholder="Item Name">
                    <br><br>
                    Sort By:
                    <select name="sortBy" id="sortBy">
                        <option value="itemName">Name</option>
                        <option value="price">Price</option>
                        <option value="manufacturer">Manufacturer</option>
                    </select>
                    <br><br>
                    <input type="submit" class="w3-btn w3-blue" value="Submit">
                </form>
            </div>
            <div id="CatalogDiv" class="grid-container">
                <?php 
                    if (isset($_GET["minPrice"])) include 'AppData/Controllers/CatalogFilter.php';
                    else include 'AppData/Controllers/CatalogItems.php';
                ?>
            </div>
            <div id="nextPageDiv"><button class="roundButton">&lt;</button> Page 1 of 3 <button class="roundButton">&gt;</button></div>
        </div>
    </section>

    <section id="footerBar">
        Copyright 2021 David Gereau
    </section>
</body>

</html>