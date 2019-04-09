<?php
	session_start();
	include 'connect.php';

	if ($_POST['submit'] == "Add item" && $_SESSION['adm'] == 1) 
	{
		if ($_POST['name'] && $_POST['category'] && $_POST['price'] && $_POST['description']) 
		{
			$name = $_POST['name'];
			$category = $_POST['category'];
			$price = $_POST['price'];
			$descrip = $_POST['description'];
			$img = $_POST['img'];
			$sql = "INSERT INTO `socks` (`name`, `category`, `price`, `description`, `img_src`)
					VALUES ('$name', '$category', '$price', '$descrip', '$img');";
			mysqli_query($con, $sql);
			header("refresh:1; url=additem.php");
			echo "<p>Item added!</p>";
			exit();
		}
		else
		{
			header( "refresh:2; url=additem.php");
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
	<title>Add item</title>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="additem.php">
            <h1>Add item</h1>
            <div class="text">Name:<input type="text" name="name" value=""></div>
            <div class="text">Category:<input type="text" name="category" value=""></div>
            <div class="text">Price:<input type="text" name="price" value=""></div>
            <div class="text">Description:<input type="text" name="description" value=""></div>
            <div class="text">Image:<input type="text" name="img" value=""></div>
            <center><input class="submit" type="submit" name="submit" value="Add item"><br></center>
            <center><p><a class="addbook" href="index.php">Back to main page</a></p></center>
        </form>
	</div>
</body>
</html>';
	}
	?>