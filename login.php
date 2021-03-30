<?php require_once 'function.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<form method="get">
		<input type="text" name="username" placeholder="Enter username"><br>
		<input type="password" name="password" placeholder="Enter password"><br>
		<input type="submit" value="Login" name="login"> 
	</form>

	<p>Not yet a member? <a href="signup.php">SignUp</a></p>

</body>
</html>