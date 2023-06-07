<?php

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "smartlab"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) { 
	die("Connection failed: " . mysqli_connect_error()); 
} 

echo "Database connection is OK<br>"; 

if(isset($_POST["ampere"]) && isset($_POST["voltage"]) && isset($_POST["watt"])) {

	$a = $_POST["ampere"];
	$v = $_POST["voltage"];
    $w = $_POST["watt"];
	$ru = "2";

	$sql = "INSERT INTO energies (ampere, voltage, watt, ruangan) VALUES (".$a.", ".$v.", ".$w.", ".$ru.")"; 

	if (mysqli_query($conn, $sql)) { 
		echo "\nNew record created successfully"; 
	} else { 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
	}
}

?>