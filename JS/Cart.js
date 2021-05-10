//Removes the item from the cart session using AJAX.
function removeFromCartAJAX(item) {
    var itemId = item.id;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          alert("Item "+itemId+" removed from cart!");
          location.reload();
      }
    };
    xmlhttp.open("GET", "AppData/Controllers/RemoveFromCart.php?item=" + itemId, true);
    xmlhttp.send();
}

//Contacts the php and tells it to move all items from the cart to the confirmed orders.  Realistically the DB should be
function checkoutAJAX() {
  var agree = confirm("Are you sure you wish to make this purchase for "+document.getElementById('subtotal').innerText+"?");
  if(agree)
  {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert("Order Complete!");
        window.location.href = "Orders.php";
      }
    };
    xmlhttp.open("GET", "AppData/Controllers/Checkout.php", true);
    xmlhttp.send();
  }
}