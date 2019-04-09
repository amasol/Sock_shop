<?php
echo '
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Edit item</title>
	</head>
	<body>
		<div class="wrapper">
			<form method="POST" action="edit.php?id=' .$socks_id. ' ">
				<h1>Edit item</h1>
	                <div class="text">Name:<input type="text" name="name" value=""></div>
	                <div class="text">Category:<input type="text" name="category" value=""></div>
	                <div class="text">Price:<input type="text" name="price" value=""></div>
	                <div class="text">Description:<input type="text" name="description" value=""></div>
	                <div class="text">Image:<input type="text" name="img_src" value=""></div>
	                <center><input class="submit" type="submit" name="submit" value="Submit changes"></center>
	                <center><p><a class="addbook" href="index.php">Back to main page</a></p></center>
			</form>
		</div>
	</body>
	</html>';
?>