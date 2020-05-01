<?php
    session_start();
    require './db_inc.php';
    require './adminAccount_class.php';
                 
    $adminAccount = new Admin();
    $adminLogin = FALSE;

    try
    {
        $adminLogin = $adminAccount->sessionLogin();
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        die();
    }

    $adminAccount->logout();
    header("Location: ../index.php");
    die();