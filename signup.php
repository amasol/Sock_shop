<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<title>Register</title>
	</head>
	<body>
        <div class="wrapper">
            <form action="reg.php" method="POST" class="login-form">
                <h1>Registration</h1>
                <div class="text">Login:<input type="text" name="login" value=""></div>
                <div class="text">Email:<input type="text" name="email" value=""></div>
                <div class="text">Password:<input type="password" name="pwd" value=""></div>
                <div class="text">Repeat password:<input type="password" name="pwd2" value=""></div>
                <center><input class="submit" type="submit" name="submit" value="Register"></center>
            </form>
        </div>
	</body>
</html>