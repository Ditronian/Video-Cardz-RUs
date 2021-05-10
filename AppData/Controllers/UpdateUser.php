<?php
    include('../Models/User.php');
    session_start();

    //Grab email from post, and add as session variable.  In practice this will be a USER object created from a DB interaction
    $email = $_POST["email"];
    
    $options = ['cost' => 12,];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
    $userID = unserialize($_SESSION['user'])->userID;

    // connect to database
    $link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

    // Update the user information in the table
    $query1 = "UPDATE Users SET emailAddress = '$email', password = '$password' WHERE userID = $userID";
    $result1 = mysqli_query($link, $query1);

    // Grab new data from DB and update session User
    $query2 = "SELECT * FROM Users WHERE emailAddress = '$email'";
    $result2 = mysqli_query($link, $query2);

    if($result2->num_rows != 0)
    {
        $row = $result2->fetch_assoc();
        $user = new User($row["firstName"], $row["lastName"], $row["emailAddress"], $row["password"], $row["userID"]);
        $_SESSION['user']=serialize($user);
        $_SESSION['email']=$email;

        header("Location: http://Censored - mySQL Server/~Censored/Profile.php?success=True");
    }

    else
    {
        header("Location: http://Censored - mySQL Server/~Censored/Profile.php?success=False");
    }

    

?>