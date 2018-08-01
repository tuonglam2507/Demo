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
	
	$mahs1= $_POST['mahs'];
	$ngay1= $_POST['ngay'];
	
	$sql = "UPDATE dangkyan SET MAHS='$mahs1', NGAY='$ngay1' WHERE MAHS = '$mahs' AND NGAY = '$ngay'";
	if ( !mysql_query($sql, $con) )
	die("khong sua duoc");	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatdkkhongan_canbo.php\";</script>";
?>