<?php

class Account{
	
	private $id;
	
	private $name;

	private $authenticated;

	public function __construct(){
		$this->id = 0;
		$this->name = NULL;
		$this->authenticated = FALSE;
	}
    
    public function addAccount(string $name, string $passwd, string $fname, string $lname, string $self_desc, string $dob, string $profile_path, string $education): int{
        global $pdo;
        
        $name = trim($name);
        $passwd = trim($passwd);
        
        if (!$this->isNameValid($name)){
            throw new Exception('Invalid user name');
        }
        
        if (!$this->isPasswdValid($passwd)){
            throw new Exception('Invalid password');
        }
        
        if (!is_null($this->getIdFromName($name))){
            
            throw new Exception('User name not available');
        }
        
        $query = 'INSERT INTO webprojectdatabase.user (user_name, user_password, f_name, l_name, profile_pic, self_description, DOB, education) VALUES (:name, :passwd, :fname, :lname, :ppic, :descp, :dob, :edu)';
        
        $hash = password_hash($passwd, PASSWORD_DEFAULT);
        
        $values = array(':name' => $name, ':passwd' => $hash, ':fname' => $fname, ':lname' => $lname, ':ppic' => $profile_path, ':descp' => $self_desc, ':dob' => $dob, ':edu' => $education);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
        
        return $pdo->lastInsertId();
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

    public function getIdFromName(string $name): ?int{
        global $pdo;
        
        if (!$this->isNameValid($name)){
            throw new Exception('Invalid user name');
        }
        
        $id = NULL;
        
        $query = 'SELECT user_id FROM webprojectdatabase.user WHERE (user_name = :name)';
        $values = array(':name' => $name);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e) {
            throw new Exception('\nDatabase query error at 154\n');
        }
        
        $row = $res->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($row)){
            $id = intval($row['user_id'], 10);
        }
        
        return $id;
    }


    public function deleteAccount(int $id){
        global $pdo;
        
        if (!$this->isIdValid($id)){
            throw new Exception('Invalid account ID');
        }
        
        $query = 'DELETE FROM webprojectdatabase.user WHERE user_id = :id';
        
        $values = array(':id' => $id);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }

        $query = 'DELETE FROM webprojectdatabase.account_sessions WHERE (account_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
    }

    public function adminLogin(string $name, string $passwd): bool{
        global $pdo;	
        
        $name = trim($name);
        $passwd = trim($passwd);
        
        if (!$this->isNameValid($name)){
            return FALSE;
        }
        
        if (!$this->isPasswdValid($passwd)){
            return FALSE;
        }
        
        $query = 'SELECT * FROM webprojectdatabase.admin WHERE (admin_name = :name)';
        
        $values = array(':name' => $name);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
        
        $row = $res->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($row) && password_verify($passwd, $row['admin_password'])){
            $this->id = intval($row['admin_id'], 10);
            $this->name = $name;
            $this->authenticated = TRUE;
            
            $this->registerLogin();
            
            return TRUE;
        }
        
        return FALSE;
    }

    public function login(string $name, string $passwd): bool{
        global $pdo;	
        
        $name = trim($name);
        $passwd = trim($passwd);
        
        if (!$this->isNameValid($name)){
            return FALSE;
        }
        
        if (!$this->isPasswdValid($passwd)){
            return FALSE;
        }
        
        $query = 'SELECT * FROM webprojectdatabase.user WHERE (user_name = :name) AND (user_enabled = 1)';
        
        $values = array(':name' => $name);
        
        try{
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
        
        $row = $res->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($row) && password_verify($passwd, $row['user_password'])){
            $this->id = intval($row['user_id'], 10);
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
            $query = 'REPLACE INTO webprojectdatabase.account_sessions (session_id, account_id, login_time) VALUES (:sid, :accountId, NOW())';
            $values = array(':sid' => session_id(), ':accountId' => $this->id);
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
        }
    }

    public function adminsessionLogin(): bool{
        global $pdo;
        
        if (session_status() == PHP_SESSION_ACTIVE){
            $query = 'SELECT * FROM webprojectdatabase.account_sessions, webprojectdatabase.admin WHERE (account_sessions.session_id = :sid) AND (account_sessions.login_time >= (NOW() - INTERVAL 7 DAY)) AND (account_sessions.account_id = admin.admin_id)';
            
            $values = array(':sid' => session_id());
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
            
            $row = $res->fetch(PDO::FETCH_ASSOC);
            
            if (is_array($row)){
                $this->id = intval($row['account_id'], 10);
                $this->name = $row['admin_name'];
                $this->authenticated = TRUE;
                
                return TRUE;
            }
        }
        return FALSE;
    }

    public function sessionLogin(): bool{
        global $pdo;
        
        if (session_status() == PHP_SESSION_ACTIVE){
            $query = 'SELECT * FROM webprojectdatabase.account_sessions, webprojectdatabase.user WHERE (account_sessions.session_id = :sid) AND (account_sessions.login_time >= (NOW() - INTERVAL 7 DAY)) AND (account_sessions.account_id = user.user_id) AND (user.user_enabled = 1)';
            
            $values = array(':sid' => session_id());
            
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
            
            $row = $res->fetch(PDO::FETCH_ASSOC);
            
            if (is_array($row)){
                $this->id = intval($row['account_id'], 10);
                $this->name = $row['user_name'];
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
            $query = 'DELETE FROM webprojectdatabase.account_sessions WHERE (session_id = :sid)';
            
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