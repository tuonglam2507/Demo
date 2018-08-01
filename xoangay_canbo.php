<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$ngay = $_GET['a'];
	
	$sql = "DELETE FROM ngay WHERE NGAY= '$ngay'";
	if ( !mysql_query($sql, $con) )
    echo "<script>alert(\"Ngày được sử dụng không thể xóa !\"); location.href = \"capnhatngay_canbo.php\";</script>";	
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatngay_canbo.php\";</script>";
?>