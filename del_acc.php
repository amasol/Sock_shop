<?php
	session_start();
	include 'connect.php';

	if ($_POST['submit'] == "Delete profile" && $_SESSION['adm'] == 1) 
	{

		if (!empty($_POST['login']) && $_POST['login'] != 'admin') 
		{
			$login = $_POST['login'];
			$sql = "DELETE FROM `users` WHERE login='$login'";
			$res = mysqli_query($con, $sql);
			$sql = "DELETE FROM `cart` WHERE login='$login'";
			$res = mysqli_query($con, $sql);
			$sql = "DELETE FROM `orders` WHERE login='$login'";
			$res = mysqli_query($con, $sql);
			header("refresh:1; url=del_acc.php");
			echo "<p>User deleted!</p>";
			exit();
		}
		else
		{
			header( "refresh:2; url=del_acc.php");
			echo "<p>Invalid parameters!</p>";
			exit();
		}
	}
	else {
		echo '
		<html>
			<head>
				<meta charset="UTF-8">
				<link rel="stylesheet" type="text/css" href="css/login.css">
			<title>Delete profile</title>
			</head>
			<body>
				<div class="wrapper">
					<form method="POST" action="del_acc.php">
						<h1>Delete profile</h1>
						<div class="text">Login: <input type="text" name="login" value=""></div>
            			<center><input class="submit" type="submit" name="submit" value="Delete profile"></center>
            			<center><p><a class="addbook" href="index.php">Back to main page</a></p></center>
				</form>
			</body>
		</html>';
	}
?>