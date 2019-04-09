<?php

	session_start();
	include 'connect.php';

	$_SESSION['adm'] = 0;
	if (isset($_POST['submit'])) {
		$login = mysqli_real_escape_string($con, $_POST['login']);
		$pwd = hash('whirlpool', mysqli_real_escape_string($con, $_POST['pwd']));

		if (empty($login) || empty($pwd)) {
			header( "refresh:2; url=login.php");
			$_SESSION['current_user'] = "";
			echo "<p>You must fill all fields</p>";
		} else {
			$sql = "SELECT * FROM `users` WHERE login='$login'";
			$res = mysqli_query($con, $sql);
			if (mysqli_num_rows($res) < 1) {
				header( "refresh:2; url=login.php");
				$_SESSION['current_user'] = "";
				echo "<p>Incorect login</p>";
			} else {
				if ($row = mysqli_fetch_assoc($res)) {
					if ($pwd !== $row['passwd']) {
						header( "refresh:2; url=login.php");
						$_SESSION['current_user'] = "";
						echo "<p>Wrong password!</p>";
					} else {
						$_SESSION['current_user'] = $row['login'];
						$login = $row['login'];
						$empty = "";
						if ($_POST['login'] == "admin")
							$_SESSION['adm'] = 1;
//						$sql = mysqli_query($con, "SELECT * FROM `cart` WHERE login =''");
//						if ($sql != FALSE)
//							mysqli_query($con, "UPDATE `cart` SET login = '$login'
//							 WHERE login='$empty'");
						header("Location: index.php");
//						exit();
					}
				}
			}
		}
	} 
?>