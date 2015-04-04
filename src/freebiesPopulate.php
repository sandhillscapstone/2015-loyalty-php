<?php

include 'connection.php';

$customerid = $_GET['customerid'];
  

$sql = "select CustomerID, FirstName, LastName, Points, telephone, Email, Points from customertest where CustomerID = '$customerid';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>