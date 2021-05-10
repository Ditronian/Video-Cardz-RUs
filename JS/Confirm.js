//Removes the item from the caret session using AJAX.
function resendConfirmation() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          alert("Confirmation Email Sent!  Please check your email address.");
      }
    };
    xmlhttp.open("GET", "AppData/Controllers/SendConfirmation.php", true);
    xmlhttp.send();
}