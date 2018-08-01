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
	
	$sql = "DELETE FROM thucpham WHERE MATP= '$matp'";
	if ( !mysql_query($sql, $con) )
    echo "<script>alert(\"Mã thực phẩm đang được sử dụng !\"); location.href = \"qlbantru_canbo.php\";</script>";	
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"qlbantru_canbo.php\";</script>";
?>