<?php
    session_start();
    require './db_inc.php';
    require './account_class.php';
                 
    $account = new Account();
    $login = FALSE;

    try
    {
        $login = $account->sessionLogin();
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        die();
    }

    $account->logout();
    header("Location: user_auth.php");
    die();