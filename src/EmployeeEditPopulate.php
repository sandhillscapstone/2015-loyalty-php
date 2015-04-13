<?php

include 'connection.php';
  
$employeeid = $_GET['employeeid'];
  



$sql = "select FirstName, LastName, telephone, Email, login, password from employee where EmployeeID = :employeeid;";

$statement = $conn -> prepare($sql);
$statement -> bindValue(':employeeid', $employeeid);
$queryComplete = $statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row){}

?>