<?php

include 'connection.php';
  

$searchString = $_POST['searchString'];


$sql = "select CustomerID, FirstName, LastName, telephone, Points from customertest 
where CONCAT(FirstName, ' ', LastName) like '%$searchString%' 
or LastName like '%$searchString%' 
or telephone like '$searchString%'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table>";
    while($row = $result->fetch_assoc()) {
        echo 
		"<tr><td><a href='freebies.php?customerid=".$row['CustomerID']."'>" . $row["FirstName"] .  ",</a></td>" 
		. 
		"<td><a href='freebies.php?customerid=".$row['CustomerID']."'>" . $row["LastName"]. ",</a></td>" 
		.
		"<td><a href='freebies.php?customerid=".$row['CustomerID']."'>" . $row["telephone"]. ",</a></td>"
		.
		"<td><a href='freebies.php?customerid=".$row['CustomerID']."'> Points: " . $row["Points"] . "</a></td>"
		.
		"<td><a href='AdminEditCustomer.php?customerid=".$row['CustomerID']."'>Edit</a></td></tr>";
    }
	echo "</table>";
} 
else {
    echo "0 results";
}

$conn->close();
?>