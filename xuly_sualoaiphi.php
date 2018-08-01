<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$maphi = $_GET['a'];
	$tenphi= $_POST['tenphi'];
	
	$sql = "UPDATE loaiphi SET DIENGIAI='$tenphi' WHERE MAPHI = '$maphi'";
	if ( !mysql_query($sql, $con) )
	die("Không sửa được");
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"qlphi_canbo.php\";</script>";
?>