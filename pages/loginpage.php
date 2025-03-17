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

		<form id="loginform" action="/phpscripts/login.php">
			<h2>Login</h2>
			<table>
				<tr>
					<td><label>Your username:</label></td>
					<td><input type="text" title="username" name="username"/></td>
				</tr>
				<tr>
					<td><label>Your password:</label></td>
					<td><input type="password" title="Password" name="password"/></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" id="loginBtn" value="Login">
					</td>
				</tr>
			</table>
			<a href="#" onclick="signup()">Don't have an account? Sign up!</a>
		</form>

		<form id="signupform" action="/phpscripts/signup.php" method="post">
			<h2>Sign up</h2>
			<table>
				<tr>
					<td><label>Your username:</label></td>
					<td><input type="text" title="username" name="username"/></td>
				</tr>
				<tr>
					<td><label>Your password:</label></td>
					<td><input type="password" title="Password" name="password"/></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" id="signupBtn" value="Sign up">
					</td>
				</tr>
			</table>
			<a href="#" onclick="login()">Already have an account? Login!</a>
			<input id='pineapplesInput' name="pineapples" hidden="true" value="1"/>
			<input id='ppcInput' name="ppc" hidden="true" value="1"/>
			<input id='ppsInput' name="pps" hidden="true" value="1"/>
		</form>
		
	</main>
	<br>
	<?php require("../components/footer.php"); ?>
	<script src="/js/login.js"></script>
</body>
</html>