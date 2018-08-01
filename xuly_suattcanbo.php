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
	
	$hoten= $_POST['username'];

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngaysinh=$nam."/".$thang."/".$ngay;

	$gioitinh = $_POST['sex'];

	$chucvu= $_POST['chucvu'];

	$diachi= $_POST['diachi'];
	
	$sdt = $_POST['sdt'];

	
	
	$sql = "UPDATE canbo SET HOTEN='$hoten', NGAYSINH='$ngaysinh',DIACHI='$diachi',SDT='$sdt',CHUCVU='$chucvu', GIOITINH_CB='$gioitinh' WHERE MACB = '$macb'";

	if ( !mysql_query($sql,$con) )
	die("khong sua duoc");	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatttcanbo_canbo.php\";</script>";
?>