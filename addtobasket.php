
<?php
	session_start();

	include 'connect.php';

	$fliped = array_flip($_POST);
	if ($fliped['Delete'] != NULL) {
		$socks_id = $fliped['Delete'];
		mysqli_query($con, "DELETE FROM `socks` WHERE id_socks = '$socks_id'");
		header("Location: index.php");
	}
	elseif($fliped['Edit'] != NULL) {
		$socks_id = $fliped['Edit'];
		include_once('edititem.php');
	}
	else {
		$socks_id = $fliped['ADD TO BASKET'];
		if ($_SESSION['current_user'] == "" || !isset($_SESSION['current_user']))
			$login = "";
		else
			 $login = $_SESSION['current_user'];
		$sql = "SELECT * FROM `cart` WHERE id_socks='$socks_id' AND login='$login'";
		$res = mysqli_query($con, $sql);
		if (mysqli_num_rows($res) > 0) {
			mysqli_query($con, "UPDATE `cart` SET num_items = num_items + 1
				WHERE id_socks='$socks_id' AND login='$login'");
		}
		else {
			mysqli_query($con, "INSERT INTO `cart` (`id_socks`, `num_items`, `login`)
		 		VALUES ('$socks_id', '1', '$login');");
		}
	header("Location: index.php");
}
?>