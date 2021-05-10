let queryString = (new URL(document.location)).searchParams;
let success = queryString.get("success");
let confirm = queryString.get("confirm");
let error = queryString.get("error");

if(success == "True") window.onload = function()
{
    alert("Account Creation successful!");
}

if(confirm == "True") window.onload = function()
{
    alert("Account Confirmation successful!");
}
else if(confirm == "False") window.onload = function()
{
    alert("Account Confirmation failed!");
}

if(success == "False") window.onload = function()
{
    alert("Account Creation failed!");
}

if(error == "badPW") alert("Invalid password!");
if(error == "noEmail") alert("Entered email not found.");
if(error == "auth") alert("You are not authorized to access this page.  Please login or create an account.");
if(error == "confirm") alert("You must be logged in to send a confirmation email.");