<?php

 class Users {
	 public $firstname = null;
	 public $lastname = null;
	 public $email = null;
	 public $telephone = null;
	 public $username = null;
	 public $password = null;
	 public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
	 
	 public function __construct( $data = array() ) {
		 if( isset( $data['firstname'] ) ) $this->firstname = stripslashes( strip_tags( $data['firstname'] ) );
		 if( isset( $data['lastname'] ) ) $this->lastname = stripslashes( strip_tags( $data['lastname'] ) );
		 if( isset( $data['telephone'] ) ) $this->telephone = stripslashes( strip_tags( $data['telephone'] ) );
		 if( isset( $data['email'] ) ) $this->email = stripslashes( strip_tags( $data['email'] ) );
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
			$sql = "SELECT * FROM employee WHERE login = :username AND password = :password LIMIT 1;";
			$stmt = $conn->prepare( $sql );
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();
			#echo $this->password;
			$valid = $stmt->fetchColumn();
			
			if( $valid ) {
				$success = true;
				session_start();
				$_SESSION["logged_in"] = true;
				$_SESSION["user_name"] = $this->username;
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
				$sql = "INSERT INTO employee
				(FirstName, LastName, telephone, Email, login, password) 
				VALUES(:firstname, :lastname, :telephone, :email, :username, :password)";
				
				$stmt = $conn->prepare( $sql );
				$stmt->bindValue( "firstname", $this->firstname, PDO::PARAM_STR );
				$stmt->bindValue( "lastname", $this->lastname, PDO::PARAM_STR );
				$stmt->bindValue( "telephone", $this->telephone, PDO::PARAM_STR );
				$stmt->bindValue( "email", $this->email, PDO::PARAM_STR );
				$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->execute();
				return "Employee Added; back to <a href='admin.php'>admin</a>";
			}
			catch( PDOException $e ) {
				return $e->getMessage();
			}
	 }
	 
 }
 
?>