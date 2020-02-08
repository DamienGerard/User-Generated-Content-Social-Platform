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
        $query = "SELECT user.user_type,user.user_name FROM webprojectdatabase.user WHERE user.user_id =".$account->getId();
        
        try {
            $res = $pdo->prepare($query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 
        $row = $res->fetch();
        $user = $row['user_name'];
        $type = $row['user_type'];
        if($type=="admin"){
            echo "<script>window.location.href='admin.php?user=$user&type=$type';</script>";
        }
        if($type=="user"){
            echo "<script>window.location.href='user_profile.php?user=$user&type=$type';</script>";
        }
        
        die();
    }
    else
    {
        echo "<script>window.location.href='user_auth.php';</script>";
        die();
    }
?>