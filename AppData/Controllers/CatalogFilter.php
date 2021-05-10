<?php
//Set Default filters
$rating = 1;
$minPrice = 0.0;
$maxPrice = 1000000.0;
$sortBy = "price";
$search = NULL;

//Grab filters from post - If I wanted to expand this there is probably some potential for sql injection with this.  Don't feel like fixing properly rn.
if(isset($_GET["rating"])) $rating = $_GET["rating"];
if(isset($_GET["minPrice"]) && $_GET["minPrice"] != "") (float) $minPrice = $_GET["minPrice"];
if(isset($_GET["maxPrice"]) && $_GET["maxPrice"] != "") (float) $maxPrice = $_GET["maxPrice"];
if(isset($_GET["search"]) && $_GET["search"] != "") $search = $_GET["search"];
if(isset($_GET["sortBy"]) && ($_GET["sortBy"] == "itemName" || $_GET["sortBy"] == "price" || $_GET["sortBy"] == "manufacturer")) $sortBy = $_GET["sortBy"]; //Ensure no bad sql
$asus = $_GET["asus"];
$evga = $_GET["evga"];
$gigabyte = $_GET["gigabyte"];
$msi = $_GET["msi"];
$pny = $_GET["pny"];
$zotac = $_GET["zotac"];

//Make array of manufacturers so I can use a for loop later.
$manufacturers = array();
if($asus) array_push($manufacturers, 'Asus');
if($evga) array_push($manufacturers, 'EVGA');
if($gigabyte) array_push($manufacturers, 'Gigabyte');
if($msi) array_push($manufacturers, 'MSI');
if($pny) array_push($manufacturers, 'PNY');
if($zotac) array_push($manufacturers, 'Zotac');

$catalog = array();

// connect to database
$link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

// find data in table
$query = "SELECT * FROM Items WHERE rating >= $rating AND price >= $minPrice AND price <= $maxPrice";
if(isset($search)) $query.=" AND itemName LIKE '%{$search}%'";

//Handle manufacturers if there are any.
if(count($manufacturers) > 0) 
{
    $query.=" AND (";
    //For each manufacturer
    for($i = 0; $i < count($manufacturers);$i++) 
    {
        $name = $manufacturers[$i];
        $query.="manufacturer = '$name'";
        //Check if last manufacturer, if not add OR
        if($i < count($manufacturers)-1) $query.= " OR ";
    }
    $query.=")";
}

$query.=" ORDER BY $sortBy ASC";

//Test display query
//echo "<div>$query</div>";

$result = mysqli_query($link, $query);

if($result->num_rows != 0)
{
    include('../Models/Item.php');

    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
    {
        $item = new Item($line["itemID"], $line["itemName"], $line["price"], $line["description"], $line["imageLocation"], $line["manufacturer"], $line["userRating"]);
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