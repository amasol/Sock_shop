<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Best ONLINE Shop ever!</title>
</head>
<body>
	<div class="cover">
		<div class="header">
			<h1>Socks Shop</h1>
			<h4 class="slogan">We will make your life better!</h4>
		</div>
		<div class="navbar">
			<div class="item">
				<button class="button">Category</button>
				<div class="dropmenu">
					<a href="index.php?category=long">Long</a><br>
					<a href="index.php?category=short">Short</a><br>
					<a href="index.php?category=classic">Classic</a><br>
					<a href="index.php?category=new year">New Year</a><br>
				</div>
			</div>
			
				<?php
					echo '<div class="item" style="float:right"><button class="button"><a href="index.php">Home</a></button></div>';
					echo '<div class="item" style="float:right"><button class="button"><a href="basket.php">Basket</a></button></div>';
					if ($_SESSION['current_user'] == 'admin' && $_SESSION['adm'] == 1) { 
						echo '<div class="item" style="float:right"><button class="button"><a href="additem.php">Add socks</a></button></div>';
						echo '<div class="item" style="float:right"><button class="button"><a href="del_acc.php">Delete account</a></button></div>';
					} 
					if ($_SESSION['current_user'] == "")
					{ 
						echo '<div class="item" style="float:right"><button class="button"><a href="login.php">Log in</a></button></div>';
					} 
					else 
					{ 
						echo '<div class="item" style="float:right"><button class="button"><a href="logout.php">Log out</a></button></div>';
						echo '
						<div class="item" style="float:right"><button class="button"><a href="orders.php">My orders</a></button></div>';
					} 
				?>
			</div>
			
			
		</div>
		<div class="content">
			<?php
			include 'connect.php';

			if (isset($_GET) && $_GET['category'])
			{
				$category = $_GET['category'];
				$sql = "SELECT * FROM `socks` WHERE category='$category'";
				$res = mysqli_query($con, $sql);
			}
			else{
				$sql = "SELECT * FROM `socks`";
				$res = mysqli_query($con, $sql);
			}
//			echo "$sql";




			echo '<div class="module-parent">';
			echo '<ul class="mudule-mid">';
			while ($row = mysqli_fetch_array($res)){
				echo '
				<li class="module">
					<h4 class="title">' . $row['name'] .'</h4>
					<img src="' . $row['img_src'] .'" alt="HP1">
					<h6 class="description">' . $row['description'] . '</h6>
					<center><div class="price">' . $row['price'] . ' ₴</div></center>';
					if ($_SESSION['adm'] === 1) {
						echo '<div style="text-align: center";>
								<form action="addtobasket.php" method="POST" name="addtobasket.php">
		     						<input type="submit" class="add" value="ADD TO BASKET" name='.$row['id_socks']. '>
		     						<input type="submit" class="add" value="Delete" name=' .$row['id_socks']. '>
		     						<input type="submit" class="add" value="Edit" name=' .$row['id_socks']. '>
		     					</form>
		     					</div>';
					}
					else
						echo'
					<form action="addtobasket.php" method="POST" name="addtobasket.php">
     					<center><input type="submit" class="add" value="ADD TO BASKET" name=' .$row['id_socks']. '></center>
     				</form>
				</li>';
			}
			echo '</ul>';
			?>
		</div>
	</div>
</body>
</html>