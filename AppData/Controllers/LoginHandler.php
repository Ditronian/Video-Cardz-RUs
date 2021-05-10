<?php
    //Required on all pages for some reason.
    session_start();

    //Grab email from post, and add as session variable.  In practice this will be a USER object created from a DB interaction
    $email = $_POST["email"];
    $options = ['cost' => 12,];
    $password = $_POST["password"];
    
    // connect to database
    $link=mysqli_connect("Censored - mySQL Server", "Censored", "Censored", "Censored") or die('Could not connect ');

    // find data in table
    $query = "SELECT * FROM Users WHERE Users.emailAddress = '$email'";
    $result = mysqli_query($link, $query);

    if($result->num_rows != 0)
    {
        include('../Models/User.php');

        $row = $result->fetch_assoc();
        $user = new User($row["firstName"], $row["lastName"], $row["emailAddress"], $row["password"], $row["confirmationCode"], $row["userID"]);

        if(password_verify($password, $user->getPassword()))
        {
            $_SESSION['user']=serialize($user);
            $_SESSION['email']=$email;
            //If cart does not exist, create one.
            if(!isset($_SESSION['cart']))
            {
                $cart = array();
                $_SESSION['cart']=$cart;
            }

            //Free result set
            mysqli_free_result($result);

            //close connection
            mysqli_close($link);
            
            //Check if still needs to be confirmed.
            if($user->confirmationCode != null) 
            {
                $_SESSION['confirmUser'] = serialize($user);
                header("Location: ../../Confirm.php");
            }
            //Redirect to home page as is logged in.
            else header("Location: ../../Home.php");
        }

        else
        {
        //Free result set
        mysqli_free_result($result);

        //close connection
        mysqli_close($link);

        //Redirect to home page as is logged in.
        header("Location: http://Censored - mySQL Server/~Censored/Login.php?error=badPW");
        }
    }
    else
    {
        //Free result set
        mysqli_free_result($result);

        //close connection
        mysqli_close($link);

        //Redirect to home page as is logged in.
        header("Location: http://Censored - mySQL Server/~Censored/Login.php?error=noEmail");
    }




?>