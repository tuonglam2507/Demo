<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mahs = $_GET['a'];
	$ngay = $_GET['ngay'];
	
	$sql = "DELETE FROM dangkyan WHERE MAHS= '$mahs' AND NGAY = '$ngay'";
	
	if ( !mysql_query($sql, $con) )
    die("Không xóa được");	
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatmonan_canbo.php\";</script>";
?>