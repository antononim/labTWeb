<?php

if (empty($_POST['username'])) {
	echo "empty_body";
	exit;
}

// echo $_POST['pineapples'];

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbName = "users.users";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	echo "Err connecting";
	exit;
}

$sql_line = "UPDATE " .$dbName. " SET pineapples='" . $_POST['pineapples']. "', ppc='" .$_POST['ppc']. "', pps='" .$_POST['pps']. "' WHERE (username='".$_POST["username"]."' and password='".$_POST["password"]."');";
// echo $sql_line;

$result = $conn->query($sql_line);

$conn->close();

echo "success";

?>