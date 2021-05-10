<?php
include_once('AppData/Models/User.php');

//Check if have code then if matches.
if(isset($_GET['confirmationCode']))
{
    $confirmationCode = $_GET['confirmationCode'];

    // connect to database
    $link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

    // find data in table
    $query = "SELECT * FROM Users WHERE confirmationCode = '$confirmationCode'";
    $result = mysqli_query($link, $query);

    //Code matches!  Confirm account
    if($result->num_rows != 0)
    {

        $query = "UPDATE Users SET confirmationCode = NULL WHERE confirmationCode = '$confirmationCode'";
        $result = mysqli_query($link, $query);

        //close connection
        mysqli_close($link);
        
        //Check if still needs to be confirmed.
        header("Location: http://Censored - mySQL Server/~Censored/Login.php?confirm=True");
    }
    else header("Location: http://Censored - mySQL Server/~Censored/Login.php?confirm=False");
}

?>