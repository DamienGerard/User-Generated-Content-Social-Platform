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
                    
    if ($login)
    {
        $query = 'SELECT * FROM webprojectdatabase.user WHERE (user_id=:id)';
        $values = array(':id'=>$account->getId());
        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $self_description = $row['self_description'];
        $dob = $row['DOB'];
        $education = $row['education'];
        $profile_pic1 = $row['profile_pic'];
    }
    else
    {
        //echo "<script>window.location.href='index.php';</script>";
        //die();
    }
?>