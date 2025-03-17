<?php
// if ( empty($_POST['nickname']) || empty($_POST['password']) ) {
// 	print("Error 420");
// 	exit;
// }
// if ( $_POST['nickname'] == "admin" ) {
// 	session_start();
// 	$_SESSION['nickname'] = $_POST['nickname'];
// }

/*
	Login request: GET 
*/

if ( empty($_GET['username']) || empty($_GET['password']) ) {
	echo "Error: provide username and password";
	exit;
}

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbName = "users.users";

// Create connection
$conn = new mysqli($servername, $username, $password);
// $conn = new mysqli($servername, $username);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$sql_line = "SELECT pineapples FROM ".$dbName;

$result = $conn->query($sql_line);

if ($result->num_rows <= 0) {
	echo "Error: provided user doesnt exists";
	exit;
}

$row = $result->fetch_assoc();
$pineapples = $row['pineapples'];

echo $pineapples;


$conn->close();

?>