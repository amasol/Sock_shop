<?php

session_start();

include 'connect.php';

$fliped = array_flip($_POST);
$id = $fliped['Delete'];
if ($_SESSION['current_user'] == "" || !isset($_SESSION['current_user']))
	$login = "";
else
	$login = $_SESSION['current_user'];
$sql = "DELETE FROM `cart` WHERE login = '$login' AND id_socks = '$id'";
$res = mysqli_query($con, $sql);
header( 'Location: basket.php');

?>