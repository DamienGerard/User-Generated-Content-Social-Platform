<?php
ob_start();
    session_start();

    require 'db_inc.php';
    require 'adminAccount_class.php';

    $account = new Admin();
    $admin_login = FALSE;

    try
    {
        $admin_login = $account->login($_POST['username'], $_POST['password']);
    }
    catch (Exception $e)
    {
        echo $e;
        die();
    }
    if($admin_login){
        echo "<script>window.location.href='../index.php';</script>";
    }else{
        echo "<script>window.location.href='admin_login.php';</script>";
    }
    
    
                