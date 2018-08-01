<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$macb = $_GET['a'];
	$sql = "DELETE FROM canbo WHERE MACB= '$macb'";
	if ( !mysql_query($sql, $con) )
	echo "<script>alert(\"Cán bộ này đã nhận nhiệm vụ !\"); location.href = \"capnhatttcanbo_canbo.php\";</script>";
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatttcanbo_canbo.php\";</script>";
?>