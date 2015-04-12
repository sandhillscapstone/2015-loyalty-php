<?php

include 'connection.php';
  

$searchString = $_POST['searchString'];
$searchString = "%".$searchString."%";


$sql = "select EmployeeID, FirstName, LastName, telephone, Email, login, password from employee
where CONCAT(FirstName, ' ', LastName) like :searchString 
or LastName like :searchString";


$statement = $conn -> prepare($sql);
$statement -> bindValue(':searchString', $searchString,PDO::PARAM_STR);


$queryComplete = $statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($queryComplete){
	echo"<table>";	
		foreach($rows as $row){

        echo 
		"<tr><td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'>" . $row["FirstName"] .  ",</a></td>" 
		. 
		"<td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'>" . $row["LastName"]. ",</a></td>" 
		.
		"<td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'>" . $row["telephone"]. ",</a></td>"
		.
		"<td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'> Email: " . $row["Email"] . "</a></td>"
		.
		"<td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'> Login: " . $row["login"] . "</a></td>"
		.
		"<td><a href='AdminEditEmployee.php?employeeid=".$row['EmployeeID']."'>Edit</a></td></tr>";
    }
	echo "</table>";

} 
else {
    echo "0 results";
}
?>