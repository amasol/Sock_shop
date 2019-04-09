<?php
	session_start();
	include 'connect.php';

	if (isset($_POST['submit'])) 
	{
		if ($_POST['login'] && $_POST['email'] && $_POST['pwd'] && $_POST['pwd2']) 
		{
			if (mysqli_real_escape_string($con, $_POST['pwd']) != mysqli_real_escape_string($con, $_POST['pwd2'])) 
			{
				header( "refresh:2; url=signup.php");
				echo "<p>Password doesn't match!</p>";
			} 
			else {
				$login = mysqli_real_escape_string($con, $_POST['login']);
				$pwd = hash('whirlpool', mysqli_real_escape_string($con, $_POST['pwd']));
				$email = mysqli_real_escape_string($con, $_POST['email']);
				if (empty($login) || empty($pwd) || empty($email)){
					header("refresh:1; url=signup.php");
					exit();
				}
				else {
					if (!preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $email)) {
						echo "<p>Wrong e-mail!</p>";
						header("refresh:1; url=signup.php");
						exit();
					} else {
						$sql = "SELECT * FROM `users` WHERE login='$login'";
						$res = mysqli_query($con, $sql);
						if (mysqli_num_rows($res) > 0) {
							header( "refresh:1; url=signup.php");
							echo "<p>Such login already exists!</p>";
							exit();
						}
						else {
							$sql = "INSERT INTO `users` (`login`, `passwd`, `email`, `adm`)
							VALUES ('$login', '$pwd', '$email', '0');";
							mysqli_query($con, $sql);
							header("refresh:1; url=index.php");
							echo "<p>Now you are registered!</p>";
							exit();
						}
					}
				}
			}
		}
		else {
			echo "<p>You must fill all fields</p>";
			header("refresh:1; url=signup.php");
			exit();
		}

	}
?>