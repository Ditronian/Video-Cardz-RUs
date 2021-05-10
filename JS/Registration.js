function validateRegistration()
{
    var email = document.forms["registrationForm"]["email"].value;
    var pw = document.forms["registrationForm"]["password"].value;
    var cpw = document.forms["registrationForm"]["confirmPassword"].value;

    if (pw != cpw) 
    {
        alert("Passwords do not match");
        return false;
    }

    if (!email.includes("@"))
    {
        alert("Invalid email address entered");
        return false;
    }
}