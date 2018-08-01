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
	$hoten= $_POST['username'];
	$ngay= $_POST['ngay'];
	$thang= $_POST['thang'];
	$nam= $_POST['nam'];
	$ngaysinh=$nam."/".$thang."/".$ngay;
	$gioitinh = $_POST['sex'];
	$vaitro= $_POST['vaitro'];
	$diachi= $_POST['diachi'];
	$sdt = $_POST['sdt'];
	
	$sql = "UPDATE phuhuynh SET TENPH='$hoten', NGAYSINH='$ngaysinh',DIACHI='$diachi',SODT='$sdt', GIOITINH_PH='$gioitinh' WHERE MAPH = '$maph'";
	if ( !mysql_query($sql, $con) )
	die("khong sua duoc");	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatttphuhuynh_canbo.php\";</script>";
?>