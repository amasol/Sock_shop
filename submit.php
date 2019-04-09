<?php

session_start();
include 'connect.php';

$login = $_SESSION['current_user'];

$sql = "INSERT INTO `orders` SELECT * FROM `cart` WHERE login = '$login'";
mysqli_query($con, $sql);

$sql = "DELETE FROM `cart` WHERE login = '$login'";
mysqli_query($con, $sql);

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
				<p>Thanks For Your Order</p>
		</body>
	</html>';

?>