<?php
    if(session_status()!==PHP_SESSION_ACTIVE){
        session_start();
    }
    require 'db_inc.php';
    require 'adminAccount_class.php';
                 
    $adminAccount = new Admin();
    $adminLogin = FALSE;

    try
    {
        $adminLogin = $adminAccount->sessionLogin();
    }
    catch (Exception $e)
    {
        echo $e;
        die();
    }
                    
    if ($adminLogin) {
        $adminId = $adminAccount->getId();
    }
?>