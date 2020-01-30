<?php
ob_start();
    session_start();

    require './db_inc.php';
    require './account_class.php';

    $account = new Account();
    $login = FALSE;

    try
    {
        $login = $account->login($_POST['username'], $_POST['password']);
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        die();
    }
    
    if ($login)
    {
        $query = "SELECT user.user_name FROM webprojectdatabase.user WHERE user.user_id =".$account->getId();
        
        try {
            $res = $pdo->prepare($query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 
        $user = $res->fetch()['user_name'];
        echo "<script>window.location.href='user_profile.php?user=$user';</script>";
        die();
    }
    else
    {
        echo "<script>window.location.href='user_auth.php';</script>";
        die();
    }
                