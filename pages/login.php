<?php
if ( empty($_POST['nickname']) || empty($_POST['password']) ) {
	print("Error 420");
	exit;
}
if ( $_POST['nickname'] == "admin" ) {
	session_start();
	$_SESSION['nickname'] = $_POST['nickname'];
}

?>