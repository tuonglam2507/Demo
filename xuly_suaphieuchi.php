<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mapc = $_GET['a'];
	
	$ngay= $_POST['ngay'];
	$thang= $_POST['thang'];
	$nam= $_POST['nam'];
	$ngaychi=$nam."/".$thang."/".$ngay;
	
	$tenpc = $_POST['tenpc'];
	$matp = $_POST['matp'];
	$sotien = $_POST['sotien'];
	
	$sql = "UPDATE phieuchi SET MATP='$matp', TENPC='$tenpc', SOTIEN ='$sotien', NGAYCHI= '$ngaychi' WHERE MAPC = '$mapc'";

	if ( !mysql_query($sql, $con) )
	echo "<script>alert(\"Phiếu đang sử dụng không thể sửa !\"); location.href = \"capnhatphieuchi_canbo.php\";</script>";	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatphieuchi_canbo.php\";</script>";
?>