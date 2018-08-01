<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$maph = $_GET['a'];
	$sql = "DELETE FROM phuhuynh WHERE MAPH= '$maph'";
	if ( !mysql_query($sql, $con) )
    echo "<script>alert(\"Mã phụ huynh đang được sử dụng!\"); location.href = \"capnhatttphuhuynh_canbo.php\";</script>";	
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatttphuhuynh_canbo.php\";</script>";
?>