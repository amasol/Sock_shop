<?php
	session_start();
	include 'connect.php';

	if ($_SESSION['adm'] == 1 && $_POST['submit']) {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			if (!$_POST['socks_name'] && !$_POST['category'] && !$_POST['price'] && !$_POST['description'] && !$_POST['img_src'])
				{
					header("refresh:2; url=edititem.php");
					echo "<p>No input!</p>";
					exit(); 
				}
				$sql = "SELECT * FROM `socks` WHERE id_socks='$id'";
				$res = mysqli_query($con, $sql);
				unset($_POST['submit']);
			if (mysqli_num_rows($res) <= 0) {
				header( "refresh:1; url=edititem.php");
				echo "<p>You don't have a socks with that name!</p>";
				exit();
			}
			 else {
				$query = "UPDATE `socks` SET";
				$comma = " ";
				foreach($_POST as $key => $val) {
	    			if( ! empty($val)) {
	        		$query .= $comma . $key . " = '" . trim($val) . "'";
	       			$comma = ", ";
	    			}
				}
				$query .= "WHERE id_socks=$id";
				mysqli_query($con, $query);
				header("Location: index.php");
				exit();
			}
		}
}
?>