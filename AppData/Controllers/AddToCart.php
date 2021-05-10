<?php
session_start();

$itemNum = $_REQUEST["item"];

//If cart does not exist, create one.
if(!isset($_SESSION['cart']))
{
    $cart = array();
    $_SESSION['cart']=$cart;
}

//Find the item with the item num and add to cart
// connect to database
$link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

// find data in table
$query = "SELECT * FROM Items WHERE itemID = $itemNum";
$result = mysqli_query($link, $query);

if($result->num_rows != 0)
{
    include('../Models/Item.php');

    $row = $result->fetch_assoc();
    $item = new Item($row["itemID"], $row["itemName"], $row["price"], $row["description"], $row["imageLocation"], $row["manufacturer"], $row["rating"]);

    array_push($_SESSION['cart'], $item);
}

?>