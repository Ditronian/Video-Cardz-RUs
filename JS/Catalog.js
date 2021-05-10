//Preserve any values
window.onload = function() 
{
  var url = new URLSearchParams(window.location.search);

  if(url.has('rating')) document.getElementById('rating'+url.get('rating')).checked = true;
  if(url.get('minPrice') != "") document.getElementById('minPriceBox').value = url.get('minPrice');
  if(url.get('maxPrice') != "") document.getElementById('maxPriceBox').value = url.get('maxPrice');
  if(url.get('search') != "") document.getElementById('searchBox').value = url.get('search');

  if(url.has('sortBy')) document.getElementById('sortBy').value = url.get('sortBy');

  if(url.has('asus')) document.getElementById('asus').checked = true;
  if(url.has('evga')) document.getElementById('evga').checked = true;
  if(url.has('msi')) document.getElementById('msi').checked = true;
  if(url.has('pny')) document.getElementById('pny').checked = true;
  if(url.has('gigabyte')) document.getElementById('gigabyte').checked = true;
  if(url.has('zotac')) document.getElementById('zotac').checked = true;
}

function validateFilter()
{
    var min = parseInt(document.forms["filterForm"]["minPrice"].value);
    var max = parseInt(document.forms["filterForm"]["maxPrice"].value);

    if (min > max) 
    {
        alert("Price minimum must be less than or equal to the price maximum!"  + min + " " +max);
        return false;
    }
}

//Adds the item number to the cart session using AJAX.  In practice I will add an item object.
function addToCartAJAX(item, itemName) {
      var itemId = item.id;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(itemName+" added to cart!");
        }
      };
      xmlhttp.open("GET", "AppData/Controllers/AddToCart.php?item=" + itemId, true);
      xmlhttp.send();

    //Increment the Shopping Cart Icon's number since the above was via ajax.
    var cartNumber = document.getElementById("itemNumber");
    var number = parseInt(cartNumber.innerHTML);
    cartNumber.textContent = ++number;    
  }