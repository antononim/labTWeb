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
		<form >
			<table>
				<tr>
					<td><label>Your nickname:</label></td>
					<td><input type="text" title="Nickname" name="nickname"/></td>
				</tr>
				<tr>
					<td><label>Your password:</label></td>
					<td><input type="password" title="Password" name="password"/></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" id="loginBtn" value="Login">
						<input type="submit" id="singupBtn" value="Sign up">
					</td>
				</tr>
			</table>
		</form>
	</main>
	<br>
	<?php require("../components/footer.php"); ?>
	<script src="login.js"></script>
</body>
</html>