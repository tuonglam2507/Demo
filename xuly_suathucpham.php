<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$matp = $_GET['a'];
	
	$mamon= $_POST['mamon'];
	$tentp= $_POST['tentp'];
	
	$sql = "UPDATE thucpham SET MAMON='$mamon', TENTP='$tentp' WHERE MATP = '$matp'";
	if ( !mysql_query($sql, $con) )
	die("khong sua duoc");	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"qlbantru_canbo.php\";</script>";
?>