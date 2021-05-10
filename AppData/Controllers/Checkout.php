<?php
    include('../Models/User.php');
    include('../Models/Item.php');
    session_start();

    //If cart does not exist, or is empty
    if(!isset($_SESSION['cart']) || sizeof($_SESSION['cart']) <= 0)
    {
        //Do nothing, maybe display a message.  Realistically this should be done by the JS though.
    }
    else
    {

        //Gather information
        $userID = unserialize($_SESSION['user'])->userID;

        // connect to database
        $link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

        //Insert a new Order
        $query1 = "INSERT INTO Orders (userID, orderDate) VALUES ($userID, CURRENT_TIMESTAMP)";
        mysqli_query($link, $query1);
        $orderID = mysqli_insert_id($link);
        
        //Insert Order Items
        foreach($_SESSION['cart'] as $key=>$item)
        {
            $query = "INSERT INTO OrderItems (itemID, orderID) VALUES ($item->id, $orderID)";
            mysqli_query($link, $query);
            //Remove from cart
            unset($_SESSION['cart'][$key]);
        }

        //close connection
        mysqli_close($link);

    }

?>