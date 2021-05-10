<?php
    include_once('AppData/Models/User.php');
    if(!isset($_SESSION['user']))
    {
        //Do nothing, maybe display a message.  Realistically this should be done by the JS though.
        header("Location: Location: ../../Login.php?error=auth");
    }

    $user = unserialize($_SESSION['user']);

    if($user->confirmationCode != null)
    {
        $_SESSION['confirmUser'] = serialize($user);
        header("Location: Location: ../../Confirm.php");
    }
?>