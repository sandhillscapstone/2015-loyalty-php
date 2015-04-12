<?php
$salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
$hostname = "localhost";
$dbname = "coffee";
$user = "user";
$pw = "root";
$connstr = "mysql:host=$hostname;dbname=$dbname";
$conn = new PDO($connstr,$user,$pw); 
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sql = "INSERT INTO employee
(login, password) 
VALUES(:username, :password)";
$stmt = $conn->prepare( $sql );
$stmt->bindValue( "username", "user", PDO::PARAM_STR );
$stmt->bindValue( "password", hash("sha256", "user" . $salt), PDO::PARAM_STR );
$stmt->execute();
?>