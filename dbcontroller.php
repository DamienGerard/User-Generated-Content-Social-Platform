<?php
class DBController {
	public $conn = "";
	private $host = "localhost";
	private $user = "root";
	private $password = "thisisapassword";
	private $database = "webprojectdatabase";

	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->conn = $conn;			
		}
	}

	function connectDB() {
		$host = $this->host;
		$database = $this->database;
		$user = $this->user;
		$password = $this->password;
		try
		{
 			$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
 			return $conn;
		}
		catch(PDOException $e)
 		{
    		echo  "<br>" . $e->getMessage();
 		}
	}

	function executeQuery($query, $data) {
        try{
        	
        	$stmt = $this->conn->prepare($query);
			$result = $stmt->execute($data);
        	$affectedRows = $stmt->rowCount();
			return $affectedRows;
        }
        catch(PDOException $e)
 		{
    		echo  "<br>" . $e->getMessage();
 		}	        		
        
	}
    
    
	function executeSelectQuery($query) {
		return $this->conn->query($query);
	}
    
	function executeSelectQuery_data($query, $data):PDOStatement {
        try{
        	$stmt = $this->conn->prepare($query);
			$stmt->execute($data);
			return $stmt;
        }
        catch(PDOException $e)
 		{
    		echo  "<br>" . $e->getMessage();
 		}
	}
}
?>
