<?php

/*
	Login request: GET 
*/

$error = FALSE;
$errorMsg = "";

if ( empty($_GET['username']) || empty($_GET['password']) ) {
	$errorMsg = "Error: provide username and password";
	$error = TRUE;
}

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbName = "users.users";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	$errorMsg = "Connection failed: " . $conn->connect_error;
	$error = TRUE;
}
// echo "Connected successfully";

$sql_line = "SELECT pineapples, ppc, pps FROM ".$dbName." WHERE username='".$_GET["username"]."' and password='".$_GET["password"]."'";

$result = $conn->query($sql_line);

if ($result->num_rows <= 0) {
	$errorMsg = "Error: wrong username or password";
	$error = TRUE;
} else {
	$row = $result->fetch_assoc();
	$pineapples = $row['pineapples'];
	$ppc = $row['ppc'];
	$pps = $row['pps'];
}

$conn->close();

if (! $error) {
	session_start();
	$_SESSION['username'] = $_GET['username'];
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Pineapple clicker</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../favicon.png">
	<link rel="stylesheet" href="/styles/styles.css">
	<link rel="stylesheet" href="/styles/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<?php require("../components/header.php"); ?>
	<main>
	<br>
	<h3>
	<?php 
	if ($error) {
		echo $errorMsg;
	} else {
		echo "Successfully logged in as " . $_SESSION['username'];
	}
	?>
	</h3>
	</main>
	<br>
	<?php require("../components/footer.php"); ?>
	<script>
		<?php 
		if (!$error) {
			echo "localStorage['username'] = '". $_SESSION['username']. "';\n";
			echo "localStorage['password'] = '". $_GET['password']. "';\n";
			echo "localStorage['pineapples'] = ". $pineapples. ";\n";
			echo "localStorage['ppc'] = ". $ppc. ";\n";
			echo "localStorage['pps'] = ". $pps. ";\n";
		}
		?>
	</script>
</body>
</html>
