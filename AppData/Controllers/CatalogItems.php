<?php

$catalog = array();

// connect to database
$link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

// find data in table
$query = "SELECT * FROM Items";
$result = mysqli_query($link, $query);

if($result->num_rows != 0)
{

    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
    {
        $item = new Item($line["itemID"], $line["itemName"], $line["price"], $line["description"], $line["imageLocation"], $line["manufacturer"], $line["rating"]);
        array_push($catalog, $item);
    }

    //Free result set
    mysqli_free_result($result);

    //close connection
    mysqli_close($link);
        
}

//Add an item to the html foreach item in the catalog
foreach ($catalog as $item){
    echo "<div id=\"$item->id\" class=\"grid-item\" onclick=\"addToCartAJAX(this, '$item->name')\"  style=\"overflow: hidden;\">    
    <div class=\"upperDiv\">
        <img src=\"Images/$item->imageLocation\">
    </div>
    <div class=\"bottomDiv\">
        $item->name - $item->manufacturer
        <br>
        $$item->price
    </div>
    </div>";
}
?>