<?php

/*
	SIGNUP request: POST 
*/

$error = FALSE;
$is_username_unavailable = TRUE;

if ( empty($_POST['username']) || empty($_POST['password']) || empty($_POST['pineapples']) || empty($_POST['ppc']) || empty($_POST['pps']) ) {
	$errorMsg = "Error: provide username, password and pineapples";
	$error = TRUE;
} else {
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
	} else {
		// echo "Connected successfully";

		$sql_line_check_user_availability = "SELECT pineapples FROM ".$dbName." WHERE username='".$_POST["username"]."';";

		$sql_line_insert = "INSERT INTO ". $dbName ."(`username`, `password`, `pineapples`, `ppc`, `pps`) VALUES ('";
		$sql_line_insert .= $_POST["username"]."', '".$_POST["password"]."', '".$_POST['pineapples']. "', '" .$_POST['ppc']. "', '" .$_POST['pps']. "');";

		// Check if username is available

		$result = $conn->query($sql_line_check_user_availability);

		if ($result->num_rows >= 1) {
			$is_username_unavailable = TRUE;
		} else {
			$is_username_unavailable = FALSE;
			// Add user
			$result = $conn->query($sql_line_insert);
			$conn->close();
		}
	}
}

if (! $error) {
	session_start();
	$_SESSION['username'] = $_POST['username'];
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
	} elseif ($is_username_unavailable) {
		echo "This username is unavailable, please use another nickname";
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
			echo "localStorage['password'] = '". $_POST['password']. "';\n";
		}
		?>
	</script>
</body>
</html>
