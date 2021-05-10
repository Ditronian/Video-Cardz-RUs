<?php
    include('../Models/User.php');
    session_start();

    //Grab email from post, and add as session variable.  In practice this will be a USER object created from a DB interaction
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    
    $options = ['cost' => 12,];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
    $confirmationCode = uniqid();

    $user = new User($first, $last, $email, $password, $confirmationCode);

    // connect to database
    $link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

    // find data in table
    // insert new data into table
    $query = "INSERT INTO Users (firstName, lastName, emailAddress, password, confirmationCode) VALUES ('$first', '$last', '$email', '$password', '$confirmationCode')";
    $result = mysqli_query($link, $query);

    //Redirect to login page, with a msg corresponding to the success or failure.
    if($result)
    {
        $_SESSION['confirmUser'] = serialize($user);
        include('SendConfirmation.php');
        header("Location: ../../Confirm.php");
    }
    else if (!$result) header("Location: ../../Login.php?success=False");
    
?>