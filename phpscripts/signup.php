<?php
// if ( empty($_POST['nickname']) || empty($_POST['password']) ) {
// 	print("Error 420");
// 	exit;
// }
// if ( $_POST['nickname'] == "admin" ) {
// 	session_start();
// 	$_SESSION['nickname'] = $_POST['nickname'];
// }


$servername = "localhost";
$username = "admin";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password);
// $conn = new mysqli($servername, $username);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";



?>