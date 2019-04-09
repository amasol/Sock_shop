<?php

	include 'connect.php';

	session_start();

	if (isset($_SESSION['current_user']) && $_SESSION['current_user'] != "")
		$login = $_SESSION['current_user'];
	else
		$login = "";
		echo '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/basket.css">
			<link rel="stylesheet" type="text/css" href="css/index.css">
			<title>Basket</title>
		</head>
		<body>
			<div class="cover">
				<div class="header">
					<h1>Socks Shop</h1>
					<h4 class="slogan">We will make your life better!</h4>
				</div>
				<div class="navbar">
					<div class="item" style="float:left"><button class="button"><a href="index.php">Home</a></button></div>
				</div>
			</div>
			<div class="wrap">
				<p>Basket</p>';
				$sql = "SELECT * FROM `cart` WHERE login='$login'";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) == 0) {
					echo '<p>Your shopping cart is empty!</p>';
				} 
				else 
				{
					while ($row = mysqli_fetch_assoc($result)){
						$id = $row['id_socks'];
						$sql = "SELECT * FROM `socks` WHERE id_socks='$id'";
						$res = mysqli_query($con, $sql);
						$socks = mysqli_fetch_assoc($res);
						$sum = $socks['price'] * $row['num_items'];
						$total_sum += $sum;
						echo '<div class="box">
								<img src="' . $socks['img_src'] . '">
								<div class="details">
									<div class="title">' . $socks['name'] . '</div>
									<div class="price"> ' . $socks['price'] . ' UAH</div>
									<p class="title">Num of items:'.$row['num_items'].'</p>
									<div class="form_bt";>
									<form action="removeitem.php" method="POST" name="removeitem.php">
	     								<input type="submit" class="del" value="Delete" name=' .$id. '>
	     							</form>
	     							<form action="plus.php" method="POST" name="plus.php">
	     								<input type="submit" class="btn" value="+" name=' .$id. '>
	     							</form>
	     							<form action="minus.php" method="POST" name="minus.php">
	     								<input type="submit" class="btn" value="-" name=' .$id. '>
	     							</form>
	     							</div>
									</div>
								</div><br>'; 
					}
					echo '
					<div class="output">Final price:
						<div class="finalprice">' . $total_sum . ' UAH</div></br> ';
						if (isset($_SESSION['current_user']) && $_SESSION['current_user'] != "")
							echo '<a class="submit" href="submit.php">SUBMIT</a><br>';
						echo '
					</div>';
				}
				echo '
			</div>
		</body>
		</html>';
?>