<?php
try {
    $hostname = "localhost";
    $dbname = "coffee";
    $username = "user";
    $pw = "root";
    $connstr = "mysql:host=$hostname;dbname=$dbname";
	$conn = new PDO($connstr,$username,$pw);
	} 
	catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
	}
?>