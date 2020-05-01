<?php

class Admin{
    private $id;
        
    private $name;

    private $authenticated;

    public function __construct(){
        $this->id = 0;
        $this->name = NULL;
        $this->authenticated = FALSE;
    }

    public function getId():int{
        return $this->id;
    }

    public function getName():string{
        return $this->name;
    }

    public function isNameValid(string $name): bool{
        $valid = TRUE;
        
        $len = mb_strlen($name);
        
        if (($len < 8) || ($len > 16)){
            $valid = FALSE;
        }
                
        return $valid;
    }

    public function isPasswdValid(string $passwd): bool{
        $valid = TRUE;
        
        $len = mb_strlen($passwd);
        
        if (($len < 8) || ($len > 16)){
            $valid = FALSE;
        }
                
        return $valid;
    }


    public function login(string $name, string $passwd): bool{
        global $pdo;	
        
        $name = trim($name);
        $passwd = trim($passwd);
        
        if (!$this->isNameValid($name)){
            //return FALSE;
        }
        
        if (!$this->isPasswdValid($passwd)){
            //return FALSE;
        }
        
        $query = 'SELECT * FROM webprojectdatabase.admin WHERE (admin_name = :name)';
        
        $values = array(':name' => $name);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw  $e;
        }
        
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) && password_verify($passwd, $row['admin_password'])){
            $this->id = intval($row['admin_id'], 10);
            $this->name = $name;
            $this->authenticated = TRUE;
            $this->registerLoginSession();
            
            return TRUE;
        }
        
        return FALSE;
    }

    private function registerLoginSession(){
        global $pdo;
        
        if (session_status() == PHP_SESSION_ACTIVE){
            $query = 'REPLACE INTO webprojectdatabase.admin_sessions (session_id, account_id, login_time) VALUES (:sid, :accountId, NOW())';
            $values = array(':sid' => session_id(), ':accountId' => $this->id);
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw $e;
            }
        }
    }

    public function sessionLogin(): bool{
        global $pdo;
        
        if (session_status() == PHP_SESSION_ACTIVE){
            $query = 'SELECT * FROM webprojectdatabase.admin_sessions, webprojectdatabase.admin WHERE (admin_sessions.session_id = :sid) AND (admin_sessions.login_time >= (NOW() - INTERVAL 7 DAY)) AND (admin_sessions.account_id = admin.admin_id)';
            
            $values = array(':sid' => session_id());
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw $e;
            }
            
            $row = $res->fetch(PDO::FETCH_ASSOC);
            //var_dump($row);
            //die();
            if (is_array($row)){
                $this->id = intval($row['account_id'], 10);
                $this->name = $row['admin_name'];
                $this->authenticated = TRUE;
                
                return TRUE;
            }
        }
        return FALSE;
    }

    public function logout(){
        global $pdo;	
        
        if (is_null($this->id)){
            return;
        }
        
        $this->id = NULL;
        $this->name = NULL;
        $this->authenticated = FALSE;
        
        if (session_status() == PHP_SESSION_ACTIVE){
            $query = 'DELETE FROM webprojectdatabase.admin_sessions WHERE (session_id = :sid)';
            
            $values = array(':sid' => session_id());
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
        }
    }
}


