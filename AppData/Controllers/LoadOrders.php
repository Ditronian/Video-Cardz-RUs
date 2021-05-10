<?php

include_once('AppData/Models/User.php');
include_once('AppData/Models/Order.php');

$userID = unserialize($_SESSION['user'])->userID;
$orders = array();

// connect to database
$link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

// find data in table
$query = "SELECT * FROM Orders WHERE userID = $userID";
$result = mysqli_query($link, $query);

if($result->num_rows != 0)
{
    //Get Orders
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
    {
        $order = new Order($line["userID"], $line["orderDate"], $line["orderID"]);
        array_push($orders, $order);
    }

    //Foreach Order, Get Order Items
    foreach($orders as $order)
    {
        $query2 = "Select * FROM OrderItems WHERE orderID = $order->orderID";
        $result2 = mysqli_query($link, $query2);

        $itemIDs = array();

        //Get OrderItems IDs
        while ($line = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
        {
            array_push($itemIDs, $line["itemID"]);
        }

        //Get Items for Order
        foreach($itemIDs as $itemID)
        {
            $query3 = "SELECT * FROM Items WHERE itemID = $itemID";
            $result3 = mysqli_query($link, $query3);

            if($result3->num_rows != 0)
            {
                while ($line = mysqli_fetch_array($result3, MYSQLI_ASSOC)) 
                {
                    $item = new Item($line["itemID"], $line["itemName"], $line["price"], $line["description"], $line["imageLocation"], $line["manufacturer"], $line["rating"]);
                    array_push($order->orderItems, $item);
                }
            }
        }
    }

    $_SESSION['Orders'] = serialize($orders);

    //Free result set
    mysqli_free_result($result);

    //close connection
    mysqli_close($link);
        
}

if(sizeof($orders) == 0)
{
    echo "<br><span>There are no past orders.</span>";
}

else
{
    //Add an order item to the html foreach item in the orders array.
    foreach ($orders as $order)
    {
        $totalPrice = 0.0;
        $numberOfItems = 0;

        foreach($order->orderItems as $item)
        {
            $totalPrice += $item->price;
            $numberOfItems++;
        }

        echo 
        "<div class=\"orders\">
            <b>Order Date: </b>$order->orderDate<br>
            <b>Number of Items: </b>$numberOfItems<br>
            <b>Order Total: </b>$$totalPrice<br>
            <button class=\"removeBtn w3-green\" style=\"margin-bottom: 2px;\" onclick=\"window.location.href = 'Invoice.php?orderID=$order->orderID';\">Invoice</button><br>
        </div>";
    }
}



?>