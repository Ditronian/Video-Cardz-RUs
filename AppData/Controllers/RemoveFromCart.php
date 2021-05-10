<?php
include('../Models/Item.php');
session_start();

$itemNum = $_REQUEST["item"];
$result = null;

//Find element id for item being searched
foreach ($_SESSION['cart'] as $key=>$item)
{
    if($item->id == intval($itemNum)) $result = $key;
}

unset($_SESSION['cart'][$result]);
?>