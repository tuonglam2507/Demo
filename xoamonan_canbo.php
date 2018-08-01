<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$mamon = $_GET['a'];
	$sql = "DELETE FROM monan WHERE MAMON= '$mamon'";
	if ( !mysql_query($sql, $con) )
    echo "<script>alert(\"Món ăn đang được sử dụng không thể xóa !\"); location.href = \"capnhatmonan_canbo.php\";</script>";	
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatmonan_canbo.php\";</script>";
?>