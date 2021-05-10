let queryString = (new URL(document.location)).searchParams;
let success = queryString.get("success");

if(success == "True") window.onload = function()
{
    alert("Account Updated successfully!");
}

if(success == "False") window.onload = function()
{
    alert("Account Update failed :(");
}

function validateUpdate()
{
    var email = document.forms["updateInformation"]["email"].value;
    var pw = document.forms["updateInformation"]["password"].value;
    var cpw = document.forms["updateInformation"]["confirmPassword"].value;

    //Check if we are updating anything at all
    if(email == "" && pw == "" && cpw == "")
    {
        alert("No changes were entered.");
        return false;
    }

    //Check if passwords match
    if (pw != cpw) 
    {
        alert("Passwords do not match");
        return false;
    }

    //If Updating Email, check if formatted right
    if (email != "" && !email.includes("@"))
    {
        alert("Invalid email address entered");
        return false;
    }
}