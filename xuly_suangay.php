<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$ngaydu = $_GET['a'];
	
	$ngay= $_POST['ngay'];
	$thang= $_POST['thang'];
	$nam= $_POST['nam'];
	$ngayan=$nam."/".$thang."/".$ngay;
	
	$mamon = $_POST['mamon'];
	
	$sql = "UPDATE ngay SET NGAY='$ngayan', MAMON='$mamon' WHERE NGAY = '$ngaydu'";
	echo $sql;
	if ( !mysql_query($sql, $con) )
	echo "<script>alert(\"Ngày đang sử dụng không thể sửa !\"); location.href = \"capnhatngay_canbo.php\";</script>";	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatngay_canbo.php\";</script>";
?>