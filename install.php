<?php
	session_start();

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPass = "123456";
	$dbName = "";
	$con = mysqli_connect($dbServerName, $dbUsername, $dbPass, $dbName);
	if (mysqli_connect_errno())
	{
		print( "Failed to connect to database:" . mysqli_connect_errno() . "\n");
		exit();
	}
	mysqli_query($con, "CREATE DATABASE IF NOT EXISTS rush_db");
	
	mysqli_query($con, "use rush_db");

	
	mysqli_query($con, "CREATE TABLE IF NOT EXISTS `socks`
		(
			`id_socks` INT (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`name` VARCHAR (255) NOT NULL,
			`category` VARCHAR (255) NOT NULL,
			`description` VARCHAR (512) NOT NULL,
			`price` DECIMAL (10,2) NOT NULL,
			`img_src` VARCHAR (512) NOT NULL
		);");

	$res_b = mysqli_query($con, "SELECT * FROM `socks`");

	mysqli_query($con, "CREATE TABLE IF NOT EXISTS `cart`
		(
			`id_socks` INT (11) NOT NULL,
			`num_items` INT (11) NOT NULL,
			`login` VARCHAR (255) NOT NULL
		);");



	mysqli_query($con, "CREATE TABLE IF NOT EXISTS `users` (
		`id` INT (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`login` VARCHAR (255) NOT NULL,
		`passwd` VARCHAR (255) NOT NULL,
		`email` VARCHAR (512) NOT NULL,
		`adm`	INT (1) NOT NULL
	);");
	$res_u = mysqli_query($con, "SELECT * FROM `users`");




	if (mysqli_num_rows($res_b) == 0) {
		mysqli_query($con, "INSERT INTO `socks` (`name`, `category`, `description`, `price`, `img_src`)
			VALUES
			('New Years Box', 'New Year', '6 Pairs', '350.00', 'https://griffonsocks.com.ua/wp-content/uploads/2019/01/11-700x700.jpg'),
			('Warm Winter Box', 'New Year', '4 Pairs', '330.00', 'https://griffonsocks.com.ua/wp-content/uploads/2018/01/griffon-winter-main-1-700x700.jpg'),
			('Animal Box', 'Long', '6 Pairs', '300.00', 'https://griffonsocks.com.ua/wp-content/uploads/2018/10/Griffon-animal-main-700x700.jpg'),
			('Four-legged friends Box', 'Long', '6 Pairs', '300.00', 'https://griffonsocks.com.ua/wp-content/uploads/2017/10/griffon-four-legged-friends-main-1-700x700.jpg'),
			('Low Space Box', 'Short', '8 Pairs', '330.00', 'https://griffonsocks.com.ua/wp-content/uploads/2018/04/griffon-space-low-main-1-700x700.jpg'),
			('Low Summer Box', 'Short', '8 Pairs', '330.00', 'https://griffonsocks.com.ua/wp-content/uploads/2018/05/griffon-low-summer-main-1.jpg'),
			('Mono Dark Box', 'Classic', '6 Pairs', '300.00', 'https://griffonsocks.com.ua/wp-content/uploads/2018/10/griffon-gentelmen-main.jpg'),
			('Black Bamboo Box', 'Classic', '6 Pairs', '330.00', 'https://griffonsocks.com.ua/wp-content/uploads/2017/04/griffon-bamboo-main.jpg');
			");
	}
	$pass = hash('whirlpool', "admin");


	if (mysqli_num_rows($res_u) == 0){
		mysqli_query($con, "INSERT INTO `users` (`login`, `passwd`, `email`, `adm`)
			VALUES('admin', '$pass', 'admin@gmail.com', '1');
			");
	}
	mysqli_query($con, "CREATE TABLE IF NOT EXISTS `orders` (
		`id_socks` INT (11) NOT NULL,
		`num_items` INT (11) NOT NULL,
		`login` VARCHAR (512) NOT NULL

	);");
	header("refresh:1; url=index.php");
	echo "SUCCSESS\n";

?>