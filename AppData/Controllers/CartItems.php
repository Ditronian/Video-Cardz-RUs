<?php
$totalPrice = 0.00;

//If There is a cart
if(isset($_SESSION['cart']))
{
    //Create an entry foreach item in cart
    foreach ($_SESSION['cart'] as $item){
        echo "
                <div id=\"$item->id\" class=\"orders\">&nbsp
                    <div class=\"ordersLeft\"><img src=\"Images/$item->imageLocation\"></div>
                    <div class=\"ordersRight\">
                        <b>Item Name: </b>$item->name<br>
                        <b>Manufacturer: </b>$item->manufacturer<br>
                        <b>Price: </b>$".number_format($item->price, 2)."<br>
                        <button class=\"removeBtn w3-red\" onclick=\"removeFromCartAJAX(this.parentElement.parentElement)\">Remove</button>
                    </div>
                </div>
                ";

        $totalPrice += $item->price;
    }

}

echo    "<div id=\"bottomCalculation\">
            <br>
            Subtotal: <span id=subtotal>$".number_format($totalPrice, 2)."</span>
            <button class=\"w3-btn w3-blue\" onclick=\"checkoutAJAX()\">Checkout</button>
        </div>";

?>