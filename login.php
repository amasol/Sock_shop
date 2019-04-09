	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Log in</title>
	</head>
	<body>
		<div class="wrapper">
			<form method="POST" action="log.php" class="login-form">
				<h1>Authorization</h1>
				<div class="text">Login: <input type="text" name="login" value=""></div>
				<div class="text">Password: <input type="password" name="pwd" value=""></div>
				<center><input class="submit" type="submit" name="submit" value="Log in"></center>
			</form>
			<center><div>
				<a class="of_decoration" href="index.php"><button class="exit_menu">Back to the main</button></a>
			<button class="create"><a class="of_decoration" href="signup.php">Create an account</a></button>
			</div></center>	
		</div>
	</body>
	</html>