<?php

include 'connection.php';
 
$salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
$employeeid = $_GET["employeeid"];  
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$telephone = $_POST['telephone'];
$email = $_POST['email']; 
$login = $_POST['login'];
$password = $_POST['password'];

$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$telephone = mysql_real_escape_string($telephone);
$email = mysql_real_escape_string($email);
$login = mysql_real_escape_string($login);
$password = mysql_real_escape_string($password);

if (isset($_POST['save'])) {

$sql = "UPDATE employee SET FirstName = :fname, LastName = :lname, telephone = :telephone, Email= :email, login = :login, password = :password 
where EmployeeID = :employeeid";

$statement = $conn -> prepare($sql);

$statement -> bindValue(':fname', $firstname);
$statement -> bindValue(':lname', $lastname);
$statement -> bindValue(':telephone', $telephone);
$statement -> bindValue(':email', $email);
$statement -> bindValue(':login', $login);
$statement -> bindValue(':employeeid', $employeeid);
$statement -> bindValue( ':password', hash("sha256", $password . $salt), PDO::PARAM_STR );
$queryComplete = $statement->execute();
}

else if (isset($_POST['delete'])) {
	
	$sql = "delete from employee 
	where EmployeeID = :employeeid";
	$statement = $conn -> prepare($sql);
	
	$statement -> bindValue(':employeeid', $employeeid);
	
	$queryComplete = $statement->execute();
}

if ($queryComplete){
	header( "refresh:3;url=empSearch.php?firstname="."$firstname"."&lastname="."$lastname");
	echo "<h1>You will be redirected in 3 seconds.  <br>  You have updated an employee in the database, their name is $firstname $lastname , and number $telephone, with email $email</h1>";
} else {
    echo "Error: " .$sql. "<br>" . "PDO::errorInfo():\n";
	print_r($conn->errorInfo());
}

	

?>