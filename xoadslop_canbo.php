<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$malop = $_GET['a'];
	$sql = "DELETE FROM lop WHERE MALOP= '$malop'";
	//echo $sql;
	if ( !mysql_query($sql, $con) )
   {
		echo "<script>alert(\"Lớp đang được sử dụng! Không xóa được!\"); location.href = \"capnhatdslop_canbo.php\";</script>";
	}
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatdslop_canbo.php\";</script>"
?>