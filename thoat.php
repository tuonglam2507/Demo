<?php
session_start();
	include('connect.php');
	//session_destroy();
	unset($_SESSION['USERNAME']);
	unset($_SESSION['PASSWORD']);
	header("Location: Index.php");
?>

