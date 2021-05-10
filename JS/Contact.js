let queryString = (new URL(document.location)).searchParams;
let success = queryString.get("success");

if(success == "True") window.onload = function()
{
    alert("Email Sent Successfully!");
}

function sendMessage()
{
    alert("Message Sent!");
}