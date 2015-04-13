<?php

 class Users {
	 public $oldusername = null;
	 public $username = null;
	 public $password = null;
	 public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
	 
	 public function __construct( $data = array() ) {
		 if( isset( $data['oldusername'] ) ) $this->oldusername = stripslashes( strip_tags( $data['oldusername'] ) );
		 if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		 if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
		 
		 
		 #echo hash("sha256", $this->password . $this->salt);
	 }
	 
	 
	 
	 public function storeFormValues($postvars) {
		//store the parameters
		$this->__construct($postvars); 
	 }
	 
	 public function userLogin() {
		 
		 $success = false;
		 
		 try{
			$hostname = "localhost";
			$dbname = "coffee";
			$user = "user";
			$pw = "root";
			$connstr = "mysql:host=$hostname;dbname=$dbname";
			$conn = new PDO($connstr,$user,$pw); 
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "SELECT * FROM admin WHERE login = :username AND password = :password LIMIT 1;";
			$stmt = $conn->prepare( $sql );
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();
			#echo $this->password;
			$valid = $stmt->fetchColumn();
			
			if( $valid ) {
				$success = true;
				$_SESSION["admin_logged_in"] = true;
			}
			
			$conn = null;
			return $success;
			
			} #end try
			catch (PDOException $e) {
				echo $e->getMessage();
				return $success;
			}
			
			
	 }
	 
	 public function register() {
		$correct = false;
			try {
				$hostname = "localhost";
				$dbname = "coffee";
				$user = "user";
				$pw = "root";
				$connstr = "mysql:host=$hostname;dbname=$dbname";
				$conn = new PDO($connstr,$user,$pw); 
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$sql = "update admin set login=:username, password=:password where login=:oldusername;";
				$stmt = $conn->prepare( $sql );
				
				$stmt->bindValue( "oldusername", $this->oldusername, PDO::PARAM_STR );
				$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->execute();
				return "Admin Login Changed: back to admin <a href='adminlogin.php'>login</a>";
			}
			catch( PDOException $e ) {
				return $e->getMessage();
			}
	 }
	 
 }
 
?>